<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\IUser;
use App\Services\UserRepos;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // interfaces injection 
        $this->app->bind(IUser::class,UserRepos::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        //
    }
}
