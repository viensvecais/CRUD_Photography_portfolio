<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'description' => $faker->text(50)
    ];
});




