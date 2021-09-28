<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

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

        Gate::define('admin', function ($user) {
            return $user->id === 1;
        });

        Gate::define('delete-edit', function ($user) {
            //    dd($user->permissions()->get());
            foreach ($user->permissions  as $permission) {
                $count = 0;
                if ($permission->name == 'delete-edit') {
                    $count = $count + 1;
                }
                if ($count >= 1) {
                    return true;
                }
            }
        });

        Gate::define('change-user-status', function ($user) {
            foreach ($user->permissions  as $permission) {
                $count = 0;
                if ($permission->name == 'change-user-status') {
                    $count = $count + 1;
                }
                if ($count >= 1) {
                    return true;
                }
                // return $permission->name == 'change-user-status';
            }
        });

        Gate::define('show-user-status', function ($user) {
            foreach ($user->permissions  as $permission) {
                $count = 0;
                if ($permission->name == 'show-user-status') {
                    $count = $count + 1;
                }
                if ($count >= 1) {
                    return true;
                }
            }
        });
    }
}
