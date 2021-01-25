<?php

//use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Seeder;
//use Database\Seeders\CoursesSeeder;
//use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesSeeder::class,
            UsersSeeder::class,
            CoursesSeeder::class,
        ]);
    }
}
