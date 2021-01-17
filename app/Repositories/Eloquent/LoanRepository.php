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
        $modelelem = new LoanCollateral();
        parent::__construct($modelelem);

        $model = $this->create($attributes);

        return $model;
    }

    /**
    *@param array $attributes
    *
    * @return Model
    */
   public function createLoanPayment(array $attributes)
   {
        $modelelem = new LoanPayment();
        parent::__construct($modelelem);

        $model = $this->create($attributes);

        return $model;
   }

   public function findLoanPayment($id)
   {
        $modelelem = new LoanPayment();
        parent::__construct($modelelem);

        $model = $this->find($id);
        return $model;
   }

    public function activate_deactivateLoan($id, $active=1)
    {
        $loan = $this->find($id);
        $loan->active = $active;
        $loan->save();

        return $loan;
    }


}