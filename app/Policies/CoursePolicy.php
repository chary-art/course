<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
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
    public function view(User $user, Course $course): bool
    {
//        return true;
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
    public function update(User $user, Course $course): bool
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_TEACHER])  || (auth()->check() && $course->user_id == auth()->id());

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_TEACHER])  || (auth()->check() && $course->user_id == auth()->id());
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        //
    }
}
