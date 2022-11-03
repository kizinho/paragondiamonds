<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducationLicensePlan extends Model
{
    use HasFactory;
     protected $dates = ['due_pay'];
    protected $fillable = [
        'transaction_id', 'user_id', 'education_license_id', 'coin_id', 'amount', 'amount_check', 'due_pay', 'status_deposit', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usercoin() {
        return $this->belongsTo(UserCoin::class, 'coin_id')->with('coin');
    }

    public function plan() {
        return $this->belongsTo(EducationLicensePlan::class, 'education_license_id');
    }

    public function plans() {
        return $this->hasMany(EducationLicensePlan::class, 'education_license_id');
    }

}
