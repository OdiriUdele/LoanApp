<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasEvents;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable, HasEvents;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isadmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loans(){
        
        return $this->hasMany('App\Models\Loan\Loan');
    }

    public function loanPayments(){
        
        return $this->hasMany('App\Models\Loan\LoanPayment');
    }

    public function payment_auths(){
        
        return $this->hasMany('App\Models\PaymentAuth');
    }

    public function activepayment_auths(){ 
      return DB::table('payment_auths')->where(['active'=>1,'user_id'=>$this->id])->first();
    }
    public function activities(){
        
        return $this->hasMany('App\Models\Activities');
    }

    public function details(){
        
        return $this->hasOne('App\Models\UserDetails');
    }
}
