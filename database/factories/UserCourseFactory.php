<?php

use Faker\Generator as Faker;
use App\User;
use App\Course;
use App\UserCourseStatus;


$factory->define(App\UserCourse::class, function (Faker $faker) {
    return [
        //
        'user_id' => function(){
            return User::all()->random();
        },
        'course_id' => function(){
            return Course::all()->random();
        },
        //'progress' => $faker->numberBetween(0,100),        
        //'star' => $faker->numberBetween(0,5),
        //'review' => $faker->paragraph
        'status_id' => function(){
            return UserCourseStatus::all()->random();
        },
        'progress' => '',        
        'star' => '',
        'review' => ''
        ];
});
