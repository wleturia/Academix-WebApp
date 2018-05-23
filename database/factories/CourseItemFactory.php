<?php

use Faker\Generator as Faker;

$factory->define(App\CourseItem::class, function (Faker $faker) {
    return [
        'item_name' => $faker->catchPhrase,
        'item_status' => function(){
            return \App\CourseItemStatus::all()->random();
        },
        'item_type' => function(){
            return \App\CourseItemType::all()->random();
        },
        'course_chapter' => function(){
            return \App\CourseChapters::all()->random();
        },
    ];
});
