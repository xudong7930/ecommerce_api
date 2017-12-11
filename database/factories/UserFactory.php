<?php

use App\Category;
use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'mobile' => function () use ($faker) {
            return $faker->randomElement([
                '15811448243',
                '13668487930',
                '15123349526',
            ]);
        },
    ];
});
