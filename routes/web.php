<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LearnController;
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

Route::middleware(['auth:sanctum', 'verified'])
    ->get('dashboard', [LearnController::class, 'dashboard'])
    ->name('dashboard');

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
    ->get('course/{courseUrl}/create/sections', [SectionController::class, 'create'])
    ->name('section.update');
    
Route::middleware(['auth:sanctum', 'verified'])
    ->post('course/{courseUrl}/create/sections', [SectionController::class, 'create'])
    ->name('section.update');
    
Route::middleware(['auth:sanctum', 'verified'])
    ->delete('course/{courseUrl}/delete/section', [SectionController::class, 'delete'])
    ->name('section.delete');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('section/edit/{courseUrl}/{section}', [SectionController::class, 'edit'])
    ->name('section.edit');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('section/edit/section', [SectionController::class, 'save'])
    ->name('section.save');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('section/order/{method}/{section}', [SectionController::class, 'orderUpdate'])
    ->name('section.order');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('content/create/{section}/', [ContentController::class, 'create'])
    ->name('content.create');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('content/create', [ContentController::class, 'save'])
    ->name('content.save');

Route::middleware(['auth:sanctum', 'verified'])
    ->delete('content/delete', [ContentController::class, 'delete'])
    ->name('content.delete');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('content/edit/{courseUrl}/{section}/{content}', [ContentController::class, 'edit'])
    ->name('content.edit');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('content/save', [ContentController::class, 'update'])
    ->name('content.update');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('content/order/{method}/{content}', [ContentController::class, 'orderUpdate'])
    ->name('content.order');

Route::get('course/{course}', [CourseController::class, 'show'])->name('course.show');
Route::get('course/{course}/learn/{lecture?}', [LearnController::class, 'index'])->name('course.learn');

Route::get('courses/', [CourseController::class, 'index'])->name('course.index');
Route::get('courses/{category}', [CourseController::class, 'list'])->name('course.list');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('course/favorite/{course}', [LearnController::class, 'favorite'])
    ->name('course.favorite');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('course/removeFavorite/{course}', [LearnController::class, 'removeFavorite'])
    ->name('course.removeFavorite');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('content/todo', [ContentController::class, 'todo'])
    ->name('content.todo');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('course/rate', [CourseController::class, 'rate'])
    ->name('course.rate');