<?php

use Faker\Generator as Faker;
use App\User;
use App\Course;


$factory->define(App\UserCourse::class, function (Faker $faker) {
    return [
        //
        'user_id' => function(){
            return User::all()->random();
        },
        'course_id' => function(){
            return Course::all()->random();
        },
        'star' => $faker->numberBetween(0,5),
        'review' => $faker->paragraph
        ];
});
