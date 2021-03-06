<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan\loan;
use App\Models\Loan\LoanPayment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
     if(helper_is_admin()){
         return view('admin.home');
     }
        return view('home');
    }

}
