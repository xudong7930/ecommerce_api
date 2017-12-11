<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }

    public function destory(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }

    public function like(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
}
