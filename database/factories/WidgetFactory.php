<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Widget::class, function (Faker $faker) {

    return [
        'name' => $faker->word . ' Widget',
        'description' => $faker->paragraph(3),
        'price' => $faker->randomFloat(2, 20, 999999),
    ];
});