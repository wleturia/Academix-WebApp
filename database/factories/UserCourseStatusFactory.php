<?php

use Faker\Generator as Faker;

$factory->define(App\UserCourseStatus::class, function (Faker $faker) {
    return [
        'status'=>$faker->unique()->word,
        'description'=>$faker->paragraph
    ];
});
