<?php

namespace App\Policies;

use App\Models\User;
use App\Models\slider;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SliderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param slider $slider
     * @return Response|bool
     */
    public function view(User $user, slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param slider $slider
     * @return Response|bool
     */
    public function update(User $user, slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param slider $slider
     * @return Response|bool
     */
    public function delete(User $user, slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param slider $slider
     * @return Response|bool
     */
    public function restore(User $user, slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param slider $slider
     * @return Response|bool
     */
    public function forceDelete(User $user, slider $slider)
    {
        //
    }
}
