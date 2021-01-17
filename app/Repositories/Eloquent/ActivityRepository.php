<?php

namespace App\Repositories\Eloquent;

use App\Models\Activities;
use App\Repositories\Eloquent\Interfaces\ActivityRepositoryInterface;
use Illuminate\Support\Collection;

class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Activities $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    *
    * fetch User Activities
    */
   public function all($id)
   {
       return $this->model->where('user_id',$id)->latest();    
   }
}