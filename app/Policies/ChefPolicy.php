<?php

namespace App\Policies;

use App\Models\Chef;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ChefPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->hasPermissionTo('read-chefs') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Chef $chef)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->hasPermissionTo('create-chefs') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Chef $chef)
    {
        //
        return $user->hasPermissionTo('edit-chefs') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Chef $chef)
    {
        //
        return $user->hasPermissionTo('delete-chefs') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Chef $chef)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Chef $chef)
    {
        //
    }
}
