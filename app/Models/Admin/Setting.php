<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    protected $fillable = [
        'site_name', 'site_url','site_phone', 'site_email', 'site_phone', 'send_notify_email', 'ref_percentage', 'address', 'site_code', 'logo', 'favicon', 'location',
        'video_link', 'copy_right', 'deposit_investment_charge', 'withdraw_charge','investment_payment_mode','email_body','block_io_pin','auto_withdraw'
    ];

}
