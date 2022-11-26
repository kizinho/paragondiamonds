<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Traits\HasError;
use App\Models\Admin\Setting;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Notification;
use App\Mail\ContactUsMail;
use App\Mail\SubscriberMail;
use App\Models\EmailSubscriber;
use App\Models\Plan;
use App\Models\Investment;
use App\Models\Withdraw;
use App\Models\Coin;

class FrontController extends Controller {

    use HasError;

    public function index() {
        $data['coins'] = Coin::orderBy('created_at', 'asc')->whereStatus(true)->get();
        $data['plans'] = Plan::all();
        $data['last_deposits'] = Investment::inRandomOrder()->orderBy('created_at', 'desc')->take(6)->get();
        $data['last_withdraws'] = Withdraw::inRandomOrder()->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', $data);
    }

    public function pricing() {
        $data['plans'] = Plan::all();
        return view('pages.pricing', $data);
    }

    public function contact(Request $request) {
        $input = $request->all();
        $rules = ([
            'name' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string']
        ]);
        $error = static::getErrorMessage($input, $rules);
        if ($error) {
            return $error;
        }

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $setting = Setting::whereId(1)->first();
        ContactUs::create($input);
        $subject = $request->subject;
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        Notification::route('mail', $setting['send_notify_email'])
                ->notify(new ContactUsMail($subject, $name, $email, $message));
        return [
            'status' => 200,
            'message' => 'Message Sent, We will get back to You',
        ];
    }

    public function sub(Request $request) {
        $input = $request->all();
        $rules = ([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:email_subscribers']
        ]);
        $error = static::getErrorMessage($input, $rules);
        if ($error) {
            return $error;
        }
        EmailSubscriber::create($input);
        $subject = 'Subscription for Newsletter for Dailly Offer was Successfull';
        $message = "You can now keep receiving new offer Bonus directly to your email.";
        Notification::route('mail', $request->email)
                ->notify(new SubscriberMail($subject, $message));
        return [
            'status' => 200,
            'message' => 'Subscription for Newsletter for Dailly Offer was Successfull',
        ];
    }

    public function plan() {
        $data['plans'] = Plan::all();
        $data['plan_use'] = Plan::orderBy('created_at', 'asc')->take(1)->first();
        return view('pages.plan', $data);
    }

    public function education() {
        return view('pages.education');
    }

    public function getPlan(Request $request) {
        $min = Plan::whereId($request->plan_id)->first();
        if ($min->name == 'PLAN 6') {
            $data['min'] = $min->min;
            $data['sign'] = 'BTC';
            $data['profit'] = $min->min * $min->percentage / 100;
        } else {
            $data['min'] = number_format($min->min, 2);
            $data['sign'] = '$';
            $data['profit'] = '$' . $min->min * $min->percentage / 100;
        }
        $data['amount'] = $min->min;
        $data['percentage'] = $min->percentage . '%';
        $data['p_id'] = $min->id;
        return $data;
    }

    public function getCoin(Request $request) {

        $plan = Plan::whereId($request->plan_id)->first();
        $general_coin = file_get_contents('https://api.coincap.io/v2/assets');
        $eth = $general_coin;
        $ethereum = json_decode($eth);
        $ethereum_final = $ethereum->data[1]->priceUsd;
        $data['eth'] = number_format(floatval($plan->min / $ethereum_final), 6, '.', '');
        ;
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        $data['btc'] = number_format(floatval($plan->min / $btcrate), 6, '.', '');
//        if ($request->amount < $plan->min) {
//            $data['message_danger'] = 'Amount less than minimum price  ';
//            $data['status'] = 401;
//            return $data;
//        }
//        if ($request->amount > $plan->max) {
//            $data['message_danger'] = 'Amount greater than Max price  ';
//            $data['status'] = 401;
//            return $data;
//        }
        $setting = Setting::whereId(1)->first();
        $data['direct_bonus'] = "$plan->percentage% / $setting->level_1% / $setting->level_2%";
        $data['amount'] = number_format($plan->min);
        $net_profit_cal = $plan->min * $plan->percentage / 100;
        $net_profit = $net_profit_cal * 30;
//        $return = $plan->min + $net_profit;
        $data['net_profit'] = number_format($net_profit);
        $data['return'] = number_format($net_profit_cal, 2);
        return $data;
    }

}
