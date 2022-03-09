<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Videogame;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideogamePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->role === 'admin') {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Videogame $videogame)
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
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Videogame $videogame)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Videogame $videogame)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Videogame $videogame)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Videogame $videogame)
    {
        return $user->role === 'admin';
    }
}
