<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssignStudentsController;

// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('register', [AuthController::class, 'create']);
// Route::post('register', [AuthController::class, 'register'])->name('register');

// Route::get('login', [AuthController::class, 'signin']);
// Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('assign-students',[AssignStudentsController::class, 'index'])->name('assign-students');
Route::post('assign-students',[AssignStudentsController::class, 'store']);
Route::get('assign-students/{id}',[AssignStudentsController::class, 'fetch']);
Route::post('assign-students/{id}',[AssignStudentsController::class, 'fetch']);

Route::get('courses', [CourseController::class, 'index'])->name('add-course');
Route::get('categories', [CategoryController::class, 'index'])->name('add-category');
Route::get('students', [StudentController::class, 'index'])->name('add-student');

Route::post('courses', [CourseController::class, 'store']);
Route::post('categories', [CategoryController::class, 'store']);
Route::post('students', [StudentController::class, 'store']);


Route::get('/',function(){
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
