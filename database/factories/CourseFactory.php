<?php

use Faker\Generator as Faker;
use App\Course;
use App\User;



$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'author_id' => function(){
            return User::all()->random();
        },
        'students' => $faker->numberBetween(100,1000),
        'progress' => $faker->numberBetween(0,100),
        'price' => $faker->numberBetween(100,1000),
        //
    ];
});
