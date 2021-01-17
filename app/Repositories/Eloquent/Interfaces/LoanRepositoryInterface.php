<?php
namespace App\Repositories\Eloquent\Interfaces;

interface LoanRepositoryInterface
{

     /**
    * @param array $attributes
    * @return Model
    *
    * save Loan Collateral
    */
   public function saveLoanCollateral(array $attributes);

     /**
    * @param array $attributes
    * @return Model
    *
    * create and save Loan Payment
    */
    public function createLoanPayment(array $attributes);

    public function findLoanPayment($id);

    public function activate_deactivateLoan($id,$active=1);
}