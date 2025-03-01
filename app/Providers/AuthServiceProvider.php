<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('Admin', function($user) {
            return $user->user_role == User::ROLE_ADMIN;
        });

        /* define a manager user role */
        Gate::define('Manager', function($user) {
            return $user->user_role == User::ROLE_MANAGER;
        });

        /* define a user role */
        Gate::define('User', function($user) {
            return $user->user_role == User::ROLE_USER;
        });
    }
}
