<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // Paginator using Bootstrap
        Paginator::useBootstrap();

        // Define Admin and Receptionist Gate
        Gate::define('admin', function(User $user) {
            return $user->role === 'administrator';
        });

        Gate::define('receptionist', function(User $user) {
            return $user->role === 'receptionist';
        });
    }
}
