<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Eloquent\Interfaces\LoanRepositoryInterface;
use App\Models\Loan\Loan;
use Exception;

class PenaliseLoan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loan:penalise';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Add a charge of 0.5% to loan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(LoanRepositoryInterface $loanRepository)
    {
        $this->loanRepository = $loanRepository;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Loan Penalty has been Successful');
        // $dueloans= Loan::whereDate('due_date', '<=', date('Y-m-d'))->where(['active'=>1,'failed_payment'=>1])->get();
        // foreach($dueloans as $loan){
        //     try{
        //         $loan_charge = $loan->incurred_charge;
        //         $loanPay = $loan->loanPayment();

        //         $incurred_amount = $loan_charge + helper_loan_charge($loan->id);
        //         $new_payment_amount = $loan->amount  + $incurred_amount;
        //         //add Charge to 
        //         $loanM = $this->loanRepository->updateAttrib('incurred_charge',$incurred_amount,$loan->id);
        //         $Pay = $this->loanRepository->updateLoanPaymentAttrib('amount',$new_payment_amount,$loanPay->id);
        //         $loanM = $this->loanRepository->updateAttrib('failed_payment','0',$loan->id);
        //         $this->info('Loan Penalty has been Successful');
        //     }catch(Exception $e){
        //         $this->info('Failed to add incurred charge');
        //     }
        // }
    }
}
