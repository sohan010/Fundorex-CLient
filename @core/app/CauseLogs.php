<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauseLogs extends Model
{
    protected $table = 'cause_logs';
    protected $fillable = ['cause_id','email','name','status','amount','transaction_id','payment_gateway','track','user_id','anonymous','admin_charge','donation_withdraw_id'];

    public function cause(){
        return $this->belongsTo('App\Cause','cause_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function withdraw(){
        return $this->belongsTo('App\DonationWithdraw','donation_withdraw_id');
    }
}
