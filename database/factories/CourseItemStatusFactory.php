<?php

use Faker\Generator as Faker;

$factory->define(App\CourseItemStatus::class, function (Faker $faker) {
    return [
        'course_item_status' => $faker->unique()->word,
        'description' => $faker->paragraph
    ];
});
