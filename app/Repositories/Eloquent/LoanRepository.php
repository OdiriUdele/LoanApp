<?php

namespace App\Repositories\Eloquent;

use App\Models\Loan\Loan;
use App\Models\Loan\LoanCollateral;
use App\Models\Loan\LoanPayment;
use App\Repositories\Eloquent\Interfaces\LoanRepositoryInterface;
use Illuminate\Support\Collection;
use Auth;

class LoanRepository extends BaseRepository implements LoanRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Loan $model)
   {
       parent::__construct($model);
   }

   /**
    *@param array $attributes
    *
    * @return Model
    */
    public function saveLoanCollateral(array $attributes)
    {
        $modelelem = LoanCollateral::create($attributes);

        return $model;
    }

    /**
    *@param array $attributes
    *
    * @return Model
    */
   public function createLoanPayment(array $attributes)
   {
        $model = LoanPayment::create($attributes);

        return $model;
   }

    /**
    *@param array $attributes
    *
    * @return Model
    */
    public function updateLoanPaymentAttrib($attrib, $value, $id)
    {
         $modelelem = LoanPayment::find($id);
         $modelelem->$attrib = $value;
         $modelelem->save();

         return $modelelem;
    }

   public function findLoanPayment($id)
   {
        $modelelem = LoanPayment::find($id);
        return $modelelem;
   }

    public function activate_deactivateLoan($id, $active=1)
    {
        $loan = $this->find($id);
        $loan->active = $active;
        $loan->save();

        return $loan;
    }


}