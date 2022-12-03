<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\User;
use \App\Http\Controllers\Traits\HasError;
use Illuminate\Support\Carbon;
use App\Models\Coin;
use App\Models\UserCoin;
use Illuminate\Support\Facades\Notification;
use App\Mail\RegistrationMail;
use App\Models\Investment;
use App\Mail\PlanDepositMail;
use App\Models\Withdraw;
use App\Mail\SendNotifyMail;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use App\Models\Compound;
use Illuminate\Support\Str;
use App\TraitsFolder\MailTrait;
use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use App\Models\userTrackEarn;
use App\Models\UserCompounding;
use App\Models\UserWithdrawal;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Mail;
use App\Models\EducationLicensePlan;
use App\Models\EducationLicenseSignal;
use App\Models\UserEducationLicensePlan;

class AdminController extends Controller {

    use HasError,
        MailTrait;

    public function setting() {
        $data['setting'] = Setting::whereId(1)->first();
        return view('admin.setting.index', $data);
    }

    public function mailing() {
        $data['users'] = User::orderBy('created_at', 'desc')->get();
        return view('admin.mailing.index', $data);
    }

    public function maintenance(Request $request) {
        $data['ip'] = $request->getClientIp();
        return view('admin.mode', $data);
    }

    public function maintenancePost(Request $request) {
        \Artisan::call('down --allow=' . $request->ip . '');
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Maintenance mode successully activated');
        return redirect()->back();
    }

    public function maintenancePostUp() {
        \Artisan::call('up');
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Your site is back');
        return redirect()->back();
    }

    public function mailingPost(Request $request) {
        $input = $request->all();
        $rules = ([
            'user_id' => 'required',
            'title' => 'required',
            'message' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        foreach ($request->user_id as $user) {
            $user_email = User::whereId($user)->first();
            $name = $user_email->username;
            $greeting = "Hello $name";
            $text = nl2br($request->message);
            Mail::to($user_email->email)->send(new MailSender($request->title, $greeting, $text, '', ''));
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Mail Successfully Sent');
        return redirect()->back();
    }

    public function users() {
        $data['all_users'] = User::orderBy('created_at', 'desc')->get();
        $data['verified_users'] = User::whereCode(true)->orderBy('created_at', 'desc')->get();
        $data['unverified_users'] = User::whereCode(false)->orderBy('created_at', 'desc')->get();
        return view('admin.users.index', $data);
    }

    public function transaction() {

        $data['transactions'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('admin.transaction.index', $data);
    }

    public function viewUser(Request $request) {
        $id = $request->id;
        $data['user'] = User::with('coin')->find($id);
        $data['transactions'] = Transaction::whereUser_id($id)->orderBy('created_at', 'desc')->take(5)->get();
        $data['coinsEnable'] = Coin::whereStatus(true)->get()->except([5]);
        $data['user_coin'] = UserCoin::whereUser_id($id)->orderBy('created_at', 'desc')->get();
        $data['name_ref'] = Reference::whereReferred_id($id)->first();
        $data['balance'] = userTrackEarn::whereUser_id($id)->sum('amount');
        return view('user.edit_account', $data);
    }

    public function login(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        Auth::login($user);
        return redirect('/home');
    }

    public function settingPost(Request $request) {
        $setting = Setting::firstOrNew(array('id' => (1)));
        $setting->site_name = $request->site_name;
        $setting->site_url = $request->site_url;
        $setting->site_email = $request->site_email;
        $setting->send_notify_email = $request->send_notify_email;
        $setting->address = $request->address;
        $setting->site_code = $request->site_code;
        $setting->location = $request->location;
        $setting->video_link = $request->video_link;
        $setting->copy_right = $request->copy_right;
        $setting->deposit_investment_charge = $request->deposit_investment_charge;
        $setting->withdraw_charge = $request->withdraw_charge;
        $setting->send_notify_email = $request->send_notify_email;
        $setting->send_notify_email = $request->send_notify_email;
        $setting->investment_payment_mode = $request->mode;
//        $setting->email_body = $request->email_body;
        $setting->site_phone = $request->site_phone;
        $setting->min_withdraw = $request->min_withdraw;
        $setting->block_io_pin = $request->block_io_pin;
        $setting->auto_withdraw = $request->auto_withdraw;


        $setting->save();
        if (!empty($request->logo)) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $rand = 'logo';
                $name = $rand . '.' . $extension;
                $file->move(public_path('/images/logo'), $name);
                $save = 'images/logo/' . $name;
                $setting = Setting::firstOrNew(array('id' => (1)));
                $setting->logo = $save;
                $setting->save();
            }
        }
        if (!empty($request->favicon)) {
            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                $extension = $file->getClientOriginalExtension();
                $rand = 'favicon';
                $name = $rand . '.' . $extension;
                $file->move(public_path('/images/favicon'), $name);
                $save = 'images/favicon/' . $name;
                $setting = Setting::firstOrNew(array('id' => (1)));
                $setting->favicon = $save;
                $setting->save();
            }
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Site Settings Data Successfully Saved');
        return redirect()->back();
    }

    public function create(Request $request) {
        $input = $request->all();
        $rules = ([
            'full_name' => 'required|string',
            'username' => 'required|string',
            'type' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);


        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        $rand = strtoupper(Str::random(6));
        $verify_code = mt_rand(2000, 9000);
        $input['verified_code'] = $verify_code;
        $input['code'] = true;
        $input['type'] = 'user';
        $input['ref_check'] = $rand;
        $input['password'] = bcrypt($request->password);
        $input['email_verified_at'] = Carbon::now();
        $user = User::create($input);
        if (!empty($request->bitcoin_address)) {
            $coin = Coin::whereSlug('bitcoin_address')->first();
            UserCoin::create([
                'user_id' => $user->id,
                'coin_id' => $coin->id,
                'address' => $request->bitcoin_address
            ]);
        }
//        $setting = Setting::whereId(1)->first();
//        $subject = $setting->site_name . ' - Welcome to ' . $setting->site_name;
//        $message = "Thanks for registering with us , activate your account by using this code $user->verified_code";
//        $this->sendMail($user->email, $user->username, $subject, $message);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'User Successfully Created');
        return redirect()->back();
    }

    public function edit(Request $request) {

        return static::toUpdate($request);
    }

    public static function toUpdate(Request $request) {

        $input = $request->all();

        $user = User::findOrFail($request->id);
        $user->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'User  Successfully Updated');
        return redirect()->back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $array = array($id);
        //deposit
        Investment::whereIn('user_id', $array)->delete();
        Withdraw::whereIn('user_id', $array)->delete();
        UserCoin::whereIn('user_id', $array)->delete();
        Transaction::whereIn('user_id', $array)->delete();
        Reference::whereIn('user_id', $array)->delete();
        Reference::whereIn('referred_id', $array)->delete();
        $user = User::find($id);


        if ($user->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'User deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'User Delete failed');
            return redirect()->back();
        }
    }

    public function deposit(Request $request) {
        $data['plans'] = Plan::orderBy('created_at', 'desc')->get();
        if ($request->type == '') {
            $data['deposits'] = Investment::whereNotNull('coin_id')->orderBy('created_at', 'desc')->get();
            $data['type'] = '';
        }
        if ($request->type == 'running') {
            $data['deposits'] = Investment::whereNotNull('coin_id')->where('due_pay', '>', Carbon::now())->orderBy('created_at', 'desc')->get();
            $data['type'] = 'running';
        }
        if ($request->type == 'completed') {
            $data['deposits'] = Investment::whereNotNull('coin_id')->whereStatus(true)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'completed';
        }
        if ($request->type == 'confirmed') {
            $data['deposits'] = Investment::whereNotNull('coin_id')->whereStatus_deposit(true)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'confirmed';
        }
        if ($request->type == 'pending') {
            $data['deposits'] = Investment::whereNotNull('coin_id')->whereStatus_deposit(false)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'pending';
        }
        return view('admin.deposit.index', $data);
    }

    public function deleteDeposit(Request $request) {
        $id = $request->id;
        $deposit = Investment::find($id);
        if ($deposit->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Deposit deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Deposit Delete failed');
            return redirect()->back();
        }
    }

    public function confirm(Request $request) {
        $setting = Setting::whereId(1)->first();
        $id = $request->id;
        $payment = Investment::find($id);
        $current = Carbon::now();
        $status_deposit = true;
        $due = $current->addHours($payment->plan->compound->compound);
        $due_pay = $due->addMinutes(2);
        $payment->update([
            'status_deposit' => $status_deposit,
            'due_pay' => $due_pay
        ]);


        $user_ref = Reference::whereReferred_id($payment->user_id)->first();
        if (is_object($user_ref)) {
            $first_pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
            if (!is_object($first_pay)) {
                $first_pay = UserCoin::create([
                            'user_id' => $user_ref->user_id,
                            'coin_id' => $payment->usercoin->coin->id,
                            'address' => null
                ]);
            }

            if (is_object($first_pay)) {
                $reward = $payment->amount;

                $firstUserReward = $payment->plan->ref / 100 * $reward;
//                $secondUserReward = $setting->level_2 / 100 * $reward;
//                $thirdUserReward = $setting->level_3 / 100 * $reward;
                //first reward
                $newFirstUserReward = $firstUserReward;
                //create user withdrawal data
                $user_withdraw = new UserWithdrawal();
                $user_withdraw->amount = $newFirstUserReward;
                $user_withdraw->user_id = $first_pay->user_id;
                $user_withdraw->coin_id = $first_pay->id;
                $user_withdraw->type = "Referral Bonus";
                $user_withdraw->status = true;
                $user_withdraw->plan_id = $payment->plan_id;
                $user_withdraw->save();
                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($first_pay->user_id)));
                $userMoney->user_id = $first_pay->user_id;
                $userMoney->amount = $userMoney->amount + $newFirstUserReward;
                $userMoney->save();
                //transcation log
                Transaction::create([
                    'user_id' => $first_pay->user_id,
                    'transaction_id' => $payment->transaction_id,
                    'type' => 'Commissions',
                    'name_type' => 'Referral Bonus',
                    'coin_id' => $first_pay->id,
                    'amount' => $newFirstUserReward,
                    'amount_profit' => $newFirstUserReward,
                    'description' => 'Referral Bonus Under ' . $payment->plan->name . ' license',
                    'status' => true
                ]);
                $message = 'USD' . $newFirstUserReward . " Referral Bonus has been successfully sent to wallet";

                $name = $first_pay->user->username;
                $greeting = "Hello $name";
                Mail::to($first_pay->user->email)->send(new MailSender('Referral Bonus', $greeting, $message, '', ''));
                //second reward
                $user_ref_second = Reference::whereReferred_id($first_pay->user_id)->first();
                if (is_object($user_ref_second)) {
                    $second_pay = UserCoin::whereUser_id($user_ref_second->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                    if (!is_object($second_pay)) {
                        $second_pay = UserCoin::create([
                                    'user_id' => $user_ref_second->user_id,
                                    'coin_id' => $payment->usercoin->coin->id,
                                    'address' => null
                        ]);
                    }
//                    if (is_object($second_pay)) {
//                        $newSecondUserReward = $secondUserReward;
//                        //create user withdrawal data
//                        $user_withdraw_second = new UserWithdrawal();
//                        $user_withdraw_second->amount = $newSecondUserReward;
//                        $user_withdraw_second->user_id = $second_pay->user_id;
//                        $user_withdraw_second->coin_id = $second_pay->id;
//                        $user_withdraw_second->type = "Referral Bonus";
//                        $user_withdraw_second->status = true;
//                        $user_withdraw_second->plan_id = $payment->plan_id;
//                        $user_withdraw_second->save();
//                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($second_pay->user_id)));
//                        $userMoney->user_id = $second_pay->user_id;
//                        $userMoney->amount = $userMoney->amount + $newSecondUserReward;
//                        $userMoney->save();
//                        //transcation log
//                        Transaction::create([
//                            'user_id' => $second_pay->user_id,
//                            'transaction_id' => $payment->transaction_id,
//                            'type' => 'Commissions',
//                            'name_type' => 'Referral Bonus',
//                            'coin_id' => $second_pay->id,
//                            'amount' => $newSecondUserReward,
//                            'amount_profit' => $newSecondUserReward,
//                            'description' => 'Referral Bonus Under ' . $payment->plan->name . ' license',
//                            'status' => true
//                        ]);
//                        $message_second = 'USD' . $newSecondUserReward . "Referral Bonus has been successfully sent to wallet";
//                        $name = $second_pay->user->username;
//                        $greeting = "Hello $name";
//                        Mail::to($second_pay->user->email)->send(new MailSender('Referral Bonus', $greeting, $message_second, '', ''));
////                        //third reward
//                        $user_ref_third = Reference::whereReferred_id($second_pay->user_id)->first();
//                        if (is_object($user_ref_third)) {
//                            $third_pay = UserCoin::whereUser_id($user_ref_third->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
//                            if (!is_object($third_pay)) {
//                                $third_pay = UserCoin::create([
//                                            'user_id' => $user_ref_third->user_id,
//                                            'coin_id' => $payment->usercoin->coin->id,
//                                            'address' => null
//                                ]);
//                            }
//                            if (is_object($second_pay)) {
//                                $newThirdUserReward = $thirdUserReward;
//                                //create user withdrawal data
//                                $user_withdraw_second = new UserWithdrawal();
//                                $user_withdraw_second->amount = $newThirdUserReward;
//                                $user_withdraw_second->user_id = $third_pay->user_id;
//                                $user_withdraw_second->coin_id = $third_pay->id;
//                                $user_withdraw_second->type = "Referral Bonus";
//                                $user_withdraw_second->status = true;
//                                $user_withdraw_second->plan_id = $payment->plan_id;
//                                $user_withdraw_second->save();
//                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($third_pay->user_id)));
//                                $userMoney->user_id = $third_pay->user_id;
//                                $userMoney->amount = $userMoney->amount + $newThirdUserReward;
//                                $userMoney->save();
//                                //transcation log
//                                Transaction::create([
//                                    'user_id' => $third_pay->user_id,
//                                    'transaction_id' => $payment->transaction_id,
//                                    'type' => 'Commissions',
//                                    'name_type' => 'Referral Bonus',
//                                    'coin_id' => $third_pay->id,
//                                    'amount' => $newThirdUserReward,
//                                    'amount_profit' => $newThirdUserReward,
//                                    'description' => 'Referral Bonus Under ' . $payment->plan->name . ' license',
//                                    'status' => true
//                                ]);
//                                $message_third = 'USD' . $newThirdUserReward . "Referral Bonus has been successfully sent to wallet";
//                                $first = $third_pay->user->first_name;
//                                $last = $third_pay->user->last_name;
//                                $greeting = "Hello $first $last";
//                                Mail::to($third_pay->user->email)->send(new MailSender('Referral Bonus', $greeting, $message_third, '', ''));
//                            }
//                        }
//                    }
                }
            }
        }



//endref 
        $trans = Transaction::whereTransaction_id($payment->transaction_id)->first();
        $trans->update([
            'status' => true
        ]);

        $email = $payment->user->email;
        $name = $payment->user->username;
        $greeting = "Hello $name";
        $subject = 'Plan  payment Confirmation';
        $message = $payment->plan->name . " investment has been accepted and your earns started";
        Mail::to($email)->send(new MailSender($subject, $greeting, $message, '', ''));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Payment Successfully Confirmed');
        return redirect()->back();
    }

    //education license deposit
    public function depositEducationLicense(Request $request) {
        if ($request->type == '') {
            $data['deposits'] = \App\Models\UserEducationLicensePlan::whereNotNull('coin_id')->orderBy('created_at', 'desc')->get();
            $data['type'] = '';
        }

        if ($request->type == 'confirmed') {
            $data['deposits'] = \App\Models\UserEducationLicensePlan::whereNotNull('coin_id')->whereStatus_deposit(true)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'confirmed';
        }
        if ($request->type == 'pending') {
            $data['deposits'] = \App\Models\UserEducationLicensePlan::whereNotNull('coin_id')->whereStatus_deposit(false)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'pending';
        }
        return view('admin.education.index', $data);
    }

    public function deleteDepositEducationLicense(Request $request) {
        $id = $request->id;
        $deposit = \App\Models\UserEducationLicensePlan::find($id);
        if ($deposit->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Education License Deposit deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Education License Deposit Delete failed');
            return redirect()->back();
        }
    }

    public function confirmEducationLicense(Request $request) {
        $setting = Setting::whereId(1)->first();
        $id = $request->id;
        $payment = UserEducationLicensePlan::find($id);
        $current = Carbon::now();
        $status_deposit = true;
        $due = $current->addHours($payment->plan->compound->compound);
        $due_pay = $due->addMinutes(2);
        $payment->update([
            'status_deposit' => $status_deposit,
            'due_pay' => $due_pay
        ]);


        $user_ref = Reference::whereReferred_id($payment->user_id)->first();
        $reward = $payment->amount;

        $firstUserReward = $setting->level_eduction_license_1 / 100 * $reward;
        $allReward = $setting->level_eduction_license_2_7 / 100 * $reward;
        $newUserReward = $allReward;
        if (is_object($user_ref)) {
            $first_pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
            if (!is_object($first_pay)) {
                $first_pay = UserCoin::create([
                            'user_id' => $user_ref->user_id,
                            'coin_id' => $payment->usercoin->coin->id,
                            'address' => null
                ]);
            }

            $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref->user_id)->where('due_pay', '>', Carbon::now())->first();
            if (is_object($first_pay) && is_object($userSignalSub)) {

                //first reward
                $newFirstUserReward = $firstUserReward;
                //create user withdrawal data
                $user_withdraw = new UserWithdrawal();
                $user_withdraw->amount = $newFirstUserReward;
                $user_withdraw->user_id = $first_pay->user_id;
                $user_withdraw->coin_id = $first_pay->id;
                $user_withdraw->type = "Referral Bonus";
                $user_withdraw->status = true;
                $user_withdraw->plan_id = $payment->plan_id;
                $user_withdraw->save();
                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($first_pay->user_id)));
                $userMoney->user_id = $first_pay->user_id;
                $userMoney->amount = $userMoney->amount + $newFirstUserReward;
                $userMoney->save();
                //transcation log
                Transaction::create([
                    'user_id' => $first_pay->user_id,
                    'transaction_id' => $payment->transaction_id,
                    'type' => 'Commissions',
                    'name_type' => 'Referral Bonus  Educational License',
                    'coin_id' => $first_pay->id,
                    'amount' => $newFirstUserReward,
                    'amount_profit' => $newFirstUserReward,
                    'description' => 'Referral Bonus Under Educational License ' . $payment->plan->name . ' license',
                    'status' => true
                ]);
                $message = 'USD' . $newFirstUserReward . "  Educational License Referral Bonus has been successfully sent to you with  Transaction ID Is : #$payment->transaction_id";
                $name = $first_pay->user->username;
                $greeting = "Hello $name";
                Mail::to($first_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message, '', ''));
                //second reward
                $user_ref_second = Reference::whereReferred_id($first_pay->user_id)->first();
                if (is_object($user_ref_second)) {
                    $second_pay = UserCoin::whereUser_id($user_ref_second->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                    if (!is_object($second_pay)) {
                        $second_pay = UserCoin::create([
                                    'user_id' => $user_ref_second->user_id,
                                    'coin_id' => $payment->usercoin->coin->id,
                                    'address' => null
                        ]);
                    }
                    $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref_second->user_id)->where('due_pay', '>', Carbon::now())->first();
                    if (is_object($second_pay) && is_object($userSignalSub)) {
                        //create user withdrawal data
                        $user_withdraw_second = new UserWithdrawal();
                        $user_withdraw_second->amount = $newUserReward;
                        $user_withdraw_second->user_id = $second_pay->user_id;
                        $user_withdraw_second->coin_id = $second_pay->id;
                        $user_withdraw_second->type = "Referral Bonus  Educational License";
                        $user_withdraw_second->status = true;
                        $user_withdraw_second->plan_id = $payment->plan_id;
                        $user_withdraw_second->save();
                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($second_pay->user_id)));
                        $userMoney->user_id = $second_pay->user_id;
                        $userMoney->amount = $userMoney->amount + $newUserReward;
                        $userMoney->save();
                        //transcation log
                        Transaction::create([
                            'user_id' => $second_pay->user_id,
                            'transaction_id' => $payment->transaction_id,
                            'type' => 'Commissions',
                            'name_type' => 'Referral Bonus',
                            'coin_id' => $second_pay->id,
                            'amount' => $newUserReward,
                            'amount_profit' => $newUserReward,
                            'description' => 'Referral Bonus Under  Educational License' . $payment->plan->name . ' license',
                            'status' => true
                        ]);
                        $message_second = 'USD' . $newUserReward . " Educational License Second step Referral Bonus has been successfully sent to you with Transaction ID Is : #$payment->transaction_id";

                        $name = $second_pay->user->username;
                        $greeting = "Hello $name";
                        Mail::to($second_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_second, '', ''));
                        ///third
                        $user_ref_third = Reference::whereReferred_id($second_pay->user_id)->first();
                        if (is_object($user_ref_third)) {
                            $third_pay = UserCoin::whereUser_id($user_ref_third->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                            if (!is_object($third_pay)) {
                                $third_pay = UserCoin::create([
                                            'user_id' => $user_ref_third->user_id,
                                            'coin_id' => $payment->usercoin->coin->id,
                                            'address' => null
                                ]);
                            }
                            $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref_third->user_id)->where('due_pay', '>', Carbon::now())->first();
                            if (is_object($third_pay) && is_object($userSignalSub)) {

                                //create user withdrawal data
                                $user_withdraw_third = new UserWithdrawal();
                                $user_withdraw_third->amount = $newUserReward;
                                $user_withdraw_third->user_id = $third_pay->user_id;
                                $user_withdraw_third->coin_id = $third_pay->id;
                                $user_withdraw_third->type = "Referral Bonus  Educational License";
                                $user_withdraw_third->status = true;
                                $user_withdraw_third->plan_id = $payment->plan_id;
                                $user_withdraw_third->save();
                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($third_pay->user_id)));
                                $userMoney->user_id = $third_pay->user_id;
                                $userMoney->amount = $userMoney->amount + $newUserReward;
                                $userMoney->save();
                                //transcation log
                                Transaction::create([
                                    'user_id' => $third_pay->user_id,
                                    'transaction_id' => $payment->transaction_id,
                                    'type' => 'Commissions',
                                    'name_type' => 'Referral Bonus',
                                    'coin_id' => $third_pay->id,
                                    'amount' => $newUserReward,
                                    'amount_profit' => $newUserReward,
                                    'description' => 'Referral Bonus Under  Educational License' . $payment->plan->name . ' license',
                                    'status' => true
                                ]);
                                $message_third = 'USD' . $newUserReward . " Educational License Third step Referral Bonus has been successfully sent to you with Transaction ID Is : #$payment->transaction_id";
                                $name = $third_pay->user->username;
                                $greeting = "Hello $name";
                                Mail::to($third_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_third, '', ''));

                                ///fourth
                                $user_ref_fourth = Reference::whereReferred_id($third_pay->user_id)->first();
                                if (is_object($user_ref_fourth)) {
                                    $fourth_pay = UserCoin::whereUser_id($user_ref_fourth->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                                    if (!is_object($fourth_pay)) {
                                        $fourth_pay = UserCoin::create([
                                                    'user_id' => $user_ref_fourth->user_id,
                                                    'coin_id' => $payment->usercoin->coin->id,
                                                    'address' => null
                                        ]);
                                    }
                                    $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref_fourth->user_id)->where('due_pay', '>', Carbon::now())->first();
                                    if (is_object($fourth_pay) && is_object($userSignalSub)) {

                                        //create user withdrawal data
                                        $user_withdraw_fourth = new UserWithdrawal();
                                        $user_withdraw_fourth->amount = $newUserReward;
                                        $user_withdraw_fourth->user_id = $fourth_pay->user_id;
                                        $user_withdraw_fourth->coin_id = $fourth_pay->id;
                                        $user_withdraw_fourth->type = "Referral Bonus  Educational License";
                                        $user_withdraw_fourth->status = true;
                                        $user_withdraw_fourth->plan_id = $payment->plan_id;
                                        $user_withdraw_fourth->save();
                                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($fourth_pay->user_id)));
                                        $userMoney->user_id = $fourth_pay->user_id;
                                        $userMoney->amount = $userMoney->amount + $newUserReward;
                                        $userMoney->save();
                                        //transcation log
                                        Transaction::create([
                                            'user_id' => $fourth_pay->user_id,
                                            'transaction_id' => $payment->transaction_id,
                                            'type' => 'Commissions',
                                            'name_type' => 'Referral Bonus',
                                            'coin_id' => $fourth_pay->id,
                                            'amount' => $newUserReward,
                                            'amount_profit' => $newUserReward,
                                            'description' => 'Referral Bonus Under  Educational License' . $payment->plan->name . ' license',
                                            'status' => true
                                        ]);
                                        $message_fourth = 'USD' . $newUserReward . " Educational License Fourth step Referral Bonus has been successfully sent to you with Transaction ID Is : #$payment->transaction_id";
                                        $name = $fourth_pay->user->username;
                                        $greeting = "Hello $name";
                                        Mail::to($fourth_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_fourth, '', ''));

                                        ///five
                                        $user_ref_five = Reference::whereReferred_id($fourth_pay->user_id)->first();
                                        if (is_object($user_ref_five)) {
                                            $five_pay = UserCoin::whereUser_id($user_ref_five->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                                            if (!is_object($five_pay)) {
                                                $five_pay = UserCoin::create([
                                                            'user_id' => $user_ref_five->user_id,
                                                            'coin_id' => $payment->usercoin->coin->id,
                                                            'address' => null
                                                ]);
                                            }
                                            $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref_five->user_id)->where('due_pay', '>', Carbon::now())->first();
                                            if (is_object($five_pay) && is_object($userSignalSub)) {

                                                //create user withdrawal data
                                                $user_withdraw_five = new UserWithdrawal();
                                                $user_withdraw_five->amount = $newUserReward;
                                                $user_withdraw_five->user_id = $five_pay->user_id;
                                                $user_withdraw_five->coin_id = $five_pay->id;
                                                $user_withdraw_five->type = "Referral Bonus  Educational License";
                                                $user_withdraw_five->status = true;
                                                $user_withdraw_five->plan_id = $payment->plan_id;
                                                $user_withdraw_five->save();
                                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($five_pay->user_id)));
                                                $userMoney->user_id = $five_pay->user_id;
                                                $userMoney->amount = $userMoney->amount + $newUserReward;
                                                $userMoney->save();
                                                //transcation log
                                                Transaction::create([
                                                    'user_id' => $five_pay->user_id,
                                                    'transaction_id' => $payment->transaction_id,
                                                    'type' => 'Commissions',
                                                    'name_type' => 'Referral Bonus',
                                                    'coin_id' => $five_pay->id,
                                                    'amount' => $newUserReward,
                                                    'amount_profit' => $newUserReward,
                                                    'description' => 'Referral Bonus Under  Educational License' . $payment->plan->name . ' license',
                                                    'status' => true
                                                ]);
                                                $message_five = 'USD' . $newUserReward . " Educational License Fiveth step Referral Bonus has been successfully sent to you with Transaction ID Is : #$payment->transaction_id";
                                                $name = $five_pay->user->username;
                                                $greeting = "Hello $name";
                                                Mail::to($five_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_five, '', ''));

                                                ///six
                                                $user_ref_six = Reference::whereReferred_id($five_pay->user_id)->first();
                                                if (is_object($user_ref_six)) {
                                                    $six_pay = UserCoin::whereUser_id($user_ref_six->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                                                    if (!is_object($six_pay)) {
                                                        $six_pay = UserCoin::create([
                                                                    'user_id' => $user_ref_six->user_id,
                                                                    'coin_id' => $payment->usercoin->coin->id,
                                                                    'address' => null
                                                        ]);
                                                    }
                                                    $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref_six->user_id)->where('due_pay', '>', Carbon::now())->first();
                                                    if (is_object($six_pay) && is_object($userSignalSub)) {

                                                        //create user withdrawal data
                                                        $user_withdraw_six = new UserWithdrawal();
                                                        $user_withdraw_six->amount = $newUserReward;
                                                        $user_withdraw_six->user_id = $six_pay->user_id;
                                                        $user_withdraw_six->coin_id = $six_pay->id;
                                                        $user_withdraw_six->type = "Referral Bonus  Educational License";
                                                        $user_withdraw_six->status = true;
                                                        $user_withdraw_six->plan_id = $payment->plan_id;
                                                        $user_withdraw_six->save();
                                                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($six_pay->user_id)));
                                                        $userMoney->user_id = $six_pay->user_id;
                                                        $userMoney->amount = $userMoney->amount + $newUserReward;
                                                        $userMoney->save();
                                                        //transcation log
                                                        Transaction::create([
                                                            'user_id' => $six_pay->user_id,
                                                            'transaction_id' => $payment->transaction_id,
                                                            'type' => 'Commissions',
                                                            'name_type' => 'Referral Bonus',
                                                            'coin_id' => $six_pay->id,
                                                            'amount' => $newUserReward,
                                                            'amount_profit' => $newUserReward,
                                                            'description' => 'Referral Bonus Under  Educational License' . $payment->plan->name . ' license',
                                                            'status' => true
                                                        ]);
                                                        $message_six = 'USD' . $newUserReward . " Educational License Six step Referral Bonus has been successfully sent to you with Transaction ID Is : #$payment->transaction_id";
                                                        $name = $six_pay->user->username;
                                                        $greeting = "Hello $name";
                                                        Mail::to($six_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_six, '', ''));

                                                        ///seven
                                                        $user_ref_seven = Reference::whereReferred_id($six_pay->user_id)->first();
                                                        if (is_object($user_ref_seven)) {
                                                            $seven_pay = UserCoin::whereUser_id($user_ref_seven->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                                                            if (!is_object($seven_pay)) {
                                                                $seven_pay = UserCoin::create([
                                                                            'user_id' => $user_ref_seven->user_id,
                                                                            'coin_id' => $payment->usercoin->coin->id,
                                                                            'address' => null
                                                                ]);
                                                            }
                                                            $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref_seven->user_id)->where('due_pay', '>', Carbon::now())->first();
                                                            if (is_object($seven_pay) && is_object($userSignalSub)) {

                                                                //create user withdrawal data
                                                                $user_withdraw_seven = new UserWithdrawal();
                                                                $user_withdraw_seven->amount = $newUserReward;
                                                                $user_withdraw_seven->user_id = $seven_pay->user_id;
                                                                $user_withdraw_seven->coin_id = $seven_pay->id;
                                                                $user_withdraw_seven->type = "Referral Bonus  Educational License";
                                                                $user_withdraw_seven->status = true;
                                                                $user_withdraw_seven->plan_id = $payment->plan_id;
                                                                $user_withdraw_seven->save();
                                                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($seven_pay->user_id)));
                                                                $userMoney->user_id = $seven_pay->user_id;
                                                                $userMoney->amount = $userMoney->amount + $newUserReward;
                                                                $userMoney->save();
                                                                //transcation log
                                                                Transaction::create([
                                                                    'user_id' => $seven_pay->user_id,
                                                                    'transaction_id' => $payment->transaction_id,
                                                                    'type' => 'Commissions',
                                                                    'name_type' => 'Referral Bonus',
                                                                    'coin_id' => $seven_pay->id,
                                                                    'amount' => $newUserReward,
                                                                    'amount_profit' => $newUserReward,
                                                                    'description' => 'Referral Bonus Under  Educational License' . $payment->plan->name . ' license',
                                                                    'status' => true
                                                                ]);
                                                                $message_seven = 'USD' . $newUserReward . " Educational License Seven step Referral Bonus has been successfully sent to you with Transaction ID Is : #$payment->transaction_id";
                                                                $name = $seven_pay->user->username;
                                                                $greeting = "Hello $name";
                                                                Mail::to($seven_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_seven, '', ''));

                                                                ///eight
                                                                $user_ref_eight = Reference::whereReferred_id($seven_pay->user_id)->first();
                                                                if (is_object($user_ref_eight)) {
                                                                    $eight_pay = UserCoin::whereUser_id($user_ref_eight->user_id)->whereCoin_id($payment->usercoin->coin->id)->first();
                                                                    if (!is_object($eight_pay)) {
                                                                        $eight_pay = UserCoin::create([
                                                                                    'user_id' => $user_ref_eight->user_id,
                                                                                    'coin_id' => $payment->usercoin->coin->id,
                                                                                    'address' => null
                                                                        ]);
                                                                    }
                                                                    $userSignalSub = UserEducationLicensePlan::whereUser_id($user_ref_eight->user_id)->where('due_pay', '>', Carbon::now())->first();
                                                                    if (is_object($eight_pay) && is_object($userSignalSub)) {

                                                                        //create user withdrawal data
                                                                        $user_withdraw_eight = new UserWithdrawal();
                                                                        $user_withdraw_eight->amount = $newUserReward;
                                                                        $user_withdraw_eight->user_id = $eight_pay->user_id;
                                                                        $user_withdraw_eight->coin_id = $eight_pay->id;
                                                                        $user_withdraw_eight->type = "Referral Bonus  Educational License";
                                                                        $user_withdraw_eight->status = true;
                                                                        $user_withdraw_eight->plan_id = $payment->plan_id;
                                                                        $user_withdraw_eight->save();
                                                                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($eight_pay->user_id)));
                                                                        $userMoney->user_id = $eight_pay->user_id;
                                                                        $userMoney->amount = $userMoney->amount + $newUserReward;
                                                                        $userMoney->save();
                                                                        //transcation log
                                                                        Transaction::create([
                                                                            'user_id' => $eight_pay->user_id,
                                                                            'transaction_id' => $payment->transaction_id,
                                                                            'type' => 'Commissions',
                                                                            'name_type' => 'Referral Bonus',
                                                                            'coin_id' => $eight_pay->id,
                                                                            'amount' => $newUserReward,
                                                                            'amount_profit' => $newUserReward,
                                                                            'description' => 'Referral Bonus Under  Educational License' . $payment->plan->name . ' license',
                                                                            'status' => true
                                                                        ]);
                                                                        $message_eight = 'USD' . $newUserReward . " Educational License Eight step Referral Bonus has been successfully sent to you with Transaction ID Is : #$payment->transaction_id";
                                                                        $name = $eight_pay->user->username;
                                                                        $greeting = "Hello $name";
                                                                        Mail::to($eight_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_eight, '', ''));
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
//endref 
        $trans = Transaction::whereTransaction_id($payment->transaction_id)->first();
        $trans->update([
            'status' => true
        ]);

        $email = $payment->user->email;
        $name = $payment->user->username;
        $greeting = "Hello $name";
        $subject = ' Educational License payment Confirmation';
        $message = $payment->plan->name . "  Educational license  deposit has been confirmed";
        Mail::to($email)->send(new MailSender($subject, $greeting, $message, '', ''));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', ' Educational License Payment Successfully Confirmed');
        return redirect()->back();
    }

    public function withdraw(Request $request) {
        if ($request->type == '') {
            $data['withdraws'] = Withdraw::orderBy('created_at', 'desc')->get();
            $data['type'] = '';
        }
        if ($request->type == 'pending') {
            $data['withdraws'] = Withdraw::whereStatus(false)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'pending';
        }
        if ($request->type == 'completed') {
            $data['withdraws'] = Withdraw::whereStatus(true)->orderBy('created_at', 'desc')->get();
            $data['type'] = 'completed';
        }

        return view('admin.withdraw.index', $data);
    }

    public function fundDeposit(Request $request) {
        if ($request->type == '') {
            $data['withdraws'] = UserWithdrawal::orderBy('created_at', 'desc')->whereUser_deposit(true)->whereDeposit_user_paid(false)->get();
            $data['type'] = '';
        }
        if ($request->type == 'paid') {
            $data['withdraws'] = UserWithdrawal::orderBy('created_at', 'desc')->whereUser_deposit(true)->whereDeposit_user_paid(true)->get();
            $data['type'] = 'paid';
        }


        return view('admin.fund.index', $data);
    }

    public function deleteWithdraw(Request $request) {
        $id = $request->id;

        $withdraw = Withdraw::find($id);


        if ($withdraw->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Withdraw deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Withdraw Delete failed');
            return redirect()->back();
        }
    }

    public function deleteFundDeposit(Request $request) {
        $id = $request->id;

        $withdraw = UserWithdrawal::find($id);


        if ($withdraw->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Fund Deposit deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Fund Deposit Delete failed');
            return redirect()->back();
        }
    }

    public function confirmWithdraw(Request $request) {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $withdraw = Withdraw::find($id);
            $withdraw->update([
                'status' => true,
                'status_withdraw' => true
            ]);
//            UserWithdrawal::whereId($withdraw->user_withdrawal_id)->update([
//                'status' => false
//            ]);
//            $userearn = userTrackEarn::whereUser_id($withdraw->user_id)->first();
//            $userearn->update([
//                'amount' => $userearn->amount - $withdraw->amount
//            ]);
//transcation log
            Transaction::whereTransaction_id($withdraw->transaction_id)->update([
                'status' => true,
            ]);
            $action = $withdraw->usercoin->coin_id;

            if ($action == 1) {
                $name = 'Bitcoin';
            }

            if ($action == 2) {
                $name = 'Ethereum';
            }
            if ($action == 3) {
                $name = 'Bank Wire';
            }
            $setting = Setting::whereId(1)->first();
            $amount = number_format($withdraw->amount);
            $address = $withdraw->usercoin->address;
            $site = $setting['site_name'];
            $greeting = 'Hello ' . $withdraw->user->username . ' ,';
            $text = "You have been credited $$amount from  $site trading account to your $name wallet  <br> <br>$address <br><br> If you need assistance simply reply to this message or visit our website via <br><br> metafxgroup.com <br>We are online and ready to help.<br> Best regards";
            //send admin email
            Mail::to($withdraw->user->email)->send(new MailSender('Payment Notification', $greeting, $text, '', ''));

            $all_money = userTrackEarn::whereUser_id($withdraw->user_id)->first();
            $all_money->update([
                'amount' => $all_money->amount - $withdraw->total_amount
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Withdraw successfully Paid');
        return redirect()->back();
    }

    public function confirmFundDeposit(Request $request) {
        $id = $request->id;

        DB::beginTransaction();
        try {
            $withdraw = UserWithdrawal::find($id);
            $withdraw->update([
                'status' => true,
                'deposit_user_paid' => true
            ]);

            $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($withdraw->user_id)));
            $userMoney->user_id = $withdraw->user_id;
            $userMoney->amount = $userMoney->amount + $withdraw->amount;
            $userMoney->save();
//transcation log
            Transaction::whereTransaction_id($withdraw->transaction_id)->update([
                'status' => true,
            ]);

            $greeting = 'Hello ' . $withdraw->user->username . ' automatic payout Initiated';
            $text = "your deposit has been confirmed and fund credited to your walllet";
            //send admin email
            Mail::to($withdraw->user->email)->send(new MailSender('Deposit confirmed from Blockchain', $greeting, $text, '', ''));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Fund deposit account  successfully Confirmed');
        return redirect()->back();
    }

    public function planSetting() {
        $data['compounds'] = Compound::all();
        $data['plans'] = Plan::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.plan', $data);
    }

    public function addPlan(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => 'required|unique:plans',
            'percentage' => 'required',
            'min' => 'required',
            'max' => 'required',
            'compound_id' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if (!empty($request->photo)) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $rand = 'photo' . $request->name;
                $name = $rand . '.' . $extension;
                $file->move(public_path('/images/plan'), $name);
                $save = 'images/plan/' . $name;
                $input['image'] = $save;
            }
        }
        Plan::create($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Plan successfully Created');
        return redirect()->back();
    }

    public function deletePlan(Request $request) {
        $id = $request->id;
        $plan = Plan::find($id);
        if ($plan->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Plan deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Plan Delete failed');
            return redirect()->back();
        }
    }

    public function editPlan(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $plan = Plan::find($id);
        $rules = ([
            'name' => 'required',
            'percentage' => 'required',
            'min' => 'required',
            'max' => 'required',
            'compound_id' => 'required'
        ]);

        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if (!empty($request->photo)) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $rand = 'photo' . $request->name;
                $name = $rand . '.' . $extension;
                $file->move(public_path('/images/plan'), $name);
                $save = 'images/plan/' . $name;
                $input['image'] = $save;
            }
        }
        $plan->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Plan successfully Updated');
        return redirect()->back();
    }

    //education License
    public function educationPlanSetting() {
        $data['compounds'] = Compound::all();
        $data['plans'] = EducationLicensePlan::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.education-plan', $data);
    }

    public function addEducationPlanSetting(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => 'required|unique:plans',
            'amount' => 'required',
            'compound_id' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        EducationLicensePlan::create($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Education Plan License successfully Created');
        return redirect()->back();
    }

    public function deleteEducationPlanSetting(Request $request) {
        $id = $request->id;
        $plan = EducationLicensePlan::find($id);
        if ($plan->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Education Plan License deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Education Plan License Delete failed');
            return redirect()->back();
        }
    }

    public function editEducationPlanSetting(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $plan = EducationLicensePlan::find($id);
        $rules = ([
            'name' => 'required',
            'amount' => 'required',
            'compound_id' => 'required'
        ]);

        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        $plan->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Education Plan License successfully Updated');
        return redirect()->back();
    }

    public function editDeposit(Request $request) {
        $input = $request->all();
        $input['plan_id'] = $request->plan;
        $id = $request->id;
        $plan = Investment::find($id);
        $rules = ([
            'amount' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $plan->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Depost successfully Updated');
        return redirect()->back();
    }

    //send signals
    public function sendSignal() {
        $data['signals'] = EducationLicenseSignal::orderBy('created_at', 'desc')->get();
        return view('admin.education.signal', $data);
    }

    public function addSignal(Request $request) {
        $input = $request->all();
        $rules = ([
            'title' => 'required|unique:education_license_signals',
            'content' => 'required',
            'trading_pair' => 'required',
//            'analytic_link' => 'required|url',
            'image' => 'required',
        ]);
        $error = static::getErrorMessage($input, $rules);
        if ($error) {
            return $error;
        }
        $input['slug'] = str_slug($request->trading_pair, '-');
        if (!empty($request->image)) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $rand = 'image' . str_slug($request->title, '-');
                $name = str_slug($rand, '') . '.' . $extension;
                $file->move(public_path('/images/signal'), $name);
                $save = 'images/signal/' . $name;
                $input['image'] = $save;
            }
        }
        EducationLicenseSignal::create($input);
        return ([
            'status' => 200,
            'message' => 'New Signal successfully Created'
        ]);
    }

    public function deleteSignal(Request $request) {
        $id = $request->id;
        $signal = EducationLicenseSignal::find($id);
        if ($signal->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Signal deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Signal Delete failed');
            return redirect()->back();
        }
    }

    public function editSingleSignal(Request $request) {
        $data['signal'] = EducationLicenseSignal::whereId($request->id)->firstOrFail();
        return view('admin.education.signal-edit', $data);
    }

    public function editSignal(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $signal = EducationLicenseSignal::find($id);
        $rules = ([
            'title' => 'required',
            'trading_pair' => 'required',
            'content' => 'required',
//            'analytic_link' => 'required|url',
        ]);

        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $rand = 'image' . str_slug($request->title, '-');
            $name = str_slug($rand, '') . '.' . $extension;
            $file->move(public_path('/images/signal'), $name);
            $save = 'images/signal/' . $name;
            $input['image'] = $save;
            $image_check = $save;
        }
        $check = EducationLicenseSignal::whereTitle($request->title)->first();

        if (empty($request->image)) {
            $image = $check->image;
        } else {
            $image = $image_check;
        }
        if (is_object($check)) {
            $check->update([
                'trading_pair' => $request->trading_pair,
                'content' => $request->content,
                'analytic_link' => $request->analytic_link,
                'image' => $image
            ]);
            return ([
                'status' => 200,
                'message' => 'Singal successfully Updated'
            ]);
        }
        $input['slug'] = str_slug($request->title, '-');
        $signal->update($input);
        return ([
            'status' => 200,
            'message' => 'Singal successfully Updated'
        ]);
    }

    public function compoundSetting() {
        $data['compounds'] = Compound::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.compound', $data);
    }

    public function addCompound(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => 'required|unique:compounds',
            'compound' => 'required|unique:compounds'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        Compound::create($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Compound successfully Created');
        return redirect()->back();
    }

    public function deleteCompound(Request $request) {
        $id = $request->id;
        $compound = Compound::find($id);
        if ($compound->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Compound deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Compound Delete failed');
            return redirect()->back();
        }
    }

    public function editCompound(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $compound = Compound::find($id);
        $rules = ([
            'name' => 'required',
            'compound' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $compound->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Compound successfully Updated');
        return redirect()->back();
    }

    public function coinSetting() {
        $data['coins'] = Coin::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.coin', $data);
    }

    public function addCoin(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => 'required|unique:coins',
//            'address' => 'required|unique:coins'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $input['slug'] = str_slug($request->name, '_') . '_address';

        if (!empty($request->photo)) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins'), $name);
                $save = 'coins/' . $name;
                $input['photo'] = $save;
            }
        }
        if (!empty($request->q_code)) {
            if ($request->hasFile('q_code')) {
                $file = $request->file('q_code');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins/qcode'), $name);
                $save = 'coins/qcode/' . $name;
                $input['q_code'] = $save;
            }
        }


        Coin::create($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Coin successfully Created');
        return redirect()->back();
    }

    public function deleteCoin(Request $request) {
        $id = $request->id;
        $coin = Coin::find($id);
        if ($coin->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Coin deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Coin Delete failed');
            return redirect()->back();
        }
    }

    public function editCoin(Request $request) {
        $input = $request->all();
        $id = $request->id;
        $coin = Coin::find($id);
        $rules = ([
            'name' => 'required',
            'address' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $input['slug'] = str_slug($request->name, '_') . '_address';

        if (!empty($request->photo)) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins'), $name);
                $save = 'coins/' . $name;
                $input['photo'] = $save;
            }
        }
        if (!empty($request->q_code)) {
            if ($request->hasFile('q_code')) {
                $file = $request->file('q_code');
                $extension = $file->getClientOriginalExtension();
                $rand = $input['slug'];
                $name = $rand . '.' . $extension;
                $file->move(public_path('/coins/qcode'), $name);
                $save = 'coins/qcode/' . $name;
                $input['q_code'] = $save;
            }
        }

        $coin->update($input);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Coin successfully Updated');
        return redirect()->back();
    }

    public function fund(Request $request) {
        $input = $request->all();
        $rules = ([
            'type' => 'required',
            'reason' => 'required',
            'amount' => 'required',
            'user_wallet' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        DB::beginTransaction();
        try {
            $amount = $request->amount;

            if ($request->type == 'add') {
                $type_name = 'Added';
            }
            if ($request->type == 'substract') {
                $type_name = 'Substracted';
            }

            $usercoin = userTrackEarn::whereUser_id($request->user_id)->first();

            if ($request->type == 'add') {

                if (!is_object($usercoin)) {
                    $usercoin = new userTrackEarn;
                    $usercoin->amount = $request->amount;
                    $usercoin->user_id = $request->user_id;
                    $usercoin->save();
                } else {
                    $usercoin->amount = $usercoin->amount + $request->amount;
                    $usercoin->save();
                }

                $message = "$request->reason";
                $name = $usercoin->user->username;
                $greeting = "Hello $name";
                //transcation log
                Transaction::create([
                    'user_id' => $request->user_id,
                    'transaction_id' => strtolower(Str::random(10)),
                    'type' => 'Added',
                    'name_type' => $type_name,
                    'withdraw_charge' => 0,
                    'coin_id' => $request->user_wallet,
                    'amount' => $request->amount,
                    'description' => $request->reason,
                    'status' => true
                ]);
                //send mail
                $email = $usercoin->user->email;
                $subject = '$' . $request->amount . ' fund added';

                Mail::to($email)->send(new MailSender($subject, $greeting, $message, '', ''));
            }
            if ($request->type == 'substract') {
                if (!is_object($usercoin)) {
                    $usercoin = new userTrackEarn;
                    $usercoin->amount = $usercoin->amount - $request->amount;
                    $usercoin->user_id = $request->user_id;
                    $usercoin->save();
                } else {
                    $usercoin->amount = $usercoin->amount - $request->amount;
                    $usercoin->save();
                }

                $message = "$request->reason";
                $name = $usercoin->user->username;
                $greeting = "Hello $name";
                //transcation log
                Transaction::create([
                    'user_id' => $request->user_id,
                    'transaction_id' => strtolower(Str::random(10)),
                    'type' => 'Subtract',
                    'name_type' => $type_name,
                    'withdraw_charge' => 0,
                    'amount' => $request->amount,
                    'coin_id' => $request->user_wallet,
                    'description' => $request->reason,
                    'status' => true
                ]);
                //send mail

                $email = $usercoin->user->email;
                $subject = '$' . $request->amount . ' fund substracted';
                Mail::to($email)->send(new MailSender($subject, $greeting, $message, '', ''));
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Fund successfully Proccessed');
        return redirect()->back();
    }

    public function kycAccept(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        $user->kyc_status = true;
        $user->save();
        $subject = 'KYC COnfirmation';
        $message = "KYC successfully accepted , thanks for trusting us";

        Notification::route('mail', $user->email)
                ->notify(new PlanDepositMail($subject, $message));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'KYC successfully Accepted');
        return redirect()->back();
    }

    public function kycReject(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        $user->kyc_status = false;
        $user->save();
        $subject = 'KYC COnfirmation';
        $message = "KYC verification rejected , try again";

        Notification::route('mail', $user->email)
                ->notify(new PlanDepositMail($subject, $message));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'KYC successfully Rejected');
        return redirect()->back();
    }

    public function compounding() {
        $data['users'] = User::orderBy('created_at', 'desc')->get();
        $data['compounds'] = Compound::all();
        return view('admin.compounding', $data);
    }

    public function postCompounding(Request $request) {
        $input = $request->all();


        $rules = [
            'user' => 'required',
            'compound' => 'required'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        $user = UserCoin::whereUser_id($request->user)->first();
        $txt = strtoupper(Str::random(20));
        $current = Carbon::now();
        $com = Compound::whereId($request->compound)->first();
        $due = $current->addHours($com->compound);
        $due_pay = $due->addMinutes(2);
        $invest = UserCompounding::create([
                    'transaction_id' => $txt,
                    'user_id' => $user->user_id,
                    'coin_id' => $user->coin_id,
                    'amount' => $user->amount,
                    'compound_id' => $com->id,
                    'run_count' => 0,
                    'due_pay' => $due_pay,
                    'status' => 0
        ]);
        Transaction::create([
            'user_id' => $user->user_id,
            'transaction_id' => $invest->transaction_id,
            'type' => 'Compouding Investment',
            'name_type' => 'Compounding',
            'coin_id' => $user->coin_id,
            'amount' => $user->amount,
            'amount_profit' => $user->amount,
            'description' => 'Compounding'
        ]);
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Compounding successfully set for user ' . $user->user->username);
        return redirect()->back();
    }

}
