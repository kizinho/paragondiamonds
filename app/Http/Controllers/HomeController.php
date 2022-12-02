<?php

namespace App\Http\Controllers;

use App\Models\UserCoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Investment;
use App\Models\Withdraw;
use App\Models\Plan;
use App\Models\Coin;
use \App\Http\Controllers\Traits\HasError;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\PlanDepositMail;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Models\Reference;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\userTrackEarn;
use Illuminate\Support\Facades\Session;
use App\Models\UserWithdrawal;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use App\Mail\MailSender;
use App\Models\EducationLicensePlan;
use App\Models\UserEducationLicensePlan;
use App\Models\EducationLicenseSignal;

class HomeController extends Controller {

    use HasError;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('register_verify');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function singleStonePdf() {
        $file = public_path('frontend/single-stone-pdf.pdf');
        return response()->file($file);
    }

    public function diamondBasketsPdf() {
        $file = public_path('frontend/diamond-baskets-pdf.pdf');
        return response()->file($file);
    }

    public function index() {
        $data['total_balance'] = UserWithdrawal::whereUser_id(Auth::user()->id)->sum('amount');
        $data['total_deposit'] = Investment::whereUser_id(Auth::user()->id)->whereStatus_deposit(1)->sum('amount');
        $data['active_deposit'] = Investment::whereUser_id(Auth::user()->id)->whereStatus_deposit(1)->whereStatus(0)->sum('amount');
        $data['pending_deposit'] = Investment::whereUser_id(Auth::user()->id)->whereStatus_deposit(0)->whereStatus(0)->sum('amount');
        $data['completed_deposit'] = Investment::whereUser_id(Auth::user()->id)->whereStatus_deposit(1)->whereStatus(1)->sum('amount');
        $data['last_deposit'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(1)->pluck('amount')->first();
        $data['total_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->sum('amount');
        $data['completed_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(1)->sum('amount');
        $data['active_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(0)->whereConfirm(1)->sum('amount');
        $data['pending_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(0)->sum('amount');
        $data['last_withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(1)->pluck('amount')->first();
        $data['earned'] = UserWithdrawal::whereUser_id(Auth::user()->id)->whereType('Profit')->whereStatus(true)->sum('amount');
        $data['last_plan'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(1)->first();
        $data['bonus'] = UserWithdrawal::whereUser_id(Auth::user()->id)->whereType('Referral Bonus')->whereStatus(true)->sum('amount');


        $data['deposits'] = Investment::whereUser_id(Auth::user()->id)->whereNotNull('due_pay')->orderBy('created_at', 'desc')->paginate(6);

        $data['withdraws'] = Withdraw::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $data['active_invests'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $data['transactions'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(8)->get();
        $data['transactions_admin'] = Transaction::orderBy('created_at', 'desc')->take(12)->get();

        $data['user_coins'] = UserCoin::whereUser_id(Auth::user()->id)->get();
        $data['refs'] = Reference::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->with('userRef')->get();


        //admin
        $data['users'] = User::count();
        $data['all_deposits'] = Investment::whereStatus_deposit(1)->count();
        $data['all_withdraws'] = Withdraw::count();
        $data['plans'] = Plan::count();
        $data['active_investment'] = Investment::where('due_pay', '>', Carbon::now())->count();
        $data['completed_investment'] = Investment::whereStatus(true)->count();
        $data['pending_investment'] = Investment::whereStatus_deposit(false)->count();
        $data['confirm_investment'] = Investment::whereStatus_deposit(true)->count();
        $data['withdraws_pending'] = Withdraw::whereStatus(false)->count();
        $data['withdraws_complete'] = Withdraw::whereStatus(true)->count();
        $data['admin_transactions'] = Transaction::orderBy('created_at', 'desc')->take(8)->get();

        $data['all_total_balance'] = number_format(UserWithdrawal::whereStatus(true)->sum('amount'), 2);
        $data['all_total_deposit'] = Investment::whereStatus_deposit(1)->sum('amount');
        $data['all_active_deposit'] = Investment::whereStatus_deposit(1)->whereStatus(0)->sum('amount');
        $data['all_earned'] = number_format(UserWithdrawal::whereType('Profit')->whereStatus(true)->sum('amount'), 2);
        $data['all_ref_balance'] = number_format(UserWithdrawal::whereType('Referral Bonus')->whereStatus(true)->sum('amount'), 2);

        $data['plans'] = Plan::all();

        //education signal
        $data['signals'] = EducationLicenseSignal::orderBy('created_at', 'desc')->get();
        $userSignalSub = UserEducationLicensePlan::whereUser_id(Auth::user()->id)->where('due_pay', '>', Carbon::now())->first();
        if (is_object($userSignalSub)) {
            $data['active'] = true;
        } else {
            $data['active'] = false;
        }

        return view('home', $data);
    }

    public function userCapital() {
        $userCapital = UserWithdrawal::whereUser_id(Auth::user()->id)->whereType('Main Balance')->whereStatus(false)->sum('amount');
        if ($userCapital == 0) {
            Mail::to(Auth::user()->email)->send(new MailSender('Captial investment', Auth::user()->username, 'no matured capital at the moment', '', ''));
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', "no matured capital at the moment ");
            return redirect()->back();
        }
        $userMoney = userTrackEarn::firstOrNew(array('user_id' => (Auth::user()->id)));
        $userMoney->amount = $userMoney->amount + $userCapital;
        $userMoney->save();
        UserWithdrawal::whereIn('user_id', [Auth::user()->id])->update([
            'status' => true,
            'main_invest' => true,
            'main_paid' => true,
        ]);

        Mail::to(Auth::user()->email)->send(new MailSender('Captial investment', Auth::user()->username, 'Your capital is now taken and please wait for the next withdrawal payment', '', ''));


        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Your capital is now taken and please wait for the next withdrawal payment');
        return redirect('office');
    }

    public function transactions() {
        $data['transactions'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);

        return view('user.all_transactions', $data);
    }

    public function news() {
        $userSignalSub = UserEducationLicensePlan::whereUser_id(Auth::user()->id)->where('due_pay', '>', Carbon::now())->first();
        if (is_object($userSignalSub)) {
            $data['signals'] = EducationLicenseSignal::orderBy('created_at', 'desc')->paginate(15);
            return view('user.education.details', $data);
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', "Please subscribe to Education License to view this page");
            return redirect('account/education-license');
        }
    }

    public function read($slug) {
        $userSignalSub = UserEducationLicensePlan::whereUser_id(Auth::user()->id)->where('due_pay', '>', Carbon::now())->first();
        if (is_object($userSignalSub)) {
            $data['signal'] = EducationLicenseSignal::whereSlug($slug)->firstOrFail();
            return view('user.education.read', $data);
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', "Please subscribe to Education License to view the link");
            return redirect('office');
        }
    }

    public function deposit() {
        $data['coins'] = Coin::orderBy('created_at', 'asc')->whereStatus(true)->get();
        $data['plans'] = Plan::all();
        return view('user.deposit', $data);
    }

    public function success() {
        return view('user.success');
    }

    //education License
    public function userEducationLicense() {
        $data['plans'] = EducationLicensePlan::all();
        return view('user.education.buy_license', $data);
    }

    public function getEducationLicense(Request $request) {

        $plan = EducationLicensePlan::whereId($request->plan_id)->first();
        $general_coin = file_get_contents('https://api.coincap.io/v2/assets');
        $eth = $general_coin;
        $ethereum = json_decode($eth);
        $ethereum_final = $ethereum->data[1]->priceUsd;
        $data['eth'] = number_format(floatval($plan->amount / $ethereum_final), 6, '.', '');
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        $data['btc'] = number_format(floatval($plan->amount / $btcrate), 6, '.', '');
        $data['amount'] = number_format($plan->amount);
        $data['direct_bonus'] = number_format($plan->number_traders);
        $data['amount'] = number_format($plan->amount);
        $data['return'] = $plan->compound->name;
        $data['plan'] = $plan->id;
        return $data;
    }

    public function userEducationPlan(Request $request) {
        $input = $request->all();

        $rules = [
            'plan' => 'required'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        try {
            $general_coin = file_get_contents('https://api.blockchain.com/v3/exchange/tickers/ETH-USD');
        } catch (\Exception $e) {

            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Checking amount in Crypto failed ');
            return redirect()->back();
        }
        $eth = $general_coin;
        $ethereum = json_decode($eth);
        $ethereum_final = $ethereum->last_trade_price;
        $amount = EducationLicensePlan::whereId($request->plan)->first();
        $data['eth_amount'] = number_format(floatval($amount->amount / $ethereum_final), 6, '.', '');
        $data['eth_name'] = "ETH";

        $data['btc_amount'] = number_format(floatval($amount->amount / $btcrate), 6, '.', '');
        $data['btc_name'] = "BTC";

        $data_payment = ([
            'amount' => $amount->amount,
            'type' => 'EducationLicense',
            'plan' => $request->plan,
            'btc_amount' => $data['btc_amount'],
            'eth_amount' => $data['eth_amount']
        ]);
        $request->session()->put('gateway', $data_payment);
        $data['gateway'] = Session::get('gateway');
        $data['coins'] = Coin::orderBy('created_at', 'asc')->whereStatus(true)->get();



        return view('user.select-gateway', $data);
    }

    ///deposit
    public function userDeposit() {
        return view('user.user-deposit');
    }

    public function userDepositPost(Request $request) {
        $input = $request->all();

        $rules = [
            'amount' => 'required|numeric'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        try {
            $general_coin = file_get_contents('https://api.blockchain.com/v3/exchange/tickers/ETH-USD');
        } catch (\Exception $e) {

            return [
                'status' => 'error',
                'message' => 'Server  Busy , Try Again'
            ];
        }
        $eth = $general_coin;
        $ethereum = json_decode($eth);
        $ethereum_final = $ethereum->last_trade_price;
        $data['eth_amount'] = number_format(floatval($request->amount / $ethereum_final), 6, '.', '');
        $data['eth_name'] = "ETH";

        $data['btc_amount'] = number_format(floatval($request->amount / $btcrate), 6, '.', '');
        $data['btc_name'] = "BTC";

        $data_payment = ([
            'amount' => $request->amount,
            'type' => 'deposit',
            'btc_amount' => $data['btc_amount'],
            'eth_amount' => $data['eth_amount']
        ]);
        $request->session()->put('gateway', $data_payment);
        $data['gateway'] = Session::get('gateway');
        $data['coins'] = Coin::orderBy('created_at', 'asc')->whereStatus(true)->get();



        return view('user.select-gateway', $data);
    }

    public function getPlan(Request $request) {
        $min = Plan::whereId($request->plan_id)->first();

        $data['min'] = $min->min;
        $data['sign'] = '$';
        $data['profit'] = '$' . $min->min * $min->percentage / 100;

        $data['amount'] = $min->min;
        $data['percentage'] = $min->percentage . '%';
        $data['p_id'] = $min->id;
        return $data;
    }

    public function getCoin(Request $request) {
        $coin = Coin::whereId($request->coin_id)->first();
        $usercoin = UserCoin::whereUser_id(Auth::user()->id)->first();
        if (is_object($usercoin)) {


            $data['usermoney'] = '$' . $usercoin->amount;
            $plan = Plan::whereId($request->plan_id)->first();

            if ($usercoin->amount < $plan->min) {
                $data['message_danger'] = 'You are not Eligble to Spend , Please Click Spend to Deposit  ';
                $data['status'] = 401;
            } else {
                $data['message_success'] = 'You are Eligble to Spend Fund from this Address , Please Click Spend to Invest';
                $data['status'] = 200;
            }
        } else {
            $data['message_danger'] = 'You Need to Add this Coin, Go to your Account Setting to add it ';
            $data['status'] = 401;
        }

        return $data;
    }

    public function address() {
        $data['user'] = User::whereId(Auth::user()->id)->with('coin')->first();
        $data['coinsEnable'] = Coin::whereStatus(true)->with('usercoinUser')->get();
        return view('user.address', $data);
    }

    public function addWallet(Request $request) {
        $input = $request->all();
        if ($request->wallet_type == 3) {
            $rules = [
                'preferable' => 'required',
                'wallet_type' => 'required',
                'bank_name' => 'required',
                'account_name' => 'required',
                'account_number' => 'required',
                'wire_routing_number' => 'required',
                'ach_routing_number' => 'required',
                'swift_code' => 'required',
                'bank_address' => 'required'
            ];
            $error = static::getErrorMessageSweet($input, $rules);
            if ($error) {
                return $error;
            }
        } else {
            $rules = [
                'preferable' => 'required',
                'wallet_type' => 'required',
                'address' => 'required'
            ];
            $error = static::getErrorMessageSweet($input, $rules);
            if ($error) {
                return $error;
            }
        }


        //check perf
        if ($request->preferable == 1) {
            $userp = UserCoin::whereUser_id(Auth::user()->id)->wherePreferable(true)->first();
            if (is_object($userp)) {

                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', "you can't have more than 1 preferable wallet");
                return redirect('account/profile/addresses');
            }
        }
        $usercoin = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $request->wallet_type));

        $usercoin->user_id = Auth::user()->id;
        $usercoin->coin_id = $request->wallet_type;
        $usercoin->preferable = $request->preferable;
        if ($request->wallet_type == 3) {
            $usercoin->bank_name = $request->bank_name;
            $usercoin->account_name = $request->account_name;
            $usercoin->account_number = $request->account_number;
            $usercoin->wire_routing_number = $request->wire_routing_number;
            $usercoin->ach_routing_number = $request->ach_routing_number;
            $usercoin->swift_code = $request->swift_code;
            $usercoin->bank_address = $request->bank_address;
        } else {
            $usercoin->address = $request->address;
        }
        $usercoin->save();
//        $data_address = ([
//            'user_id' => $request->id,
//            'wallet_type' => $request->wallet_type,
//            'preferable' => $request->preferable,
//            'address' => $request->address,
//            'verify_code' => $verify_code
//        ]);
//        $request->session()->put('address', $data_address);
        //send mail
        $coin = $usercoin->coin->name;
        $subject = 'New Wallet address added';
        $message = "You have successfully added $coin address to your account.";
        $name = Auth::user()->username;
        $greeting = "Hello $name ,";
        Mail::to(Auth::user()->email)->send(new MailSender($subject, $greeting, $message, '', ''));
        return redirect('account/profile/addresses');
    }

    public function walletSuccess() {
        return view('user.address-success');
    }

    public function wallet(Request $request) {
        $address = Session::get('address');
        if (empty($address)) {

            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Adding of new wallet failed');
            return redirect('account/profile/addresses');
        }
        if ($address['verify_code'] == $request->confirm) {


            $usercoin = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $address['wallet_type']));

            $usercoin->user_id = Auth::user()->id;
            $usercoin->coin_id = $address['wallet_type'];
            $usercoin->preferable = $address['preferable'];
            $usercoin->address = $address['address'];
            $usercoin->save();

            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'Withdraw address was successfully added');
            return redirect('account/profile/addresses');
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Adding of new wallet failed');
            return redirect('account/profile/addresses');
        }
    }

    public function addPref($slug) {
        $userp = UserCoin::whereUser_id(Auth::user()->id)->wherePreferable(true)->first();
        if (is_object($userp)) {

            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', "You have preferable wallet please remove it to add this one");
            return redirect('account/profile/addresses');
        }
        $coin = UserCoin::whereId($slug)->first();
        if (is_object($coin)) {
            $coin->update([
                'preferable' => true
            ]);
            $mm = $coin->coin->name;
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', "Your $mm Wallet has been set to receive fund");
            return redirect('account/profile/addresses');
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Add wallet receiving fund failed');
            return redirect('account/profile/addresses');
        }
    }

    public function removePref($slug) {

        $coin = UserCoin::whereId($slug)->first();
        if (is_object($coin)) {
            $coin->update([
                'preferable' => false
            ]);
            $mm = $coin->coin->name;
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', "Your $mm Wallet has been disabled to receive fund");
            return redirect('account/profile/addresses');
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Removing wallet receiving fund failed');
            return redirect('account/profile/addresses');
        }
    }

    public function removeCoin($slug) {
        $coin = UserCoin::whereId($slug)->first();
        if (is_object($coin)) {
            $mm = $coin->coin->name;
            $coin->delete();
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', "Your $mm Wallet removed by you");
            return redirect('account/profile/addresses');
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Removing wallet failed');
            return redirect('account/profile/addresses');
        }
    }

    public function gateway(Request $request) {
//        $today = Carbon::now();
//        $timestamp = strtotime($today);
//        $day = date('D', $timestamp);
//        if (!in_array($day, array('Sun', 'Sat'))) {
//            session()->flash('message.level', 'error');
//            session()->flash('message.color', 'red');
//            session()->flash('message.content', 'You can only buy Plan License on Saturdays and Sundays');
//            return redirect()->back();
//        }
        $input = $request->all();
        $rules = [
            'plan' => 'required|numeric',
            'amount' => 'required|numeric'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }

        $plan = Plan::whereId($request->plan)->first();
        if ($request->amount < $plan->min) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Amount is less than the minimum amount for this plan');
            return redirect()->back();
        }

        if ($plan->max >= 1) {
            if ($request->amount > $plan->max) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Amount is greater than the maxmium amount for this plan');
                return redirect()->back();
            }
        }
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        try {
            $general_coin = file_get_contents('https://api.blockchain.com/v3/exchange/tickers/ETH-USD');
        } catch (\Exception $e) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Checking amount in Crypto failed ');
            return redirect()->back();
        }
        $eth = $general_coin;
        $ethereum = json_decode($eth);
        $ethereum_final = $ethereum->last_trade_price;
        $data['eth_amount'] = number_format(floatval($request->amount / $ethereum_final), 6, '.', '');
        $data['eth_name'] = "ETH";

        $data['btc_amount'] = number_format(floatval($request->amount / $btcrate), 6, '.', '');
        $data['btc_name'] = "BTC";

        $data_payment = ([
            'amount' => $request->amount,
            'type' => 'license',
            'plan_id' => $request->plan,
            'btc_amount' => $data['btc_amount'],
            'eth_amount' => $data['eth_amount']
        ]);
        $request->session()->put('gateway', $data_payment);
        $data['gateway'] = Session::get('gateway');
        $data['coins'] = Coin::orderBy('created_at', 'asc')->whereStatus(true)->get();

        return view('user.select-gateway', $data);
    }

    public function createPayment(Request $request) {
        $gateway = Session::get('gateway');
        $setting = Setting::whereId(1)->first();


        $data_payment = ([
            'gateway' => $request->gateway,
            'gateway_amount' => $request->gateway_amount,
        ]);
        $data['payment_details'] = array_merge($gateway, $data_payment);
        if (empty($gateway)) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Invalid payment occured');
            return redirect()->back();
        }
        $input = $request->all();
        $rules = [
            'gateway' => 'required',
            'gateway_value' => 'required',
            'gateway_amount' => 'required'
        ];

        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }


        $coin = Coin::whereSlug($request->gateway)->first();
        if (!is_object($coin)) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Something went wrong');
            return redirect()->back();
        }
        $checkuser = UserCoin::firstOrNew(array('user_id' => (Auth::user()->id), 'coin_id' => $coin->id));
        $checkuser->user_id = Auth::user()->id;
        $checkuser->coin_id = $coin->id;
        $checkuser->save();

        $txt = strtolower(Str::random(30));
        $data['sendaddress'] = $coin->address;
        $text = $request->gateway_value . ':' . $coin->address . '?amount=' . $request->gateway_amount;
        $qrCode = new QrCode($text);
        $qrCode->setSize(300);
        $qrCode->setWriterByName('png');
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $qrCode->setLogoPath(public_path() . '/' . $setting['logo']);
        $qrCode->setLogoSize(60, 50);
        $qrCode->setValidateResult(false);
        $qrcode_image = $qrCode->writeDataUri();
        $data['image_qrcode'] = $qrcode_image;

        if ($gateway['type'] == "deposit") {
            if ($request->gateway_value == "bitcoin") {
                if ($request->gateway_amount !== $gateway['btc_amount']) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Invalid payment occured');
                    return redirect()->back();
                }
            } elseif ($request->gateway_value == "ethereum") {
                if ($request->gateway_amount !== $gateway['eth_amount']) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Invalid payment occured');
                    return redirect()->back();
                }
            } else {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid payment,, occured');
                return redirect()->back();
            }


            $user_withdraw = UserWithdrawal::firstOrNew(array('user_id' => (Auth::user()->id), 'amount_check' => $request->gateway_amount));
            $user_withdraw->amount = $gateway['amount'];
            $user_withdraw->user_id = Auth::user()->id;
            $user_withdraw->coin_id = $checkuser->id;
            $user_withdraw->type = "Fund Deposit";
            $user_withdraw->amount_check = $request->gateway_amount;
            $user_withdraw->status = 0;
            $user_withdraw->main_invest = false;
            $user_withdraw->transaction_id = strtolower(Str::random(10));
            $user_withdraw->main_paid = false;
            $user_withdraw->deposit_user_paid = false;
            $user_withdraw->user_deposit = true;
            $user_withdraw->save();
            //create transcations history
            Transaction::create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $user_withdraw->transaction_id,
                'type' => 'Fund Deposit',
                'name_type' => 'Fund Deposit',
                'deposit_investment_charge' => 0,
                'coin_id' => $checkuser->id,
                'amount' => $gateway['amount'],
                'amount_profit' => 0,
                'description' => "You have deposited  $user_withdraw->amount  to your wallet"
            ]);





            $data['user_money'] = $user_withdraw;
            $data['coin'] = $coin;
            $data['type'] = $gateway['type'];

            return view('user.made-payment', $data);
        }
//     DB::beginTransaction();
//        try {
//        
        if ($request->gateway_value == "bitcoin") {
            if ($request->gateway_amount !== $gateway['btc_amount']) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid payment occured');
                if ($gateway['type'] == "EducationLicense") {
                    return redirect('account/education-license');
                } else {
                    return redirect('deposit');
                }
            }
        } elseif ($request->gateway_value == "ethereum") {
            if ($request->gateway_amount !== $gateway['eth_amount']) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid payment occured');
                if ($gateway['type'] == "EducationLicense") {
                    return redirect('account/education-license');
                } else {
                    return redirect('deposit');
                }
            }
        } else {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Invalid payment,, occured');
            if ($gateway['type'] == "EducationLicense") {
                return redirect('account/education-license');
            } else {
                return redirect('deposit');
            }
        }
        if ($gateway['type'] == "EducationLicense") {
            $edu = UserEducationLicensePlan::whereUser_id(Auth::user()->id)->where('due_pay', '>', Carbon::now())->first();
            if (is_object($edu)) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'You have active plan please wait for it to expired');
                return redirect('account/education-license');
            }
        }



        $money = userTrackEarn::whereUser_id(Auth::user()->id)->first();
        if (is_object($money)) {
            $useramount = $money->amount;
        } else {
            $useramount = 0;
        }

        if ($useramount > $gateway['amount']) {
            $data['fund'] = 'fund';
        } else {
            $data['fund'] = 'fund';
        }
        $current = Carbon::now();
        if ($gateway['type'] == "EducationLicense") {
            $edu_plan = EducationLicensePlan::whereId($gateway['plan'])->first();
            $due_p = $current->addHours($edu_plan->compound->compound);
        } else {

            $plan = Plan::whereId($gateway['plan_id'])->first();
            $due_p = $current->addHours($plan->compound->compound);
        }
        //substract
        if ($data['fund'] == 'invest') {

            $sub = userTrackEarn::whereUser_id(Auth::user()->id)->first();
            $amountd = $gateway['amount'];
            $sub->update([
                'amount' => $sub->amount - $amountd
            ]);

            $status_deposit = true;
            $due = $due_p;
            $due_pay = $due->addMinutes(2);
            $txt = strtolower(Str::random(10));
        } else {
            $status_deposit = false;
            $due_pay = null;
        }

        $current_pay = Carbon::now();
        $due_time = $current_pay->addHours($setting->time_pay);
        $time_pay = $due_time->addMinutes(2);
        if ($gateway['type'] == "EducationLicense") {
            $user_education_license = UserEducationLicensePlan::firstOrNew(array('user_id' => (Auth::user()->id), 'amount' => $edu_plan->amount));

            $user_education_license->amount = $edu_plan->amount;
            $user_education_license->user_id = Auth::user()->id;
            $user_education_license->coin_id = $checkuser->id;
            $user_education_license->amount_check = $request->gateway_amount;
            $user_education_license->status = 0;
            $user_education_license->education_license_id = $gateway['plan'];
            $user_education_license->transaction_id = strtolower(Str::random(10));
            $user_education_license->due_pay = $due_pay;
            $user_education_license->status_deposit = $status_deposit;
            $user_education_license->status = 0;
            $user_education_license->save();
            //create transcations history
            Transaction::create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $user_education_license->transaction_id,
                'type' => 'Education License Deposit',
                'name_type' => 'Education License Deposit',
                'deposit_investment_charge' => 0,
                'coin_id' => $checkuser->id,
                'amount' => $edu_plan->amount,
                'status' => $status_deposit,
                'amount_profit' => 0,
                'description' => "You have deposited $user_education_license->amount for Education License"
            ]);
        } else {
            //create investment
            $invest = Investment::firstOrNew(array('user_id' => (Auth::user()->id), 'amount_check' => $request->gateway_amount));
            $invest->transaction_id = $txt;
            $invest->user_id = Auth::user()->id;
            $invest->plan_id = $gateway['plan_id'];
            $invest->coin_id = $checkuser->id;
            $invest->amount = $gateway['amount'];
            $invest->amount_check = $request->gateway_amount;
            $invest->deposit_investment_charge = 0;
            $invest->run_count = 0;
            $invest->due_pay = $due_pay;
            $invest->time_pay = $time_pay;
            $invest->status_deposit = $status_deposit;
            $invest->settled_status = 0;
            $invest->status = 0;
            $invest->save();


            $profit = $invest->amount * $plan->percentage / 100;
            $amm = number_format($invest->amount);
            //transcation log
            Transaction::create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $invest->transaction_id,
                'type' => 'Plan',
                'name_type' => 'Deposit',
                'deposit_investment_charge' => 0,
                'coin_id' => $checkuser->id,
                'status' => $status_deposit,
                'amount' => $invest->amount,
                'amount_profit' => $profit,
                'description' => "You Bought Plan $$amm Under  $plan->name"
            ]);
        }


//        //send user email
        if ($data['fund'] == 'invest') {
            if ($gateway['type'] == "EducationLicense") {
                $actionb = $user_education_license->usercoin->coin->slug;
            } else {
                //check reference for bouns
                $actionb = $invest->usercoin->coin->slug;
            }

            if ($actionb == 'bitcoin_address') {
                $name = 'Bitcoin';
            }
            if ($actionb == 'litecoin_address') {

                $name = 'Litecoin';
            }
            if ($actionb == 'ethereum_address') {
                $name = 'Ethereum';
            }
            if ($actionb == 'bitcoin_cash_address') {
                $name = 'Bitcoin Cash';
            }
            if ($actionb == 'dash_address') {
                $name = 'Dash';
            }
            if ($gateway['type'] == "EducationLicense") {
                //referral
                $reward = $user_education_license->amount;

                $firstUserReward = $setting->level_eduction_license_1 / 100 * $reward;
                $allReward = $setting->level_eduction_license_2_7 / 100 * $reward;
                $newUserReward = $allReward;
                $user_ref = Reference::whereReferred_id($user_education_license->user_id)->first();
                if (is_object($user_ref)) {
                    $first_pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();

                    if (!is_object($first_pay)) {
                        $first_pay = UserCoin::create([
                                    'user_id' => $user_ref->user_id,
                                    'coin_id' => $user_education_license->usercoin->coin->id,
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
                        $user_withdraw->plan_id = $user_education_license->plan_id;
                        $user_withdraw->save();
                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($first_pay->user_id)));
                        $userMoney->user_id = $first_pay->user_id;
                        $userMoney->amount = $userMoney->amount + $newFirstUserReward;
                        $userMoney->save();
                        //transcation log
                        Transaction::create([
                            'user_id' => $first_pay->user_id,
                            'transaction_id' => $user_education_license->transaction_id,
                            'type' => 'Commissions',
                            'name_type' => 'Referral Bonus  Educational License',
                            'coin_id' => $first_pay->id,
                            'amount' => $newFirstUserReward,
                            'amount_profit' => $newFirstUserReward,
                            'description' => 'Referral Bonus Under Educational License ' . $user_education_license->plan->name . ' license',
                            'status' => true
                        ]);
                        $message = 'USD' . $newFirstUserReward . "  Educational License Referral Bonus has been successfully sent to you with  Transaction ID Is : #$user_education_license->transaction_id";

                        $name = $first_pay->user->username;
                        $greeting = "Hello $name";
                        Mail::to($first_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message, '', ''));
                        //second reward
                        $user_ref_second = Reference::whereReferred_id($first_pay->user_id)->first();
                        if (is_object($user_ref_second)) {
                            $second_pay = UserCoin::whereUser_id($user_ref_second->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();
                            if (!is_object($second_pay)) {
                                $second_pay = UserCoin::create([
                                            'user_id' => $user_ref_second->user_id,
                                            'coin_id' => $user_education_license->usercoin->coin->id,
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
                                $user_withdraw_second->plan_id = $user_education_license->plan_id;
                                $user_withdraw_second->save();
                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($second_pay->user_id)));
                                $userMoney->user_id = $second_pay->user_id;
                                $userMoney->amount = $userMoney->amount + $newUserReward;
                                $userMoney->save();
                                //transcation log
                                Transaction::create([
                                    'user_id' => $second_pay->user_id,
                                    'transaction_id' => $user_education_license->transaction_id,
                                    'type' => 'Commissions',
                                    'name_type' => 'Referral Bonus',
                                    'coin_id' => $second_pay->id,
                                    'amount' => $newUserReward,
                                    'amount_profit' => $newUserReward,
                                    'description' => 'Referral Bonus Under  Educational License' . $user_education_license->plan->name . ' license',
                                    'status' => true
                                ]);
                                $message_second = 'USD' . $newUserReward . " Educational License Second step Referral Bonus has been successfully sent to you with Transaction ID Is : #$user_education_license->transaction_id";

                                $name = $second_pay->user->username;
                                $greeting = "Hello $name";
                                Mail::to($second_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_second, '', ''));
                                ///third
                                $user_ref_third = Reference::whereReferred_id($second_pay->user_id)->first();
                                if (is_object($user_ref_third)) {
                                    $third_pay = UserCoin::whereUser_id($user_ref_third->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();
                                    if (!is_object($third_pay)) {
                                        $third_pay = UserCoin::create([
                                                    'user_id' => $user_ref_third->user_id,
                                                    'coin_id' => $user_education_license->usercoin->coin->id,
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
                                        $user_withdraw_third->plan_id = $user_education_license->plan_id;
                                        $user_withdraw_third->save();
                                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($third_pay->user_id)));
                                        $userMoney->user_id = $third_pay->user_id;
                                        $userMoney->amount = $userMoney->amount + $newUserReward;
                                        $userMoney->save();
                                        //transcation log
                                        Transaction::create([
                                            'user_id' => $third_pay->user_id,
                                            'transaction_id' => $user_education_license->transaction_id,
                                            'type' => 'Commissions',
                                            'name_type' => 'Referral Bonus',
                                            'coin_id' => $third_pay->id,
                                            'amount' => $newUserReward,
                                            'amount_profit' => $newUserReward,
                                            'description' => 'Referral Bonus Under  Educational License' . $user_education_license->plan->name . ' license',
                                            'status' => true
                                        ]);
                                        $message_third = 'USD' . $newUserReward . " Educational License Third step Referral Bonus has been successfully sent to you with Transaction ID Is : #$user_education_license->transaction_id";

                                        $name = $third_pay->user->username;
                                        $greeting = "Hello $name";
                                        Mail::to($third_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_third, '', ''));

                                        ///fourth
                                        $user_ref_fourth = Reference::whereReferred_id($third_pay->user_id)->first();
                                        if (is_object($user_ref_fourth)) {
                                            $fourth_pay = UserCoin::whereUser_id($user_ref_fourth->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();
                                            if (!is_object($fourth_pay)) {
                                                $fourth_pay = UserCoin::create([
                                                            'user_id' => $user_ref_fourth->user_id,
                                                            'coin_id' => $user_education_license->usercoin->coin->id,
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
                                                $user_withdraw_fourth->plan_id = $user_education_license->plan_id;
                                                $user_withdraw_fourth->save();
                                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($fourth_pay->user_id)));
                                                $userMoney->user_id = $fourth_pay->user_id;
                                                $userMoney->amount = $userMoney->amount + $newUserReward;
                                                $userMoney->save();
                                                //transcation log
                                                Transaction::create([
                                                    'user_id' => $fourth_pay->user_id,
                                                    'transaction_id' => $user_education_license->transaction_id,
                                                    'type' => 'Commissions',
                                                    'name_type' => 'Referral Bonus',
                                                    'coin_id' => $fourth_pay->id,
                                                    'amount' => $newUserReward,
                                                    'amount_profit' => $newUserReward,
                                                    'description' => 'Referral Bonus Under  Educational License' . $user_education_license->plan->name . ' license',
                                                    'status' => true
                                                ]);
                                                $message_fourth = 'USD' . $newUserReward . " Educational License Fourth step Referral Bonus has been successfully sent to you with Transaction ID Is : #$user_education_license->transaction_id";

                                                $name = $fourth_pay->user->username;
                                                $greeting = "Hello $name";
                                                Mail::to($fourth_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_fourth, '', ''));

                                                ///five
                                                $user_ref_five = Reference::whereReferred_id($fourth_pay->user_id)->first();
                                                if (is_object($user_ref_five)) {
                                                    $five_pay = UserCoin::whereUser_id($user_ref_five->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();
                                                    if (!is_object($five_pay)) {
                                                        $five_pay = UserCoin::create([
                                                                    'user_id' => $user_ref_five->user_id,
                                                                    'coin_id' => $user_education_license->usercoin->coin->id,
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
                                                        $user_withdraw_five->plan_id = $user_education_license->plan_id;
                                                        $user_withdraw_five->save();
                                                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($five_pay->user_id)));
                                                        $userMoney->user_id = $five_pay->user_id;
                                                        $userMoney->amount = $userMoney->amount + $newUserReward;
                                                        $userMoney->save();
                                                        //transcation log
                                                        Transaction::create([
                                                            'user_id' => $five_pay->user_id,
                                                            'transaction_id' => $user_education_license->transaction_id,
                                                            'type' => 'Commissions',
                                                            'name_type' => 'Referral Bonus',
                                                            'coin_id' => $five_pay->id,
                                                            'amount' => $newUserReward,
                                                            'amount_profit' => $newUserReward,
                                                            'description' => 'Referral Bonus Under  Educational License' . $user_education_license->plan->name . ' license',
                                                            'status' => true
                                                        ]);
                                                        $message_five = 'USD' . $newUserReward . " Educational License Fiveth step Referral Bonus has been successfully sent to you with Transaction ID Is : #$user_education_license->transaction_id";
                                                        $name = $five_pay->user->username;
                                                        $greeting = "Hello $name";
                                                        Mail::to($five_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_five, '', ''));

                                                        ///six
                                                        $user_ref_six = Reference::whereReferred_id($five_pay->user_id)->first();
                                                        if (is_object($user_ref_six)) {
                                                            $six_pay = UserCoin::whereUser_id($user_ref_six->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();
                                                            if (!is_object($six_pay)) {
                                                                $six_pay = UserCoin::create([
                                                                            'user_id' => $user_ref_six->user_id,
                                                                            'coin_id' => $user_education_license->usercoin->coin->id,
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
                                                                $user_withdraw_six->plan_id = $user_education_license->plan_id;
                                                                $user_withdraw_six->save();
                                                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($six_pay->user_id)));
                                                                $userMoney->user_id = $six_pay->user_id;
                                                                $userMoney->amount = $userMoney->amount + $newUserReward;
                                                                $userMoney->save();
                                                                //transcation log
                                                                Transaction::create([
                                                                    'user_id' => $six_pay->user_id,
                                                                    'transaction_id' => $user_education_license->transaction_id,
                                                                    'type' => 'Commissions',
                                                                    'name_type' => 'Referral Bonus',
                                                                    'coin_id' => $six_pay->id,
                                                                    'amount' => $newUserReward,
                                                                    'amount_profit' => $newUserReward,
                                                                    'description' => 'Referral Bonus Under  Educational License' . $user_education_license->plan->name . ' license',
                                                                    'status' => true
                                                                ]);
                                                                $message_six = 'USD' . $newUserReward . " Educational License Six step Referral Bonus has been successfully sent to you with Transaction ID Is : #$user_education_license->transaction_id";
                                                                $name = $six_pay->user->username;
                                                                $greeting = "Hello $name";
                                                                Mail::to($six_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_six, '', ''));

                                                                ///seven
                                                                $user_ref_seven = Reference::whereReferred_id($six_pay->user_id)->first();
                                                                if (is_object($user_ref_seven)) {
                                                                    $seven_pay = UserCoin::whereUser_id($user_ref_seven->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();
                                                                    if (!is_object($seven_pay)) {
                                                                        $seven_pay = UserCoin::create([
                                                                                    'user_id' => $user_ref_seven->user_id,
                                                                                    'coin_id' => $user_education_license->usercoin->coin->id,
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
                                                                        $user_withdraw_seven->plan_id = $user_education_license->plan_id;
                                                                        $user_withdraw_seven->save();
                                                                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($seven_pay->user_id)));
                                                                        $userMoney->user_id = $seven_pay->user_id;
                                                                        $userMoney->amount = $userMoney->amount + $newUserReward;
                                                                        $userMoney->save();
                                                                        //transcation log
                                                                        Transaction::create([
                                                                            'user_id' => $seven_pay->user_id,
                                                                            'transaction_id' => $user_education_license->transaction_id,
                                                                            'type' => 'Commissions',
                                                                            'name_type' => 'Referral Bonus',
                                                                            'coin_id' => $seven_pay->id,
                                                                            'amount' => $newUserReward,
                                                                            'amount_profit' => $newUserReward,
                                                                            'description' => 'Referral Bonus Under  Educational License' . $user_education_license->plan->name . ' license',
                                                                            'status' => true
                                                                        ]);
                                                                        $message_seven = 'USD' . $newUserReward . " Educational License Seven step Referral Bonus has been successfully sent to you with Transaction ID Is : #$user_education_license->transaction_id";
                                                                        $name = $seven_pay->user->username;
                                                                        $greeting = "Hello $name";
                                                                        Mail::to($seven_pay->user->email)->send(new MailSender('Referral Bonus  Educational License', $greeting, $message_seven, '', ''));

                                                                        ///eight
                                                                        $user_ref_eight = Reference::whereReferred_id($seven_pay->user_id)->first();
                                                                        if (is_object($user_ref_eight)) {
                                                                            $eight_pay = UserCoin::whereUser_id($user_ref_eight->user_id)->whereCoin_id($user_education_license->usercoin->coin->id)->first();
                                                                            if (!is_object($eight_pay)) {
                                                                                $eight_pay = UserCoin::create([
                                                                                            'user_id' => $user_ref_eight->user_id,
                                                                                            'coin_id' => $user_education_license->usercoin->coin->id,
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
                                                                                $user_withdraw_eight->plan_id = $user_education_license->plan_id;
                                                                                $user_withdraw_eight->save();
                                                                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($eight_pay->user_id)));
                                                                                $userMoney->user_id = $eight_pay->user_id;
                                                                                $userMoney->amount = $userMoney->amount + $newUserReward;
                                                                                $userMoney->save();
                                                                                //transcation log
                                                                                Transaction::create([
                                                                                    'user_id' => $eight_pay->user_id,
                                                                                    'transaction_id' => $user_education_license->transaction_id,
                                                                                    'type' => 'Commissions',
                                                                                    'name_type' => 'Referral Bonus',
                                                                                    'coin_id' => $eight_pay->id,
                                                                                    'amount' => $newUserReward,
                                                                                    'amount_profit' => $newUserReward,
                                                                                    'description' => 'Referral Bonus Under  Educational License' . $user_education_license->plan->name . ' license',
                                                                                    'status' => true
                                                                                ]);
                                                                                $message_eight = 'USD' . $newUserReward . " Educational License Eight step Referral Bonus has been successfully sent to you with Transaction ID Is : #$user_education_license->transaction_id";
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
                $email = Auth::user()->email;
                $subject = 'Education license Purchased';
                $message = "You Purchased a new Education License Under " . $edu_plan->name . " with $user_education_license->amount USD";
                Mail::to($email)->send(new MailSender($subject, Auth::user()->username, $message, '', ''));

                session()->flash('message.level', 'success');
                session()->flash('message.color', 'success');
                session()->flash('message.content', 'Education license Successfully Purchased');
                return redirect('account/education-license');
            } else {
                $user_ref = Reference::whereReferred_id($invest->user_id)->first();
                if (is_object($user_ref)) {
                    $first_pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($invest->usercoin->coin->id)->first();
                    if (!is_object($first_pay)) {
                        $first_pay = UserCoin::create([
                                    'user_id' => $user_ref->user_id,
                                    'coin_id' => $invest->usercoin->coin->id,
                                    'address' => null
                        ]);
                    }

                    if (is_object($first_pay)) {
                        $address = $first_pay->address;
                        $reward = $invest->amount;

                        $firstUserReward = $invest->plan->ref / 100 * $reward;
//                        $secondUserReward = $setting->level_2 / 100 * $reward;
//                        $thirdUserReward = $setting->level_3 / 100 * $reward;
                        //first reward
                        $newFirstUserReward = $firstUserReward;
                        //create user withdrawal data
                        $user_withdraw = new UserWithdrawal();
                        $user_withdraw->amount = $newFirstUserReward;
                        $user_withdraw->user_id = $first_pay->user_id;
                        $user_withdraw->coin_id = $first_pay->id;
                        $user_withdraw->type = "Referral Bonus";
                        $user_withdraw->status = true;
                        $user_withdraw->plan_id = $invest->plan_id;
                        $user_withdraw->save();
                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($first_pay->user_id)));
                        $userMoney->user_id = $first_pay->user_id;
                        $userMoney->amount = $userMoney->amount + $newFirstUserReward;
                        $userMoney->save();
                        //transcation log
                        Transaction::create([
                            'user_id' => $first_pay->user_id,
                            'transaction_id' => $invest->transaction_id,
                            'type' => 'Commissions',
                            'name_type' => 'Referral Bonus',
                            'coin_id' => $first_pay->id,
                            'amount' => $newFirstUserReward,
                            'amount_profit' => $newFirstUserReward,
                            'description' => 'Referral Bonus Under ' . $invest->plan->name . ' license',
                            'status' => true
                        ]);
                        $message = 'USD' . $newFirstUserReward . " Referral Bonus has been successfully sent to wallet";
                        $name = $first_pay->user->username;
                        $greeting = "Hello $name";
                        Mail::to($first_pay->user->email)->send(new MailSender('Referral Bonus Payment', $greeting, $message, '', ''));
                        //second reward
                        $user_ref_second = Reference::whereReferred_id($first_pay->user_id)->first();
                        if (is_object($user_ref_second)) {
                            $second_pay = UserCoin::whereUser_id($user_ref_second->user_id)->whereCoin_id($invest->usercoin->coin->id)->first();
                            if (!is_object($second_pay)) {
                                $second_pay = UserCoin::create([
                                            'user_id' => $user_ref_second->user_id,
                                            'coin_id' => $invest->usercoin->coin->id,
                                            'address' => null
                                ]);
                            }
//                            if (is_object($second_pay)) {
//                                $newSecondUserReward = $secondUserReward;
//                                //create user withdrawal data
//                                $user_withdraw_second = new UserWithdrawal();
//                                $user_withdraw_second->amount = $newSecondUserReward;
//                                $user_withdraw_second->user_id = $second_pay->user_id;
//                                $user_withdraw_second->coin_id = $second_pay->id;
//                                $user_withdraw_second->type = "Referral Bonus";
//                                $user_withdraw_second->status = true;
//                                $user_withdraw_second->plan_id = $invest->plan_id;
//                                $user_withdraw_second->save();
//                                $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($second_pay->user_id)));
//                                $userMoney->user_id = $second_pay->user_id;
//                                $userMoney->amount = $userMoney->amount + $newSecondUserReward;
//                                $userMoney->save();
//                                //transcation log
//                                Transaction::create([
//                                    'user_id' => $second_pay->user_id,
//                                    'transaction_id' => $invest->transaction_id,
//                                    'type' => 'Commissions',
//                                    'name_type' => 'Referral Bonus',
//                                    'coin_id' => $second_pay->id,
//                                    'amount' => $newSecondUserReward,
//                                    'amount_profit' => $newSecondUserReward,
//                                    'description' => 'Referral Bonus Under ' . $invest->plan->name . ' license',
//                                    'status' => true
//                                ]);
//                                $message_second = 'USD' . $newSecondUserReward . "Referral Bonus has been successfully sent to wallet";
//                                $name = $second_pay->user->username;
//                                $greeting = "Hello $name";
//                                Mail::to($second_pay->user->email)->send(new MailSender('Referral Bonus', $greeting, $message_second, '', ''));
//                                //third reward
//                                $user_ref_third = Reference::whereReferred_id($second_pay->user_id)->first();
//                                if (is_object($user_ref_third)) {
//                                    $third_pay = UserCoin::whereUser_id($user_ref_third->user_id)->whereCoin_id($invest->usercoin->coin->id)->first();
//                                    if (!is_object($third_pay)) {
//                                        $third_pay = UserCoin::create([
//                                                    'user_id' => $user_ref_third->user_id,
//                                                    'coin_id' => $invest->usercoin->coin->id,
//                                                    'address' => null
//                                        ]);
//                                    }
//                                    if (is_object($second_pay)) {
//                                        $newThirdUserReward = $thirdUserReward;
//                                        //create user withdrawal data
//                                        $user_withdraw_second = new UserWithdrawal();
//                                        $user_withdraw_second->amount = $newThirdUserReward;
//                                        $user_withdraw_second->user_id = $third_pay->user_id;
//                                        $user_withdraw_second->coin_id = $third_pay->id;
//                                        $user_withdraw_second->type = "Referral Bonus";
//                                        $user_withdraw_second->status = true;
//                                        $user_withdraw_second->plan_id = $invest->plan_id;
//                                        $user_withdraw_second->save();
//                                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($third_pay->user_id)));
//                                        $userMoney->user_id = $third_pay->user_id;
//                                        $userMoney->amount = $userMoney->amount + $newThirdUserReward;
//                                        $userMoney->save();
//                                        //transcation log
//                                        Transaction::create([
//                                            'user_id' => $third_pay->user_id,
//                                            'transaction_id' => $invest->transaction_id,
//                                            'type' => 'Commissions',
//                                            'name_type' => 'Referral Bonus',
//                                            'coin_id' => $third_pay->id,
//                                            'amount' => $newThirdUserReward,
//                                            'amount_profit' => $newThirdUserReward,
//                                            'description' => 'Referral Bonus Under ' . $invest->plan->name . ' license',
//                                            'status' => true
//                                        ]);
//                                        $message_third = 'USD' . $newThirdUserReward . "Referral Bonus has been successfully sent to wallet";
//                                        $first = $third_pay->user->first_name;
//                                        $last = $third_pay->user->last_name;
//                                        $greeting = "Hello $first $last";
//                                        Mail::to($third_pay->user->email)->send(new MailSender('Referral Bonus', $greeting, $message_third, '', ''));
//                                    }
//                                }
//                            }
                        }
                    }
                }

                $email = Auth::user()->email;
                $subject = 'Plan Purchased';
                $message = "You Bought a Plan License Under " . $plan->name . " with $invest->amount USD";
                Mail::to($email)->send(new MailSender($subject, Auth::user()->username, $message, '', ''));

                session()->flash('message.level', 'success');
                session()->flash('message.color', 'success');
                session()->flash('message.content', 'Plan Successfully Purchased');
                return redirect('office');
            }
        }
//           DB::commit();
//        } catch (\Exception $e) {
//            DB::rollback();
//            throw $e;
//        }

        if ($gateway['type'] == "EducationLicense") {
            $data['user_education_license'] = $user_education_license;
            $data['coin'] = $coin;
            $data['type'] = $gateway['type'];
            $data['fund'] = $data['fund'];
            return view('user.made-payment', $data);
        } else {

            $data['invest'] = $invest;
            $data['coin'] = $coin;
            $data['plan'] = $plan;
            $data['type'] = $gateway['type'];

            return view('user.made-payment', $data);
        }
    }

//    public function ip_details($ip) {
//        $json = file_get_contents("http://ipinfo.io/{$ip}");
//        $details = json_decode($json);
//        if (empty($details->country)) {
//            return 'US';
//        }
//        return $details->country;
//    }
//
//    public function getCurrenyCode($country_code) {
//        $currency_codes = array(
//            'GB' => 'GBP',
//            'FR' => 'EUR',
//            'DE' => 'EUR',
//            'IT' => 'EUR',
//        );
//
//        if (isset($currency_codes[$country_code])) {
//            return $curreny_codes[$country_code];
//        }
//
//        return 'USD'; // Default to USD
//    }

    public function withdraw() {
        return view('user.withdraw');
    }

    public function withdrawPost(Request $request) {
        $input = $request->all();
        $rules = [
            'amount' => 'required'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $user_wallet = UserCoin::whereUser_id(Auth::user()->id)->wherePreferable(true)->first();
        if (!is_object($user_wallet)) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'No withdrawal wallet was found in your account please add one and make it Preferable');
            return redirect()->back();
        }
        $check = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(false)->first();
        if (is_object($check)) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'You have a pending withdrawal. Wait for it to be processed before requesting another one.');
            return redirect()->back();
        }
        $all_money = userTrackEarn::whereUser_id(Auth::user()->id)->first();
        $setting = Setting::whereId(1)->first();
        $cal_charge = $request->amount * $setting['withdraw_charge'] / 100;
        $charge = $cal_charge;
        $amount_to_convert = $request->amount - $charge;
        $amount = $amount_to_convert;
        if ($amount < $setting->min_withdraw) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Amont does not reach our minimum withdrawal');
            return redirect()->back();
        }

        if ($amount > $all_money->amount) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Amont to withdraw is higher than amount in your avaliable balance');
            return redirect()->back();
        }
        if (Auth::user()->can_withdraw == true) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Account suspened for withdrawal');
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
            //btc 
            try {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Bitcoin Server Very Busy , Try Again');
                return redirect()->back();
            }

            $coin = $user_wallet->coin->id;
            $action = $coin;
            if ($action == 1) {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
                $btc_amount = number_format(floatval($amount / $btcrate), 6, '.', '');
                $data['amount_convert'] = $btc_amount;
                $data['name'] = 'BTC';
                $data['name_full'] = 'Bitcoin';
            } else if ($action == 2) {
                try {

                    $general_coin = file_get_contents('https://api.blockchain.com/v3/exchange/tickers/ETH-USD');
                } catch (Exception $ex) {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', 'Eth sever error , Try Again');
                    return redirect()->back();
                }
                $eth = $general_coin;
                $ethereum = json_decode($eth);
                $ethereum_final = $ethereum->last_trade_price;
                $eth_amount = number_format(floatval($amount / $ethereum_final), 6, '.', '');
                $data['amount_convert'] = $eth_amount;
                $data['name'] = 'BTC';
                $data['name_full'] = 'Bitcoin';
            } else {
                $data['amount_convert'] = $amount;
                $data['name'] = 'BW';
                $data['name_full'] = 'Bank Wire';
            }
            $data_withdraw = ([
                'transaction_id' => strtoupper(Str::random(12)),
                'user_id' => Auth::user()->id,
                'coin_id' => $user_wallet->id,
                'description' => 'You Withdrew  ' . '$' . $amount,
                'amount' => $amount,
                'total_amount' => $amount + $charge,
                'withdraw_charge' => $charge,
                'message' => null,
                'amount_check' => $data['amount_convert'],
                'confirm' => 1,
                'status' => 0
            ]);
            $request->session()->put('withdraw', $data_withdraw);
            $withdraw = Session::get('withdraw');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        $data['withdraw'] = $withdraw;
        $data['amount_convert'] = $data['amount_convert'];
        $data['address'] = $user_wallet;
        return view('user.withdraw-fund', $data);
    }

    public function withdrawFund(Request $request) {
        $input = $request->all();
        $rules = [
            'transaction_id' => 'required'
        ];
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        $withdraw_create = Session::get('withdraw');
        $withdraw = new Withdraw();
        $withdraw->transaction_id = $withdraw_create['transaction_id'];
        $withdraw->user_id = $withdraw_create['user_id'];
        $withdraw->coin_id = $withdraw_create['coin_id'];
        $withdraw->description = $withdraw_create['description'];
        $withdraw->amount = $withdraw_create['amount'];
        $withdraw->total_amount = $withdraw_create['total_amount'];
        $withdraw->message = null;
        $withdraw->amount_check = $withdraw_create['amount_check'];
        $withdraw->confirm = $withdraw_create['confirm'];
        $withdraw->status = $withdraw_create['status'];
        $withdraw->save();
        if ($withdraw->usercoin->coin_id == 3) {
            $address = $withdraw->usercoin->account_number;
        } else {
            $address = $withdraw->usercoin->address;
        }

        //maual withdraw 
        //send mail
        $email = $withdraw->user->email;
        $user = $withdraw->user->username;
        $subject = 'Withdrawal has been Confirmed ';
        $text = "You Iniated a withdrawal of  " . "$" . $withdraw->amount;
        $message = $text . ' from  Wait for your fund to arrive in your  ' . " account " . $address . ' We will notify you once fund is confirmed Withdrawal';
        Withdraw::whereId($request->withdraw)->update([
            'confirm' => true
        ]);
        ////transcation log
        Transaction::create([
            'user_id' => Auth::user()->id,
            'transaction_id' => $withdraw->transaction_id,
            'type' => 'Withdraw',
            'name_type' => 'Withdraw',
            'withdraw_charge' => $withdraw_create['withdraw_charge'],
            'coin_id' => $withdraw_create['coin_id'],
            'amount' => $withdraw->amount,
            'description' => 'You Widthrew  ' . '$' . $withdraw->amount
        ]);
        $greeting = "Hello $user";
        Mail::to($email)->send(new MailSender($subject, $greeting, $message, '', ''));
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'success');
        session()->flash('message.content', 'Withdrawal Successfully Confirmed');
        return redirect()->back();
    }

    public function depositList() {
        $data['active_deposits'] = Investment::whereUser_id(Auth::user()->id)->whereStatus(false)->whereNotNull('due_pay')->orderBy('created_at', 'desc')->get();
        $data['pending_deposits'] = Investment::whereUser_id(Auth::user()->id)->whereStatus(false)->whereNull('due_pay')->orderBy('created_at', 'desc')->get();
        $data['completed_deposits'] = Investment::whereUser_id(Auth::user()->id)->whereStatus(1)->orderBy('created_at', 'desc')->get();
        return view('user.deposit_list', $data);
    }

    public function depositHistory() {
        $data['deposits'] = Investment::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);

        return view('user.deposit_history', $data);
    }

    public function depositHistoryEducationLicense() {
        $data['deposits'] = UserEducationLicensePlan::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
        return view('user.education.license', $data);
    }

    public function withdrawHistory() {
        $data['withdraws'] = Withdraw::whereUser_id(Auth::user()->id)->whereStatus(true)->orderBy('created_at', 'desc')->paginate(15);
        return view('user.withdraw_history', $data);
    }

    public function earnings() {
        $data['earnings'] = Transaction::whereUser_id(Auth::user()->id)->whereStatus(true)->where(function ($query) {
                    $query->where('name_type', 'Daily Profit')
                            ->orWhere('name_type', 'Return Investment Amount')
                            ->orWhere('name_type', 'Profit Amount')
                            ->orWhere('name_type', 'Profit')
                            ->orWhere('name_type', 'Referral Bonus');
                })->orderBy('created_at', 'desc')->paginate(15);
        return view('user.earnings', $data);
    }

    public function referals() {
        $data['refs'] = Reference::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->with('userRef')->get();

        if (is_object($data['refs'])) {
            $second = [];
            foreach ($data['refs'] as $value) {
                $find = Reference::whereUser_id($value->referred_id)->orderBy('created_at', 'desc')->with('userRef')->get();
                if (!$find->isEmpty()) {
                    $second[] = $find;
                }
            }
            if (!empty($second)) {
                $data['second_refs'] = $second[0];

                $third = [];
                foreach ($data['second_refs'] as $value) {
                    $find = Reference::whereUser_id($value->referred_id)->orderBy('created_at', 'desc')->with('userRef')->get();
                    if (!$find->isEmpty()) {
                        $third[] = $find;
                    }
                }
                if (!empty($third)) {
                    $data['third_refs'] = $third[0];
                }
            }
        }

        $setting = Setting::whereId(1)->first();
        $text = url('/') . '/' . Auth::user()->ref_check;
        $qrCode = new QrCode($text);
        $qrCode->setSize(200);
        $qrCode->setWriterByName('png');
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $qrCode->setLogoPath(public_path() . '/' . $setting['logo']);
        $qrCode->setLogoSize(60, 50);
        $qrCode->setValidateResult(false);
        $qrcode_image = $qrCode->writeDataUri();
        $data['image_qrcode'] = $qrcode_image;
        $data['commission'] = UserWithdrawal::whereUser_id(Auth::user()->id)->whereStatus(true)->whereType('Referral Bonus')->sum('amount');
        return view('user.referals', $data);
    }

    public function referalsLink() {
        return view('user.referallinks');
    }

    public function edit() {
        $data['user'] = User::whereId(Auth::user()->id)->with('coin')->first();

        $data['name_ref'] = Reference::whereReferred_id(Auth::user()->id)->first();

        $data['coinsEnable'] = Coin::whereStatus(true)->with('usercoinUser')->whereStatus(true)->get();

        $data['transactions'] = Transaction::whereUser_id(Auth::user()->id)->orderBy('created_at', 'desc')->take(5)->get();
        return view('user.profile', $data);
    }

    public function editPost(Request $request) {
        $input = $request->all();
        if (!empty($request->full_name)) {
            $rules = ([
                'full_name' => 'required',
                'email' => 'required',
                'username' => 'required'
            ]);
            $error = static::getErrorMessageSweet($input, $rules);
            if ($error) {
                return $error;
            }
        }
        if (!empty($request->support_code)) {
            $rules = ([
                'support_code' => ['required', 'numeric'],
            ]);
            $error = static::getErrorMessageSweet($input, $rules);
            if ($error) {
                return $error;
            }
        }
        if (!empty($request->password) || !empty($request->old)) {
            $rules = ([
                'password' => ['required', 'string', 'min:8'],
//                'confirm_password' => 'required|same:password',
                'old' => ['required', 'string'],
            ]);
            $error = static::getErrorMessageSweet($input, $rules);
            if ($error) {
                return $error;
            }
        }

        if (!empty($request->full_name)) {
            $user = User::firstOrNew(array('id' => $request->id));
            $user->full_name = $request->full_name;
            $user->username = $request->username;
            $user->nick_name = $request->nick_name;
            $user->email = $request->email;
            $user->phone_no = $request->phone_no;
            $user->fb = $request->fb;
            $user->country = $request->country;
            $user->whatsapp = $request->whatsapp;
            $user->insta = $request->insta;
            $user->tele = $request->tele;
            $user->skyp = $request->skyp;
            $user->tw = $request->tw;


            if (!empty($request->type)) {
                $user->type = $request->type;
            }
            if (!empty($request->code)) {
                if ($request->code == 0) {
                    $user->code = $request->code;
                } elseif ($request->code == 1) {
                    $user->code = $request->code;
                }
            }
            $user->save();
        }

        if (!empty($request->avatar)) {
            if ($request->hasFile('avatar')) {
                $user = User::firstOrNew(array('id' => $request->id));
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $rand = 'user-' . $user->ref_check;
                $name = $rand . '.' . $extension;
                $file->move(public_path('/user/photo'), $name);
                $save = 'user/photo/' . $name;
                $user->photo = $save;
                $user->save();
                session()->flash('message.level', 'success');
                session()->flash('message.color', 'green');
                session()->flash('message.content', 'Avatar updated');
                return redirect()->back();
            }
        }

        if (!empty($request->password)) {
            $user = User::firstOrNew(array('id' => $request->id));
            if (\Illuminate\Support\Facades\Hash::check($request->old, $user->password)) {

                $user->password = bcrypt($request->password);
                $user->save();
                session()->flash('message.level', 'success');
                session()->flash('message.color', 'green');
                session()->flash('message.content', 'New password  Successfully Saved');
                return redirect()->back();
            } else {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Old password not same with your current password');
                return redirect()->back();
            }
        }
        if (!empty($request->support_code)) {
            $user = User::firstOrNew(array('id' => $request->id));
            $user->support_code = $request->support_code;
            $user->save();
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', '  Support code has been set');
            return redirect()->back();
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Update Successfully Saved');
        return redirect()->back();
    }

    public function kfc() {
        return view('user.kfc');
    }

    public function kfcPost(Request $request) {
        $input = $request->all();
        $rules = ([
            'file' => 'required|file|max:2048|mimes:png,jpg,jpeg'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rand = Auth::user()->username;
            $name = $rand . '.' . $extension;
            $file->move(public_path('/kyc'), $name);
            $save = $name;
            $user = User::whereId(Auth::user()->id)->first();
            $user->kyc = $save;
            $user->save();
            $subject = 'KYC Verficiation Review';
            $message = "Your KYC review is in progress , you will hear from us soon";

            Notification::route('mail', Auth::user()->email)
                    ->notify(new PlanDepositMail($subject, $message));
            session()->flash('message.level', 'success');
            session()->flash('message.color', 'green');
            session()->flash('message.content', 'KYC File submitted for review');
            return redirect()->back();
        }
    }

    public function reinvest(Request $request) {
        $check = Withdraw::whereUser_id(Auth::user()->id)->whereUser_withdrawal_id($request->id)->first();
        if (is_object($check)) {
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'You can not re-invest this amount because payout is still pending.');
            return redirect()->back();
        }
        $usercoin = UserWithdrawal::whereId($request->id)->first();
        //check plan
        $plan = Plan::whereId($usercoin->plan_id)->first();
        DB::beginTransaction();
        try {
            $coin = $usercoin->usercoin->coin->slug;
            if (empty($coin)) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid Payment Method');
                return redirect()->back();
            }
            $action = $coin;
            $current = Carbon::now();
            $status_deposit = true;
            $due = $current->addHours($plan->compound->compound);
            $due_pay = $due->addMinutes(2);
            $txt = strtolower(Str::random(8));
            //create investment
            $invest = Investment::create([
                        'transaction_id' => $txt,
                        'hash' => 'reinvest',
                        'user_id' => Auth::user()->id,
                        'plan_id' => $usercoin->plan_id,
                        'coin_id' => $usercoin->coin_id,
                        'amount' => $usercoin->amount,
                        'user_withdrawal_id' => $request->id,
                        'run_count' => 0,
                        'earn' => 0,
                        'due_pay' => $due_pay,
                        'status_deposit' => $status_deposit,
                        'settled_status' => 0,
                        'status' => 0
            ]);
            $profit = $invest->amount * $plan->percentage / 100;
            //transcation log
            Transaction::create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $invest->transaction_id,
                'type' => "$usercoin->type Re-investment",
                'name_type' => 'Deposit',
                //'deposit_investment_charge' => $charge,
                'coin_id' => $usercoin->coin_id,
                'amount' => $invest->amount,
                'amount_profit' => $profit,
                'status' => true,
                'description' => "You Re-invested your $usercoin->type Under  " . $plan->name
            ]);

//amount in btc or lite or btc cash
            if ($action == 'bitcoin_address') {
                $data['name'] = 'BTC';
                $data['name_full'] = 'bitcoin';
            }
            if ($action == 'litecoin_address') {
                $data['name'] = 'LTE';
                $data['name_full'] = 'litecoin';
            }
            if ($action == 'ethereum_address') {

                $data['name'] = 'ETH';
                $data['name_full'] = 'ethereum';
            }
            if ($action == 'bitcoin_cash_address') {
//bitcoin cash
                $data['name'] = 'BTC Cash';
                $data['name_full'] = 'bitcoin-cash';
            }
            if ($action == 'dash_address') {
//dash
                $data['name'] = 'dash';
                $data['name_full'] = 'dash';
            }



//check reference for bouns
            $actionb = $coin;
            if ($actionb == 'bitcoin_address') {
                $name = 'Bitcoin';
            }
            if ($actionb == 'litecoin_address') {

                $name = 'Litecoin';
            }
            if ($actionb == 'ethereum_address') {
                $name = 'Ethereum';
            }
            if ($actionb == 'bitcoin_cash_address') {
                $name = 'Bitcoin Cash';
            }
            if ($actionb == 'dash_address') {
                $name = 'Dash';
            }
//
//        $user_ref = Reference::whereReferred_id($invest->user_id)->first();
////        if (is_object($user_ref)) {
////plan ref percentage
//            $bonus = $invest->amount * $invest->plan->ref / 100;
//            $pay = UserCoin::whereUser_id($user_ref->user_id)->whereCoin_id($invest->coin_id)->first();
//            if (is_object($pay)) {
//                $pay->bonus = $pay->bonus + $bonus;
//                $pay->save();
////transcation log
//                Transaction::create([
//                    'user_id' => $user_ref->user_id,
//                    'transaction_id' => $invest->transaction_id,
//                    'type' => 'Re-invest Referral Bonus',
//                    'name_type' => 'Referral Bonus',
//                    'coin_id' => $invest->coin_id,
//                    'amount' => $bonus,
//                    'status' => true,
//                    'amount_profit' => $bonus,
//                    'description' => 'Re-invest Referral Bonus Under ' . $invest->plan->name
//                ]);
//                $user_pay = $user_ref->refs->first_name . ' ' . $user_ref->refs->last_name;
//                $text = "You earned a referral bonus  of $$bonus for referring  $user_pay.";
//
//
//                $message = $text;
//
//                $this->sendMail($pay->user->email, $pay->user->first_name, 'Referral Bonus Notification', $message);
//            }
//        }
            //set user withdrawal status
            UserWithdrawal::whereId($invest->user_withdrawal_id)->update([
                'status' => false
            ]);

            $email = Auth::user()->email;
            $subject = 'New Re-Investment Notification';
            $message = ' You Re-invested your ' . $usercoin->type . ' $' . $invest->amount . " using " . $data ['name'] . "  Under " . $plan->name . "  .";
            // $this->sendMail($email, Auth::user()->username, $subject, $message);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'success');
        session()->flash('message.content', $usercoin->type . ' of ' . '$' . $invest->amount . ' Successfully Re-Invested');
        return redirect()->back();
    }

    public function getCoinCal(Request $request) {

        $plan = Plan::whereId($request->plan_id)->first();
        $general_coin = file_get_contents('https://api.blockchain.com/v3/exchange/tickers/ETH-USD');
        $eth = $general_coin;
        $ethereum = json_decode($eth);
        $ethereum_final = $ethereum->last_trade_price;
        $data['eth'] = number_format(floatval($request->amount / $ethereum_final), 6, '.', '');
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        $data['btc'] = number_format(floatval($request->amount / $btcrate), 6, '.', '');
        if ($request->amount < $plan->min) {
            $data['message_danger'] = 'Amount is too low for this Plan  ';
            $data['status'] = 401;
            return $data;
        }
//        if ($request->amount > $plan->max) {
//            $data['message_danger'] = 'Amount is too high for this Plan License  ';
//            $data['status'] = 401;
//            return $data;
//        }
        $setting = Setting::whereId(1)->first();
        $data['direct_bonus'] = "$plan->percentage% / $setting->level_1% / $setting->level_2%";
        $data['amount'] = number_format($request->amount);
        $net_profit_cal = $request->amount * $plan->percentage / 100;
        $net_profit = $net_profit_cal * 4;
//        $return = $plan->min + $net_profit;
        $data['net_profit'] = number_format($net_profit);
        $data['return'] = number_format($net_profit_cal, 2);
        $data['plan'] = $plan->id;
        $data['amount_cal'] = $request->amount;
        return $data;
    }

}
