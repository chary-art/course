<?php

namespace App\Policies;

use App\Models\CourseAttribute;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CourseAttributePolicy
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
    public function view(User $user, CourseAttribute $courseAttribute): bool
    {
        return in_array($user->role_id, [ Role::IS_ADMIN, Role::IS_TEACHER, Role::IS_STUDENT]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_TEACHER]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CourseAttribute $courseAttribute): bool
    {
        return in_array($user->role_id, [ Role::IS_ADMIN, Role::IS_TEACHER]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CourseAttribute $courseAttribute): bool
    {
        return in_array($user->role_id, [ Role::IS_ADMIN, Role::IS_TEACHER]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CourseAttribute $courseAttribute): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CourseAttribute $courseAttribute): bool
    {
        //
    }
}
