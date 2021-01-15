<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'loan_id','amount','due_date','paid',
    ];

    public function loan(){

        return $this->belongsTo('App\Models\Loan\Loan', 'loan_id');
    }

    public function user(){
        
        return $this->belongsTo('App\User', 'user_id');
    }
}
