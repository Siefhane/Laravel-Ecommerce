<?php

namespace App\Policies;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\products;

class ProductsPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, products $product): bool
    {
        return $user->id === $product->creator_id;
    }
    public function update(User $user, products $product): bool
    {
        return $user->id === $product->creator_id;
    }
    public function admin_destroy(User $user, products $product): bool
    {
        return $user->can('is-admin');
    }
    public function admin_update(User $user, products $product): bool
    {
        return $user->can('is-admin');
    }
}
