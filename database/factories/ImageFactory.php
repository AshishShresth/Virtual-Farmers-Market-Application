<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'image_url' => $faker->imageUrl(),
        'post_id' => $faker->numberBetween(1, 1500),
    ];
});
