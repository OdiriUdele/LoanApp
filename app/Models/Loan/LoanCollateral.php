<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Model;

class LoanCollateral extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'loan_id','car_make','car_year','car_model','car_body_style',
    ];

    public function loan(){

        return $this->belongsTo('App\Models\Loan\Loan', 'loan_id');
    }

    public function user(){
        
        return $this->belongsTo('App\User', 'user_id');
    }
}
