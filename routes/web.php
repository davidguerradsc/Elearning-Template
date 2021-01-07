<?php

use App\Http\Controllers\InstructorController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/home', [
    App\Http\Controllers\HomeController::class, 'index'
])->name('home');

Route::get('/instructor/overview', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('/instructor/new', [InstructorController::class, 'create'])->name('instructor.create');
Route::post('/instructor/store', [InstructorController::class, 'store'])->name('instructor.store');
Route::get('/instructor/{id}/edit', [InstructorController::class, 'edit'])->name('instructor.edit');
