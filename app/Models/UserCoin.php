<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCoin extends Model {

    protected $fillable = [
        'user_id', 'coin_id', 'address', 'preferable', 'bank_name', 'account_name', 'account_number', 'wire_routing_number',
        'ach_routing_number', 'swift_code', 'bank_address'
    ];

    public function coin() {
        return $this->belongsTo(Coin::class, 'coin_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userWithdraw() {
        return $this->hasMany(UserWithdrawal::class, 'coin_id')->whereStatus(true);
    }

}
