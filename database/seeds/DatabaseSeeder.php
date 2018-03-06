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
        //factory(App\User::class,100)->create();
        
        factory(App\Course::class,2000)->create();

        factory(App\UserCourse::class,500)->create();
        
    }
}
