<?php

namespace App\Policies;

use App\Models\Blogs;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogsPolicy
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
    public function view(User $user, Blogs $blogs): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blogs $blog): bool
    {
        return $user->id === $blog->author_id;
    }

    public function delete(User $user, Blogs $blog): bool
    {
        return $user->id === $blog->author_id || $user->role === 'superadmin';
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Blogs $blogs): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Blogs $blogs): bool
    {
        //
    }
}
