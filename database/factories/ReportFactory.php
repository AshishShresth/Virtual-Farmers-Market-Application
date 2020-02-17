<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'reason_for_report' => $faker->sentence,
        'description' => $faker->sentence,
        'user_id' => $faker->numberBetween(1, 100),
        'post_id' => $faker->numberBetween(1, 1500),
    ];
});
