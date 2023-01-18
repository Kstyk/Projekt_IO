<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Trip;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class TripPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->role_id == 1;
    }

    public function update(User $user, Trip $trip)
    {
        return $user->role_id == 1;
    }

    public function delete(User $user, Trip $trip)
    {
        return $user->role_id == 1;
    }

    public function restore(User $user, Trip $trip)
    {
        return true;
    }

    public function forceDelete(User $user, Trip $trip)
    {
        return true;
    }
}
