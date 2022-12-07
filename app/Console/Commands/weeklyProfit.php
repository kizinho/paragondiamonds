<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Investment;
use App\Models\Transaction;
use App\Models\Admin\Setting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\UserWithdrawal;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Mail;
use App\Models\userTrackEarn;

class weeklyProfit extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly profit payout';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $setting = Setting::whereId(1)->first();
        DB::beginTransaction();
        try {
            if ($setting->investment_payment_mode == false) {
//                $investments = Investment::whereStatus(0)->whereStatus_deposit(1)->where('updated_at', '<', Carbon::now()->subDays(4))->get();
                $investments = Investment::whereStatus(0)->whereStatus_deposit(1)->get();
                foreach ($investments as $invest) {
                    $action = $invest->usercoin->coin->slug;
                    if ($action == 'bitcoin_address') {
                        $name = 'Bitcoin';
                    }

                    if ($action == 'ethereum_address') {
                        $name = 'Ethereum';
                    }

                    $weeks = round($invest->plan->compound->compound * 0.00595238, 2);
                    $profit = $invest->amount * $invest->plan->percentage / 100;
                    $months = (int) $weeks;
                    $earnAmount = $profit * $months;
                    $check = $invest->earn;
//                    $days_working_days = $this->get_weekdays(date('m'), date('y'));
//                    $days_count = Carbon::now()->daysInMonth;
                    if ($check != $earnAmount && $check <= $earnAmount) {
                        $daily_profit = $profit/4;
                        //userwithdrawal
                        $user_withdraw = new UserWithdrawal();
                        $user_withdraw->amount = $daily_profit;
                        $user_withdraw->user_id = $invest->user_id;
                        $user_withdraw->coin_id = $invest->usercoin->id;
                        $user_withdraw->type = "Profit";
                        $user_withdraw->status = true;
                        $user_withdraw->plan_id = $invest->plan_id;
                        $user_withdraw->save();
                        $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($invest->user_id)));
                        $userMoney->user_id = $invest->user_id;
                        $userMoney->amount = $userMoney->amount + $daily_profit;
                        $userMoney->save();
                        //update investment 
                        $update_investment = Investment::findOrFail($invest->id);
                        $update_investment->run_count = $invest->run_count + 1;
                        $update_investment->earn = $invest->earn + $daily_profit;
                        $update_investment->save();

                        //transcation log
                        Transaction::create([
                            'user_id' => $invest->user_id,
                            'transaction_id' => $invest->transaction_id,
                            'type' => $invest->plan->name,
                            'name_type' => 'Weekly Profit',
                            'coin_id' => $invest->usercoin->id,
                            'status' => true,
                            'amount' => $daily_profit,
                            'amount_profit' => $daily_profit,
                            'description' => 'Weekly Profit Notification Under ' . $invest->plan->name,
                        ]);
                        $name = $invest->user->username;
                        $greeting = "Hello $name";
                        $text_p = "Weekly Profit of $$daily_profit has been credited to your  <b>diamond account<b/>";
                        Mail::to($invest->user->email)->send(new MailSender('Weekly Profit Notification', $greeting, $text_p, '', ''));
                        if ($update_investment->earn >= $earnAmount || $update_investment->earn == $earnAmount) {
                            $return_amount = $invest->amount;
                            $user_withdraw = new UserWithdrawal();
                            $user_withdraw->amount = $invest->amount;
                            $user_withdraw->user_id = $invest->user_id;
                            $user_withdraw->coin_id = $invest->usercoin->id;
                            $user_withdraw->type = "Main Balance";
                            $user_withdraw->status = false;
                            $user_withdraw->main_invest = false;
                            $user_withdraw->plan_id = $invest->plan_id;
                            $user_withdraw->save();
                            //we not paying user initial deposit untill they request for it
                            //update investment 
                            $update_investment = Investment::findOrFail($invest->id);
                            $update_investment->status = true;
                            $update_investment->save();

                            //transcation log
                            Transaction::create([
                                'user_id' => $invest->user_id,
                                'transaction_id' => $invest->transaction_id,
                                'type' => $invest->plan->name,
                                'name_type' => 'Return Investment Amount',
                                'coin_id' => $invest->usercoin->id,
                                'status' => true,
                                'amount' => $return_amount,
                                'amount_profit' => $return_amount,
                                'description' => 'You Investment Amount Returned  Under ' . $invest->plan->name
                            ]);
                            $name = $invest->user->username;
                            $greeting = "Hello $name";
                            $text = "Your investment of $$invest->amount have been returned.";
                            Mail::to($invest->user->email)->send(new MailSender('Investment  Completed', $greeting, $text, '', ''));
                        }
                    } else {
                        $return_amount = $invest->amount;
                        $user_withdraw = new UserWithdrawal();
                        $user_withdraw->amount = $invest->amount;
                        $user_withdraw->user_id = $invest->user_id;
                        $user_withdraw->coin_id = $invest->usercoin->id;
                        $user_withdraw->type = "Main Balance";
                        $user_withdraw->status = false;
                        $user_withdraw->main_invest = false;
                        $user_withdraw->plan_id = $invest->plan_id;
                        $user_withdraw->save();
                        //we not paying user initial deposit untill they request for it
                        //update investment 
                        $update_investment = Investment::findOrFail($invest->id);
                        $update_investment->status = true;
                        $update_investment->save();

                        //transcation log
                        Transaction::create([
                            'user_id' => $invest->user_id,
                            'transaction_id' => $invest->transaction_id,
                            'type' => $invest->plan->name,
                            'name_type' => 'Return Investment Amount',
                            'coin_id' => $invest->usercoin->id,
                            'status' => true,
                            'amount' => $invest->amount,
                            'amount_profit' => $invest->amount,
                            'description' => 'You Investment Amount Returned  Under ' . $invest->plan->name
                        ]);
                        $text = "Your investment of $$invest->amount have been returned.";
                        $name = $invest->user->username;
                        $greeting = "Hello $name";
                        Mail::to($invest->user->email)->send(new MailSender('Investment  Completed', $greeting, $text, '', ''));
                    }
                }
            } else {
                $investments = Investment::whereStatus(0)->whereStatus_deposit(1)->where('due_pay', '<', Carbon::now())->get();
//dd($investments);
                foreach ($investments as $invest) {
                    $action = $invest->usercoin->coin->slug;
                    if ($action == 'bitcoin_address') {
                        $name = 'Bitcoin';
                    }

                    if ($action == 'ethereum_address') {
                        $name = 'Ethereum';
                    }

                    $profitamount = $invest->amount * $invest->plan->percentage / 100;
                    //user withdrawal
                    $user_withdraw_p = new UserWithdrawal();
                    $user_withdraw_p->amount = $profitamount;
                    $user_withdraw_p->user_id = $invest->user_id;
                    $user_withdraw_p->coin_id = $invest->usercoin->id;
                    $user_withdraw_p->type = "Profit";
                    $user_withdraw_p->status = true;
                    $user_withdraw_p->plan_id = $invest->plan_id;
                    $user_withdraw_p->save();
                    //main balance
                    $user_withdraw = new UserWithdrawal();
                    $user_withdraw->amount = $invest->amount;
                    $user_withdraw->user_id = $invest->user_id;
                    $user_withdraw->coin_id = $invest->usercoin->id;
                    $user_withdraw->type = "Main Balance";
                    $user_withdraw->status = false;
                    $user_withdraw->main_invest = false;
                    $user_withdraw->plan_id = $invest->plan_id;
                    $user_withdraw->save();
                    $userMoney = userTrackEarn::firstOrNew(array('user_id' => ($invest->user_id)));
                    $userMoney->user_id = $invest->user_id;
                    $userMoney->amount = $userMoney->amount + $profitamount;
                    $userMoney->save();
                    //update investment 
                    $update_investment = Investment::findOrFail($invest->id);
                    $update_investment->status = true;
                    $update_investment->earn = $update_investment->earn + $profitamount;
                    $update_investment->com_earn = $update_investment->com_earn + $profitamount;
                    $update_investment->save();

                    //transcation log profit
                    Transaction::create([
                        'user_id' => $invest->user_id,
                        'transaction_id' => $invest->transaction_id,
                        'type' => $invest->plan->name . ' license',
                        'name_type' => 'Profit Amount',
                        'coin_id' => $invest->usercoin->id,
                        'amount' => $profitamount,
                        'status' => true,
                        'amount_profit' => $profitamount,
                        'description' => 'You Investment Profit Under ' . $invest->plan->name . ' license',
                    ]);
                    $name = $invest->user->username;
                    $greeting = "Hello $name";
                    $text = "Profit of $$profitamount has been credited to your wallet.";
                    Mail::to($invest->user->email)->send(new MailSender('Profit Notification', $greeting, $text, '', ''));
                    //transcation log
                    Transaction::create([
                        'user_id' => $invest->user_id,
                        'transaction_id' => $invest->transaction_id,
                        'type' => 'Deposit Investment',
                        'name_type' => 'Return Investment Amount',
                        'coin_id' => $invest->usercoin->id,
                        'amount' => $invest->amount,
                        'status' => true,
                        'amount_profit' => $invest->amount,
                        'description' => 'You Investment Amount Returned  Under ' . $invest->plan->name
                    ]);
                    $name = $invest->user->username;
                    $greeting_in = "Hello $name";
                    $text_in = "Your investment of $$invest->amount have been returned.";
                    Mail::to($invest->user->email)->send(new MailSender('Investment  Completed.', $greeting_in, $text_in, '', ''));
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        return 'success';
    }

    function get_weekdays($m, $y) {
        $lastday = date("t", mktime(0, 0, 0, $m, 1, $y));
        $weekdays = 0;
        for ($d = 29; $d <= $lastday; $d++) {
            $wd = date("w", mktime(0, 0, 0, $m, $d, $y));
            if ($wd > 0 && $wd < 6) {
                $weekdays++;
            }
        }
        return $weekdays + 20;
    }

}
