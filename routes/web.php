<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Student routes
Route::get('/', [StudentController::class, 'index']);
Route::get('/student/create', [StudentController::class, 'create']);
Route::post('/student/store', [StudentController::class, 'store']);
Route::get('/student/show/{id}', [StudentController::class, 'show']);
Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::put('/student/update/{id}', [StudentController::class, 'update']);
Route::delete('/student/destroy/{id}', [StudentController::class, 'destroy']);

// Teacher routes
Route::get('/teacher', [TeacherController::class, 'index']);
