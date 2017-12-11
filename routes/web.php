<?php

use App\Blog;
use App\Profile;
use App\User;
use App\Website;
use Illuminate\Support\Facades\Config;


Route::get('/', function () {
    // 1-1
    // return User::first()->profile;
    // return Profile::first()->user()->with('profile')->get();
    
    // 1-many
    // return User::first()->blogs()->with('user.profile')->get()->pluck('user.profile')->unique();
    // return Blog::first()->user()->with('profile')->get()->pluck('profile.id');
    
    // many-many
    // return Blog::first()->websites()->with('blogs.websites')->get();
    // return Website::first()->blogs()->with('websites')->get();


    $a = 1;
    $b = 2;
    $c = $a + $b;
    echo $c;
});

