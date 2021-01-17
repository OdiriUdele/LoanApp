<?php

namespace App\Repositories\Eloquent;

use App\User;
use App\Models\UserDetails;
use App\Models\PaymentAuth;
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

    /**
    *@param array $attributes
    *
    * @return Model
    */
    public function updatePaymentInfo(array $attributes)
    {
        $modelelem = new PaymentAuth();
        parent::__construct($modelelem);

        $model = $this->create($attributes);

        $activepayExist = $this->activePayExist();
        if(!$activepayExist){
           $model = $this->activate_deactivatePay($model,1);
        }
        return $model;
    }


   public function detailExist($userid)
   {
        return $this->findByUserId($userid);   
   }

   public function activePayExist()
   {
        if(helper_user_payauth_active()){
            return true;
        }   
        return false;
   }

   public function activate_deactivatePay(PaymentAuth $model, $active=1)
   {
        $model->active = $active;
        $model->save();
        return $model;
   }

}