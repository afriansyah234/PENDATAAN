<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/classrooms', [App\Http\Controllers\ClassroomController::class, 'index']);
Route::post('/classrooms', [App\Http\Controllers\ClassroomController::class, 'store']);
Route::get('/classrooms/{id}', [App\Http\Controllers\ClassroomController::class, 'show']);
Route::put('/classrooms/{id}', [App\Http\Controllers\ClassroomController::class, 'update']);
Route::delete('/classrooms/{id}', [App\Http\Controllers\ClassroomController::class, 'destroy']);
