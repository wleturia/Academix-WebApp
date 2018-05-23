<?php

use Faker\Generator as Faker;

$factory->define(App\CourseItemType::class, function (Faker $faker) {
    return [
        'course_item_type' => $faker->unique()->word,
        'description' => $faker->paragraph
    ];
});
