<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function changeRole(User $user, User $model)
    {
        return $user->role === 'admin';
    }

    public function deleteUser(User $user, User $model)
    {
        return $user->role === 'admin';
    }
}
