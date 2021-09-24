<?php

namespace App\Policies;

use App\Models\Album;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AlbumPolicy
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
//        return $user->hasPermissionTo('read-categories') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $ablum
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Album $ablum)
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
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $ablum
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Album $ablum)
    {
        //
        return $user->hasPermissionTo('edit-album') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $ablum
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Album $ablum)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $ablum
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Album $ablum)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $ablum
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Album $ablum)
    {
        //
    }
}
