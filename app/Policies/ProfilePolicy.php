<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function update(User $user)
    {
        $request = Request();
        return $request->user->id === $user->id; 
    }
}
