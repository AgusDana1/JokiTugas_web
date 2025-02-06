<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('penjoki', function (User $user) {
            return $user->role === 'penjoki';
        });

        Gate::define('user', function (User $user) {
            return $user->role === 'user';
        });
    }
}
