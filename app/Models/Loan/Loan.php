<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Model;

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

    public function loanPayment(){
        
        return $this->hasOne('App\Models\Loan\LoanPayment');
    }

    public function loanCollateral(){
        
        return $this->hasOne('App\Models\Loan\LoanPayment');
    }

}