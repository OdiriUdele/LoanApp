<?php

namespace App\Repositories\Eloquent;

use App\User;
use App\Models\UserDetails;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(UserDetails $model)
   {
       parent::__construct($model);
   }

   /**
    *@param array $attributes
    *
    * @return Model
    */
   public function updateDetail(array $attributes, $id)
   {
       $checkid = $this->detailExist($id);
       if($checkid->count() > 0){
        return $this->update($attributes,Auth::user()->details->id );
       }else{
        return $this->create($attributes);  
       }
   }

   public function detailExist($userid)
   {
        return $this->findByUserId($userid);   
   }
}