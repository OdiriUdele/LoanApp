<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
Use App\User;
use App\Models\Loan\Loan;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //  User::observe(new \App\Observers\UserActionsObserver);
        //  Loan::observe(new \App\Observers\UserActionsObserver);
    }
}
