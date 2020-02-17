<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'quantity' => $faker->randomDigit,
        'price_per_kg' => $faker->randomDigit,
        'date_of_harvest' => $faker->dateTime,
        'current_address' => $faker->country,
        'district' => $faker->city,
        'product_description' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1, 100),
        'category_id' => $faker->numberBetween(1, 10),
    ];
});
