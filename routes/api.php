<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::post('/classrooms', [ClassroomController::class, 'store']);
Route::get('/classrooms/{id}', [ClassroomController::class, 'show']);
Route::put('/classrooms/{id}', [ClassroomController::class, 'update']);
Route::delete('/classrooms/{id}', [ClassroomController::class, 'destroy']);
Route::controller(StudentController::class)->group(function () {
Route::get('/students', 'index');
Route::post('/students', 'store');
Route::get('/students/{id}', 'show');
Route::put('/students/{id}', 'update');
Route::delete('/students/{id}', 'destroy');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
