<?php

namespace App\Observers;
use Auth;
use Illuminate\Database\Eloquent\Model;
Use App\user_activity;

class UserActionsObserver
{
    public function created(Model $model){
        if(Auth::check()){
            user_activity::create([
                'user_id'=>Auth::user()->id, 
                'action'=>"new ".$model->getTable()." created",
                 'action_model'=>$model->getTable(),
                  'action_id'=>0
            ]);
        }
    }

    public function deleting($model){

        if(Auth::check()){
            user_activity::create([
                'user_id'=>Auth::user()->id, 
                'action'=>"loan deleted",
                'action_model'=>$model->getTable(),
                'action_id'=>$model->id
            ]);
        }
    }
}
