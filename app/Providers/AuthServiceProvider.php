<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        // logika untuk izinkan manage users
        Gate::define('manage-users', function ($user){
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
        });

        // logika untuk izinkan manage categories
        Gate::define('manage-categories', function ($user){
            return count(array_intersect(["ADMIN", "STAFF"], json_decode($user->roles)));
        });

        // logika untuk izinkan manage books
        Gate::define('manage-books', function ($user){
            return count(array_intersect(["ADMIN", "STAFF"], json_decode($user->roles)));
        });

        // logika untuk izinkan manage orders
        Gate::define('manage-orders', function ($user){
            return count(array_intersect(["ADMIN", "STAFF"], json_decode($user->roles)));
        });
    }
}
