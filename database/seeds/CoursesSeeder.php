<?php

namespace Database\Seeders;

use App\Course;
use App\Category;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $slugify = new Slugify();

        $course = new Course();
        $course->title = "Les bases de Laravel";
        $course->subtitle = "Apprendre à créer un site avec Laravel";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque semper pharetra ipsum, nec pulvinar arcu bibendum euismod. Nunc sit amet sodales metus. Vestibulum tempus sagittis dolor, sit amet molestie quam pulvinar ac. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam condimentum libero nulla, et ultricies massa posuere a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae ante nulla. Aliquam justo quam, interdum quis neque vel, finibus hendrerit magna. Curabitur neque diam, viverra ut egestas at, dapibus nec leo. Maecenas et nisi purus.";
        $course->price = 19.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = "Les bases de Wordpress";
        $course->subtitle = "Créer un site ecommerce avec Wordpress";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque semper pharetra ipsum, nec pulvinar arcu bibendum euismod. Nunc sit amet sodales metus. Vestibulum tempus sagittis dolor, sit amet molestie quam pulvinar ac. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam condimentum libero nulla, et ultricies massa posuere a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae ante nulla. Aliquam justo quam, interdum quis neque vel, finibus hendrerit magna. Curabitur neque diam, viverra ut egestas at, dapibus nec leo. Maecenas et nisi purus.";
        $course->price = 14.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = "Les bases de Symfony";
        $course->subtitle = "Apprendre à créer un site avec Symfony 4";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque semper pharetra ipsum, nec pulvinar arcu bibendum euismod. Nunc sit amet sodales metus. Vestibulum tempus sagittis dolor, sit amet molestie quam pulvinar ac. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam condimentum libero nulla, et ultricies massa posuere a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae ante nulla. Aliquam justo quam, interdum quis neque vel, finibus hendrerit magna. Curabitur neque diam, viverra ut egestas at, dapibus nec leo. Maecenas et nisi purus.";
        $course->price = 24.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();
    }
}
