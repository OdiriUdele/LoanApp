<?php

namespace App\Providers;

use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface; 
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface; 
use App\Repositories\Eloquent\Interfaces\ActivityRepositoryInterface; 
use App\Repositories\Eloquent\Interfaces\LoanRepositoryInterface;
use App\Repositories\Eloquent\UserRepository; 
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\ActivityRepository;
use App\Repositories\Eloquent\LoanRepository;
use Illuminate\Support\ServiceProvider;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(ActivityRepositoryInterface::class, ActivityRepository::class);
       $this->app->bind(LoanRepositoryInterface::class, LoanRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
