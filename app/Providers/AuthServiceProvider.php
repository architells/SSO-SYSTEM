<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Map policies to models here if needed
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Example gate definitions
        Gate::define('is-admin', function (User $user) {
            return $user->hasRole('admin');
        });

        Gate::define('is-SSO', function (User $user) {
            return $user->hasRole('SSO');
        });

        Gate::define('is-consumer', function (User $user) {
            return $user->hasRole('consumer');
        });
    }
}
