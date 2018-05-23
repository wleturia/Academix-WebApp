<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        #Categories
        #factory(App\Category::class,25)->create(); #NEED TO COLLECT CATEGORIES
        #Discounts

        #User
        #factory(App\User::class,1000)->create();
        #Courses
        #factory(\App\Course::class,2008)->create();
        #CourseChapters
        #factory(App\CourseChapters::class,20000)->create();
        #CourseItemStatus
        #factory(App\CourseItemStatus::class,3)->create(); # NOT STARTED, COMPLETED, CURRENT
        #CourseItemType
        #factory(App\CourseItemType::class,4)->create(); # MEDIA, LECTURE, FILE (PDF), EXAM 
        #CourseItems
        #factory(App\CourseItem::class,10000)->create();
        #UserCourseStatus
        #factory(App\UserCourseStatus::class,4)->create(); #CHANGUE TO FAVED, CURRENT, CART (POSSIBLY DONE)        
        #UserCourse
        #factory(App\UserCourse::class,4000)->create();
        
    }
}
