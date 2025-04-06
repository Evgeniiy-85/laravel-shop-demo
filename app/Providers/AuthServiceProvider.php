<?php

namespace App\Providers;

use App\Models\User\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

;

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
            return $user->user_role == User::ROLE_ADMIN && $user->user_status == User::STATUS_ACTIVE;
        });

        /* define a manager user role */
        Gate::define('Manager', function($user) {
            return $user->user_role == User::ROLE_MANAGER && $user->user_status == User::STATUS_ACTIVE;
        });

        /* define a user role */
        Gate::define('User', function($user) {
            return $user->user_role == User::ROLE_USER && $user->user_status == User::STATUS_ACTIVE;
        });
    }
}
