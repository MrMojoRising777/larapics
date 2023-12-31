<?php

namespace App\Providers;

use App\Enums\Role;
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
        // Image::class => PolicyForImage::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // OPTION 1
        // Gate::define('update-image', [PolicyForImage::class, 'update']);

        // Gate::define('delete-image', [PolicyForImage::class, 'delete']);

        Gate::before(function ($user, $ability) {
            if ($user->role === Role::Admin) {
                return true;
            }
        });
    }
}
