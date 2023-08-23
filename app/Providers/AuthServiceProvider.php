<?php

namespace App\Providers;

use App\Helpers\RoleHelper;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // This check if user is head of department
        Gate::define('is_head_department', function () {

            $role = RoleHelper::getName();
            $user = auth()->user()->load('headDepartment');

            if ($role == ADMIN || isset($user->department)) {
                return true;
            }

            return false;
        });
    }
}
