<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// routes/web.php
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);


// Grup route classrooms
Route::prefix('classrooms')->controller(ClassroomController::class)->group(function () {
    Route::get('/', 'index')->name('classrooms.index');
    Route::get('/create', 'create')->name('classrooms.create');
    Route::post('/', 'store')->name('classrooms.store');
    Route::get('/{id}', 'show')->name('classrooms.show');
    Route::get('/{id}/edit', 'edit')->name('classrooms.edit');
    Route::put('/{id}', 'update')->name('classrooms.update');
    Route::delete('/{id}', 'destroy')->name('classrooms.destroy');
});
Route::get('/l', function () {
    return view('layouts.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
