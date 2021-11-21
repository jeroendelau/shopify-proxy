<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ShopifyStore;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopifyStorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user) : Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param ShopifyStore $shopifyStore
     * @return Response|bool
     */
    public function view(User $user, ShopifyStore $shopifyStore) : Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user) : Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ShopifyStore $shopifyStore
     * @return Response|bool
     */
    public function update(User $user, ShopifyStore $shopifyStore) : Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ShopifyStore $shopifyStore
     * @return Response|bool
     */
    public function delete(User $user, ShopifyStore $shopifyStore) : Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param ShopifyStore $shopifyStore
     * @return Response|bool
     */
    public function restore(User $user, ShopifyStore $shopifyStore) : Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param ShopifyStore $shopifyStore
     * @return Response|bool
     */
    public function forceDelete(User $user, ShopifyStore $shopifyStore) : Response|bool
    {
        return true;
    }
}
