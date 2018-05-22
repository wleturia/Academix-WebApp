<?php

use Faker\Generator as Faker;

$factory->define(App\CourseChapters::class, function (Faker $faker) {
    return [
        'chapter_name' => $faker->unique()->catchPhrase,
        'description' => $faker->paragraph,
        'course_id' => function(){
            return Course::all()->random();
        }
    ];
});
