<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bid;
use Faker\Generator as Faker;

$factory->define(Bid::class, function (Faker $faker) {
    return [
        'product_quantity' => $faker->numberBetween(1, 500),
        'bidding_price' => $faker->randomDigit,
        'message' => $faker->sentence,
        'user_id' => $faker->numberBetween(1, 100),
        'post_id' =>$faker->numberBetween(1, 1500),
    ];
});
