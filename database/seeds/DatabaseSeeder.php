<?php

use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CoursesSeeder;

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
            CoursesSeeder::class,
            //CategoriesSeeder::class
        ]);
    }
}
