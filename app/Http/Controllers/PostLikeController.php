<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Post;
use App\Like;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function like(Request $request, Topic $topic, Post $post)
    {
        $this->authorize('posts.like', $post);

        if (!$request->user()->hasLikedPost($post)) {
            return response(['message' => 'you have liked this post'], 409);
        }

        $like = new Like;
        $like->user()->associate($request->user());

        $post->likes()->save($like);

        return response(null, 204);
    }
}
