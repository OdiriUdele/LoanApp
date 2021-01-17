<?php

if(! function_exists('helper_flash')){
    function helper_flash($message='Successful!')
    {
        session()->flash('message', $message);
    }
}
//check if a user is an admin
if(! function_exists('helper_is_admin')){
    function helper_is_admin()
    {
        return auth()->user()->isadmin == 1 ? true: false;
    }
}
////////////////////////USER//////////////////
// this function returns the id of a user
if(! function_exists('helper_user_id')){
    function helper_user_id(){
        // dd(auth()->user());
        return auth()->user() ? auth()->user()->id : "";
    }
}
//number of user payment details
if(! function_exists('helper_user_payauth_count')){
    function helper_user_payauth_count(){
        // dd(auth()->user());
        $m_count = auth()->user() ? auth()->user()->payment_auths->count() : 0;
        return $m_count;
    }
}
//user active payment details
if(! function_exists('helper_user_payauth_active')){
    function helper_user_payauth_active(){
        // dd(auth()->user());
        $m_count = DB::table('payment_auths')->where(['active'=>1,'user_id'=>helper_user_id()])->count();
        if($m_count>0){
            return true;
        }
        return false;
    }
}

//count number of active Loans
if(! function_exists('helper_user_active_loan')){
    function helper_user_active_loan(){
        $m_count = DB::table('loans')->where(['active'=>1,'user_id'=>helper_user_id()])->first();
        return $m_count;
    }
}

//count number of active Loans
if(! function_exists('helper_user_loan_count')){
    function helper_user_loan_count(){
        $m_count = auth()->user() ? auth()->user()->loans->count() : 0;
        return $m_count;
    }
}

// this function returns the user details
if(! function_exists('helper_user_details')){
    function helper_user_details(){
        // dd(auth()->user());
        return  auth()->user() ? auth()->user()->details : "";
    }
}
// this function returns the number of user details
if(! function_exists('helper_details_count')){
    function helper_details_count(){
        // dd(auth()->user());
        return  auth()->user()->details ? auth()->user()->details->count() : 0;
    }
}
// <!-- User -->/////////////////////////////////End User///////////////////////////

////////////////// ADMIN//////////////////////////////////////////////////
//admin count number of active Loans
if(! function_exists('helper_active_loan_count')){
    function helper_active_loan_count(){
        $m_count = DB::table('loans')->where(['active'=>1])->count();
        return $m_count;
    }
}
//admin active loans total amount
if(! function_exists('helper_active_loan_amount')){
    function helper_active_loan_amount(){
        $m_count = DB::table('loans')->where(['active'=>1])->sum('amount');
        return $m_count;
    }
}
//admin count number of Loan request
if(! function_exists('helper_loan_request_count')){
    function helper_loan_request_count(){
        $m_count = DB::table('loans')->where(['active'=>0])->count();
        return $m_count;
    }
}
//admin check is user has active Loan
if(! function_exists('helper_user_has_active_loan')){
    function helper_user_has_active_loan($user_id){
        $m_count = DB::table('loans')->where(['user_id'=>$user_id,'active'=>1])->count();
        return $m_count;
    }
}

