<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Post;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('posts.update', function (User $user, Post $post) {
            return $user->id == $post->user_id;
        });

        Gate::define('posts.update2', 'App\Policies\PostPolicy@update');
        Gate::define('posts.destory', 'App\Policies\PostPolicy@destory');
        Gate::define('posts.like', 'App\Policies\PostPolicy@like');


        Passport::routes();
        
    }
}
