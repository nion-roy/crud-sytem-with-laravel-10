<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'admin'])->name('admin.login');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware'	=> 'admin'], function () {
	Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
	Route::get('destroy', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('destroy');
	Route::resource('course', App\Http\Controllers\Admin\CourseController::class);
	Route::get('course/{id}/delete', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('delete');
	Route::resource('enroll', App\Http\Controllers\Admin\CourseEnrollController::class);
	Route::get('enroll/{id}/delete', [App\Http\Controllers\Admin\CourseEnrollController::class, 'destroy'])->name('enroll.delete');
	Route::resource('user', App\Http\Controllers\Admin\UserController::class);
	Route::get('user/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.delete');
});


Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware'	=> 'user'], function () {
	Route::get('dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('dashboard');
	Route::get('destroy', [App\Http\Controllers\User\UserController::class, 'destroy'])->name('destroy');
	Route::resource('course', App\Http\Controllers\User\CourseEnrollController::class);
});
