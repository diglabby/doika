<?php

use Diglabby\Doika\Models\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @see https://github.com/fzaninotto/Faker#formatters
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'email_verified_at' => now(),
        'password' => Hash::make('password'),
        'remember_token' => Str::random(10),
    ];
});
