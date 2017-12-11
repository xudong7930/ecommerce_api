<?php

namespace App;

use App\User;
use App\Website;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = ['title', 'content', 'user_id', 'website_id'];
    protected $hidden = ['pivot'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function websites()
    {
        return $this->belongsToMany(Website::class, 'blog_website', 'blog_id', 'website_id');
    }
}
