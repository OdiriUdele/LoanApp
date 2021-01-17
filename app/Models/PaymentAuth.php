<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentAuth extends Model
{
    protected $table = 'payment_auths';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'authorization_code', 'card_type','last4','exp_month','exp_year','bin','bank', 'channel', 'signature','reusable','country_code','account_name','active'
    ];


    public function user(){
        
        return $this->belongsTo('App\User', 'user_id');
    }
}
