<?php

use Diglabby\Doika\Models\Campaign;

$factory->define(Campaign::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words(),
        'description' => $faker->sentence,
        'title_picture_url' => $faker->imageUrl(),
        'started_at' => today(),
        'finished_at' => today()->addMonths(1),
        'active_status' => 0,
        'amount' => 0,
        'currency_code' => 'BYN',
    ];
});
