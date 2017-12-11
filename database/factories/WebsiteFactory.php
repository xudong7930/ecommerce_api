<?php

use App\Website;
use Faker\Generator as Faker;

$factory->define(Website::class, function (Faker $faker) {
    return [
        'url' => $faker->unique()->url,
    ];
});
