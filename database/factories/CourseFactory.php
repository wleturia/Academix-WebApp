<?php

use Faker\Generator as Faker;
use App\Course;
use App\User;



$factory->define(App\Course::class, function (Faker $faker) {
    return [
        #'name' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true) ,
        'name' => $faker->unique()->catchPhrase,
        'description' => $faker->paragraph,
        'author_id' => function(){
            return User::all()->random();
        },
        'students' => $faker->numberBetween(100,1000),
        'price' => $faker->numberBetween(100,1000),
        //
    ];
});
