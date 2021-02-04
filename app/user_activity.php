<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_activity extends Model
{
    protected $table = 'user_activities';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'action', 'action_model', 'action_id',
    ];

    public function user(){
        
        return $this->belongsTo('App\User', 'user_id');
    }

}
