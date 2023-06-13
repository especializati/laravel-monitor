<?php

namespace App\Providers;

use App\Models\Endpoint;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
     */
    public function boot(): void
    {
        Gate::define('owner', function (User $user, Model $model) {
            return $user->id === $model->user_id;
        });

        Gate::define('ownerChecks', function (User $user, Endpoint $endpoint) {
            return $user->id === $endpoint->site->user_id;
        });
    }
}
