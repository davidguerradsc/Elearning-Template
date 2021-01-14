<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {

        $instructors = User::has('courses')->get();
        

       $category = Category::where('id', 2)->firstOrFail();
       
       return view('main.home', [
           'instructors' => $instructors
       ]);
    }


}
