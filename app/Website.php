<?php

namespace App;

use App\Blog;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'website';

    protected $hidden = ['pivot'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_website', 'website_id', 'blog_id');
    }
}
