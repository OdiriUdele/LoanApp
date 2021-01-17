<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use Exception;

class PaystackApiController extends Controller
{

    private $userRepository;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        // $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    //////payment Information//////////////////

    //returns paystack key
    public function paystack_secret_key(){
        return env('PAYSTACK_TEST_SECRET_KEY', null);
        
    }

    //test payment using user card details
    public function testPaymentInfo(){
        $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
            'email' => auth()->User()->email,
            'amount' => "5000",
            'callback_url'=>'http://localhost:8000/paymentinfo/confirm',
            'channels'=>['card']
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$this->paystack_secret_key(),
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        $jsonurl = json_decode($result);
        $url = $jsonurl->data->authorization_url;
        return redirect()->away($url);
        // echo $url->status;
    }

    public function addPaymentInfo(Request $request){
        // dd($request->reference);

        $reference = $request->reference;

        $verify = $this->verify_payment($reference);
        $err = $verify[1];
        $result = $verify[0];
        if (!$err) {
            $check = $this->check_card_result($result);
            if($check){
                $status = $this->refund($result->data->reference);
                if($status){
                    redirect()->route('profile.index')->with('success', 'Payment Details Successfully Updated');
                }
            }
        }
        
        return redirect('/home')->with('error', 'Failed to verify Payment Details');
    }

    public function refund($reference){
        $url = "https://api.paystack.co/refund";
        $fields = [
            'transaction' => $reference
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$this->paystack_secret_key(),
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        $res = json_decode($result);
        return $res->status;
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
            "Authorization: Bearer ".$this->paystack_secret_key(),
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $result = [json_decode($response),$err];
        return $result;
    }

    public function check_card_result($result){
        try{
            if($result->status && $result->data->status == 'success'){
                $allpaymentAuth = $result->data->authorization;
                $allpaymentAuth->user_id=helper_user_id();
                // dd($allpaymentAuth);
                $paymentAuth = (array)$allpaymentAuth;
                $payment_info = $this->userRepository->updatePaymentInfo($paymentAuth);
                return true;
            }
            return false;
        }catch(Exception $e){
            dd($e);
            return false;
           
        }
    }

}
