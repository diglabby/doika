<?php

use Diglabby\Doika\Models\Donator;
use Faker\Generator as Faker;

/**
 * @see https://github.com/fzaninotto/Faker#formatters
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

$factory->define(Donator::class, function (Faker $faker) {
    return [
        'name' => null,
        'email' => $faker->unique()->email,
        'phone' => null,
    ];
});
