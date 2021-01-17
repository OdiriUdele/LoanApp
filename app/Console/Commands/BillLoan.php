<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Loan\Loan;
use Exception;
use App\Repositories\Eloquent\Interfaces\LoanRepositoryInterface;
use Carbon\Carbon;

class BillLoan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loan:bill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bill loans which due date has been exceeded';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $loanRepository;

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
        $dueloans= Loan::where(['active'=>1])->whereDate('due_date', '<=', date('Y-m-d'))->get();
        foreach($dueloans as $loan){
             try{

                $loanPay = $loan->loanPayment();
                $user = $loan->user;
                $amount = $loan->amount;

                //bill User Card
                $result = $this->debit_user($user,$amount);
               
                if(($result->status && $result->data->status == 'success')){
                     //verify if billing was successful
                    $verify = $this->verify_payment($result->data->reference);

                    $err = $verify[1];
                    $status = $verify[0];
                    if (!$err) {
                        if($status->status && $status->data->status == 'success'){
                            $loanM = $this->loanRepository->updateAttrib('due_date', \Carbon\Carbon::now()->addDays(30),$loan->id);
                            $loanM = $this->loanRepository->updateAttrib('incurred_charge','0',$loan->id);
                            $Pay = $this->loanRepository->updateLoanPaymentAttrib('active','0',$loanPay->id);
                            $Pay =$this->loanRepository->updateLoanPaymentAttrib('paid','1',$loanPay->id);
                            $payment = $this->loanPayment($loanM,$loanM->id);
                            $LoanPayment = $this->loanRepository->createLoanPayment($payment);
                            $this->info('Loan Bill has been Successful');
                        }
                    }else{
                        $loanM = $this->loanRepository->updateAttrib('failed_payment',1,$loan->id);
                    }
                }else{
                    $loanM = $this->loanRepository->updateAttrib('failed_payment',1,$loan->id);
                }

            }catch(Exception $e){
                $this->info($e);
            }
        }
    }

    public function debit_user($user,$amount){
        $user_payment_details = $user->activepayment_auths();
        $user_payment_auth = $user_payment_details->authorization_code;

        $url = "https://api.paystack.co/transaction/charge_authorization";
            $fields = [
                'authorization_code' => $user_payment_auth,
                'email' => $user->email,
                'amount' => $amount
            ];
            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();
            
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer ".env('PAYSTACK_TEST_SECRET_KEY', null),
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
            //execute post
            $res = curl_exec($ch);
            $result = json_decode($res);
            return $result;
    }

    public function verify_payment($reference){
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".env('PAYSTACK_TEST_SECRET_KEY', null),
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $result = [json_decode($response),$err];
        return $result;
    }

    public function loanPayment($loan,$id, $paid=0){  
        return [
            'user_id'=>$loan->user_id, 
            'loan_id'=>$id,
            'amount'=>$loan->amount,
            'due_date'=>$loan->due_date,
            'active'=>$loan->active,
            'paid'=>$paid,
        ];
    }

}
