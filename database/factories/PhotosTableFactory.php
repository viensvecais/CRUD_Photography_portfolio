<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    $album_ids = \DB::table('albums')->select('id')->get();
    $album_id = $faker->randomElement($album_ids)->id;

    return [
        'album_id' => $album_id,
        'photo' => $faker->image('public/storage/images/album'.$album_id,400,300, null, false),
        'title' => $faker->text(20),
        'size' => rand(1000, 2000),
        'description' => $faker->text(50)
    ];
});
