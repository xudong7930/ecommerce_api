<?php

use App\Blog;
use App\User;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph(2),
        'user_id' => function () use($faker) {
            $ids = User::all()->pluck('id');
            return $faker->randomElement($ids->toArray());
        }
    ];
});
