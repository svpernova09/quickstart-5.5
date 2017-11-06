<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\MarketingEmail::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'active' => 0,
        'hash' => \Illuminate\Support\Facades\Password::getRepository()->createNewToken()
    ];
});