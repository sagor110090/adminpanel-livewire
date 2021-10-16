<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('home');
Route::view('/admin/profile', 'admin.profile');
Route::post('/admin/profile', [AdminController::class,'profileUpdate']);
//Route Hooks - Do not delete//
	Route::view('admin/teachers', 'livewire.teachers.index')->middleware('auth');
	// Route::view('students', 'livewire.students.index')->middleware('auth');
	Route::view('admin/students', 'livewire.students.index')->middleware('auth');
	Route::view('admin/posts', 'livewire.posts.index')->middleware('auth');
