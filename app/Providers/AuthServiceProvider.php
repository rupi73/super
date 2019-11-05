<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\SuperAdminPolicy',
        'App\Role' => 'App\Policies\SuperAdminPolicy',
        'App\Quantity' => 'App\Policies\SuperAdminPolicy',
        'App\Size' => 'App\Policies\SuperAdminPolicy',
        'App\Category' => 'App\Policies\SuperAdminPolicy',
        'App\Gsm' => 'App\Policies\SuperAdminPolicy',
        'App\Paper' => 'App\Policies\SuperAdminPolicy',
        'App\Treatment' => 'App\Policies\SuperAdminPolicy',
        'App\Product' => 'App\Policies\SuperAdminPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
