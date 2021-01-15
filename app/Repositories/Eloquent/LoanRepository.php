<?php

namespace App\Repositories\Eloquent;

use App\Models\Loan\Loan;
use App\Models\Loan\LoanCollateral;
use App\Models\Loan\LoanPayment;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;

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
    * @return Collection
    */
   public function all()
   {
       return $this->model->all();    
   }
}