<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        /* define a admin user role  */

        Gate::define('isAdmin', function ($user) {
            return $user->role == User::ADMIN;
        });

        /* define a user  */

        Gate::define('isUser', function ($user) {
            return $user->role == User::USER;
        });

        /* define a member */

        Gate::define('isMember', function ($user) {
            return $user->role == User::MEMBER;
        });

        //
    }
}
