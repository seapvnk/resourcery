<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('instructor/courses', [InstructorController::class, 'index'])
    ->name('instructor.index');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('course/create', [CourseController::class, 'create'])
    ->name('course.create');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('course/create', [CourseController::class, 'store'])
    ->name('course.create');

Route::middleware(['auth:sanctum', 'verified'])
    ->delete('course/delete', [CourseController::class, 'delete'])
    ->name('course.delete');    

Route::middleware(['auth:sanctum', 'verified'])
    ->get('course/{courseUrl}/create/sections', [CourseController::class, 'createSection'])
    ->name('section.update');


Route::get('course/{course}', [CourseController::class, 'show'])->name('course.show');

Route::get('courses/', [CourseController::class, 'index'])->name('course.index');
Route::get('courses/{category}', [CourseController::class, 'list'])->name('course.list');
