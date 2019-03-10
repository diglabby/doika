<?php

use App\Admin;
use Diglabby\Doika\Models\Donator;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Donator::class, function (Faker $faker) {
    return [
        'name' => null,
        'email' => $faker->unique()->email,
        'phone' => null,
    ];
});
