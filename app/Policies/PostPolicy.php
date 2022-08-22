<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Client\Request;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $post){
        return $post->user_id === $user->id;
    }
    public function update(Request $request, User $user)
    {
        dd($request->user->id);
        return $request->user->id === $user->id; 
    }
}
