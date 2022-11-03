<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model {

    protected $dates = ['due_pay', 'time_pay'];
    protected $fillable = [
        'transaction_id', 'user_id', 'plan_id', 'coin_id', 'amount', 'run_count', 'amount_check', 'due_pay', 'time_pay', 'status_deposit', 'deposit_investment_charge', 'settled_status', 'status', 'user_withdrawal_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usercoin() {
        return $this->belongsTo(UserCoin::class, 'coin_id');
    }

    public function coin() {
        return $this->belongsTo(Coin::class, 'coin_id');
    }

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function plans() {
        return $this->hasMany(Plan::class, 'plan_id');
    }

    public function cal() {
        $weeks = round($this->plan->compound->compound * 0.00595238, 2);
        $profit = $this->amount * $this->plan->percentage / 100;
        $months = (int) $weeks * 4;
        $earnAmount = $profit * $months;
        return round($this->earn / ($earnAmount / 100), 1);
    }

    public function calTotal() {
        $weeks = round($this->plan->compound->compound * 0.00595238, 2);
        $profit = $this->amount * $this->plan->percentage / 100;
        $months = (int) $weeks * 4;
        $earnAmount = $profit * $months;
        return $earnAmount;
    }

}
