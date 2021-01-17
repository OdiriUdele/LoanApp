<?php

namespace App\Http\Controllers;

use App\Models\Loan\Loan;
use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Interfaces\LoanRepositoryInterface;
use App\Http\Requests\LoanRequest;
use Auth;

class LoanController extends Controller
{

    private $loanRepository;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoanRepositoryInterface $loanRepository)
    {
        $this->middleware(['auth','hasBank']);
        $this->loanRepository = $loanRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLoans = $this->loanRepository->findByUserId(Auth::User()->id);

        return view('loan.loans',compact('userLoans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan.add_loan');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\LoanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request)
    {
       
        try{
            $Loan = $this->loanRepository->create($request->all());
            $collateral = $this->loanCollateral($request,$Loan->id);
            $LoanCollateral = $this->loanRepository->saveLoanCollateral($collateral);
            return redirect()->route('loan.index')->with('success','Loan Created Successfully');
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->with('error','Someting went wrong try Again!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }

    public function loanCollateral($request,$id){  
        return [
            'user_id'=>helper_user_id(), 
            'loan_id'=>$id,
            'car_make'=>$request['car_make'],
            'car_year'=>$request['car_make'],
            'car_model'=>$request['car_make'],
            'car_body_style'=>$request['car_make'],
        ];
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

    /////////////////ADMIN///////////////////////////////////

      //fetch active loans for Admin
      public function activeLoan()
      {
          $loans = $this->loanRepository->all($active=1);
          $activeloans = $loans->latest()->get();
          return view('admin.active_loan',compact('activeloans'));
      }
  
      //fetch loan requests for admin
      public function loanRequests()
      {
          $loans = $this->loanRepository->all($active=0);
          $loanrequests = $loans->latest()->get();
          return view('admin.loan_requests',compact('loanrequests'));
      }

       //fetch loan requests for admin
       public function activate_loan($id)
       {
           try{
           $loan = $this->loanRepository->activate_deactivateLoan($id,1);
           $payment = $this->loanPayment($loan,$id);
           $LoanPayment = $this->loanRepository->createLoanPayment($payment);
           return redirect()->back()->with('success','Loan Activated Successfully');
           }catch(Exception $e){
             dd($e);
           }
       }

       //fetch loan requests for admin
       public function deactivate_loan($id)
       {
           try{
           $loan = $this->loanRepository->activate_deactivateLoan($id,0);
        //    dd($loan->loanPayment());
           $LoanPayment = $this->loanRepository->findLoanPayment($loan->loanPayment()->id);
           $LoanPayment->delete();
           return redirect()->back()->with('success','Loan DeActivated Successfully');
           }catch(Exception $e){
             dd($e);
           }
       }

}
