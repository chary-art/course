<?php

namespace App\Policies;

use App\Models\Banner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BannerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Banner $banner): bool
    {
//        return true;
        return in_array($user->role_id, [ Role::IS_ADMIN, Role::IS_TEACHER, Role::IS_STUDENT]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
//        return $user->role_id == Role::IS_ADMIN;
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_TEACHER]);

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Banner $banner): bool
    {
//        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_TEACHER])  || (auth()->check() && $banner->user_id == auth()->id());
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_TEACHER]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Banner $banner): bool
    {
//        return $user->role_id == Role::IS_ADMIN;
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_TEACHER])  || (auth()->check() && $banner->user_id == auth()->id());
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Banner $banner): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Banner $banner): bool
    {
        //
    }
}
