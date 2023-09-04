<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\IndexController;

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
// Teacher
Route::resource('teacher', TeacherController::class);

Route::resource('course', CourseController::class);

Route::resource('classes', ClassesController::class);

Route::resource('student', StudentController::class);

Route::resource('mark', MarkController::class);
Route::resource('question', QuestionController::class);









/*  category   */


Route::get('admin', function () {
    return view('admin');
});
Route::get('index', function () {
    return view('index');
});
Route::get('home', function () {
    return view('home');
});
 //Route::get('home', 'HomeController@index);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
//Route::get('index', 'IndexController@index');