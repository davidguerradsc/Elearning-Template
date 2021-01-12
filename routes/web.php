<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\InstructorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('main.home');


Auth::routes();
Route::get('/logout', function() {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Courses
 */
Route::get('/courses',[CoursesController::class, 'courses'])->name('courses.index');
Route::get('/courses/{slug}',[CoursesController::class, 'course'])->name('courses.show');

/**
 * vue formateur
 */
Route::get('/instructor/overview', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('/instructor/new', [InstructorController::class, 'create'])->name('instructor.create');
Route::post('/instructor/store', [InstructorController::class, 'store'])->name('instructor.store');
Route::get('/instructor/courses/{id}/edit', [InstructorController::class, 'edit'])->name('instructor.edit');
Route::put('/instructor/courses/{id}/update', [InstructorController::class, 'update'])->name('instructor.update');
Route::get('/instructor/courses/{id}/destroy', [InstructorController::class, 'destroy'])->name('instructor.destroy');
Route::get('instructor/courses/{id}/publish', [InstructorController::class, 'publish'])->name('instructor.publish');

/**
 * Tarification
 */

Route::get('/instructor/courses/{id}/pricing', [PricingController::class, 'pricing'])->name('pricing.index');
Route::post('/instructor/courses/{id}/pricing/store', [PricingController::class, 'store'])->name('pricing.store');

/**
 * Plan de cours
 */
Route::get('/instructor/courses/{id}/curriculum', [CurriculumController::class, 'index'])->name('instructor.curriculum.index');
Route::get('/instructor/courses/{id}/curriculum/add', [CurriculumController::class, 'create'])->name('instructor.curriculum.create');
Route::post('/instructor/courses/{id}/curriculum/store', [CurriculumController::class, 'store'])->name('instructor.curriculum.store');
Route::get('/instructor/courses/{id}/curriculum/{section}/edit', [CurriculumController::class, 'edit'])->name('instructor.curriculum.edit');
Route::put('/instructor/courses/{id}/curriculum/{section}/update', [CurriculumController::class, 'update'])->name('instructor.curriculum.update');
Route::get('/instructor/courses/{id}/curriculum/{section}/destroy', [CurriculumController::class, 'destroy'])->name('instructor.curriculum.destroy');

/**
 * Cart
 */
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::get('/cart/{id}/store', [CartController::class, 'store'])->name('cart.store');
