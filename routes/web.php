<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/profile', 'User\ProfileController');
    
    Route::get('/paymentinfo/save','User\PaystackApiController@testPaymentInfo')->name('payment.save');
    Route::get('/paymentinfo/confirm','User\PaystackApiController@addPaymentInfo')->name('payment.confirm');
    
    Route::resource('/loan', 'LoanController');

    Route::group(['middleware' => 'isadmin'], function () {
        Route::get('/active/loan', 'LoanController@activeLoan')->name('loan.active');
        Route::get('/requests/loan', 'LoanController@loanRequests')->name('loan.request');
        Route::get('/activate_loan/{id}', 'LoanController@activate_loan')->name('loan.activate');
        Route::get('/deactivate_loan/{id}', 'LoanController@deactivate_loan')->name('loan.deactivate');
    });

});
