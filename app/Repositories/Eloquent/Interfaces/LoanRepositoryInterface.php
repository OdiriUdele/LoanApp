<?php
namespace App\Repository\Eloquent\Interfaces;

interface UserRepositoryInterface
{
    //fetch all user Loan
    public function all();

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
}