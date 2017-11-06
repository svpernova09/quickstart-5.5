<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Task::class, function (Faker $faker) {
    $users = App\User::all();

    return [
        'name' => $faker->sentence(4),
        'user_id' => $users->random()->id,
    ];
});