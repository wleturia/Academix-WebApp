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
        factory(App\User::class,1000)->create();
        factory(App\Category::class,10)->create();
        factory(App\Course::class,4000)->create();
        factory(App\UserCourse::class,5000)->create();
        
    }
}
