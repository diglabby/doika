<?php

use App\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @see https://github.com/fzaninotto/Faker#formatters
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'slug' => $faker->unique()->slug,
        'password' => Hash::make('password'), // password
        'remember_token' => Str::random(10),
    ];
});
