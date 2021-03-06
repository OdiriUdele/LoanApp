<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasEvents;

class UserDetails extends Model
{
    use HasEvents;

    protected $table = 'user_details';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'phone', 'date_of_birth','bank_name','bank_acct_num','bank_acct_name','bvn_number'
    ];


    public function user(){
        
        return $this->belongsTo('App\User', 'user_id');
    }

}
