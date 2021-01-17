<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Model;
use DB;

class Loan extends Model
{
    protected $table = 'loans';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'loan_name', 'amount','due_date','active',
    ];


    public function user(){
        
        return $this->belongsTo('App\User', 'user_id');
    }

    public function allloanPayment(){
        return $this->hasMany('App\Models\Loan\LoanPayment','loan_id','id');
    }

    public function loanPayment(){
        return DB::table('loan_payments')->where(['active'=>1,'loan_id'=>$this->id])->first();
    }

    public function loanCollateral(){
        
        return $this->hasOne('App\Models\Loan\LoanPayment');
    }

}
