<?php

namespace App;

use App\Post;
use App\Traints\Orderable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use Orderable;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'topic_id', 'id');
    }
    
}
