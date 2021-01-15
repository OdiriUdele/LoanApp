<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'activity',
    ];

    public function user(){
        
        return $this->belongsTo('App\User', 'user_id');
    }
}
