<?php

use Faker\Generator as Faker;

$factory->define(App\CourseChapters::class, function (Faker $faker) {
    return [
        'chapter_name' => $faker->catchPhrase,
        'description' => $faker->paragraph,
        'course_id' => function(){
            return App\Course::all()->random();
        }
    ];
});
