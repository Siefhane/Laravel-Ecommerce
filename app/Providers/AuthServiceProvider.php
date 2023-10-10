<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Category;
use App\Models\products;
use App\Policies\ProductsPolicy;
use App\Policies\CategoriesPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        products::class => ProductsPolicy::class,
        Category::class =>CategoriesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function (User $user) {
            return $user->role === "admin";
        });
        Gate::define('is-user', function (User $user) {
            return $user->role === "user";
        });
        Gate::define('is-creator', function (User $user,products $products) {
            return $user->id === $products->creator_id;
        });
    }
}