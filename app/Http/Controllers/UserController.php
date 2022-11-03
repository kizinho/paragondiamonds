<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Traits\HasError;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Str;
use App\Models\Reference;
use App\Mail\MailSender;

class UserController extends Controller {

    use HasError;

    public function register(Request $request) {
        $input = $request->all();
        $rules = ([
            'full_name' => 'required',
            'username' => 'required',
            'phone_no' => 'required',
            'country' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => 'required|same:password',
        ]);

        $error = static::getErrorMessage($input, $rules);
        if ($error) {
            return $error;
        }

        DB::beginTransaction();
        try {
            $rand = strtolower(Str::random(8));
            $verify_code = strtolower(Str::random(32));
            $input['verified_code'] = $verify_code;
            $input['type'] = 'user';
            $input['ref_check'] = $rand;
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            if ($request->ref) {
                $owner = User::whereRef_check($request->ref)->first();
                if (!is_object($owner)) {
                    session()->forget('sponsor');
                    return ([
                        'status' => 422,
                        'message' => 'Invalid Ref User'
                    ]);
                }
                //creste
                Reference::create([
                    'user_id' => $owner->id,
                    'referred_id' => $user->id
                ]);
                //send mail
                $email = $owner->email;
                $greeting = "Hello $owner->first_name $owner->last_name ,";
                $subject = 'Referral New User Notification';
                $message = $user->username . ' joined us today with your referral link';
                Mail::to($email)->send(new MailSender($subject, $greeting, $message, '', ''));
            }

            $subject = 'Verify Account';
            $message = "Please, complete your registration using the below link:";
            $greeting = "Hello $user->first_name $user->last_name ,";
            $link = url('account-activate?user=' . $verify_code);
            $link_name = "Activate";
            Mail::to($user->email)->send(new MailSender($subject, $greeting, $message, $link, $link_name));
            session()->forget('sponsor');
            Auth::login($user);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        return ([
            'status' => 200,
            'message' => 'Registration Successful redirecting ....'
        ]);
    }

    public function comfirm(Request $request) {
        $input = $request->all();
        $rules = ([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => 'required|same:password'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);

        if ($error) {
            return $error;
        }
        $user = User::whereEmail($request->email)->first();
        if (is_object($user)) {
            $password = bcrypt($input['password']);
            $user->password = $password;
            $user->save();
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Password Succesfully Changed');
            return Redirect:: to('login');
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Invalid Email Provided');
            return Redirect::back()->withInput();
        }
    }

}
