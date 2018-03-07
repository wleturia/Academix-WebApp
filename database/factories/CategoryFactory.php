<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category'=>$faker->unique()->word,
        'description'=>$faker->paragraph
    ];
});
