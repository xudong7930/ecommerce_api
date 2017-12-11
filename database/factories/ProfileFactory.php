<?php

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => function () use($faker) {
            return factory(User::class)->create()->id;
        },
        'age' => $faker->numberBetween(19, 43),
        'sex' => $faker->randomElement(['0', '1', '2']),
        'weixin' => $faker->randomElement(['sbjsw', 'xudong7930', '2的1024次方','阿东', '二狗']),
        'qq' => '1046457211',
        'idcard' => str_random(18),
    ];
});
