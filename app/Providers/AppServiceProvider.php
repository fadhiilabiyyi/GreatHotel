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

        // Define Gate for Hotel Guest
        Gate::define('hotel_guest', function(User $user) {
            return $user->role === 'hotel_guest';
        });

        // Define Admin and Receptionist Gate
        Gate::define('admin', function(User $user) {
            return $user->role === 'administrator';
        });

        Gate::define('receptionist', function(User $user) {
            return $user->role === 'receptionist';
        });

        // Carbon Locale ID
        setLocale(LC_TIME, $this->app->getLocale());
    }
}
