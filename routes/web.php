<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Student routes
Route::get('/', [StudentController::class, 'index']);
Route::get('/student/create', [StudentController::class, 'create']);
Route::post('/student/store', [StudentController::class, 'store']);
Route::get('/student/show/{id}', [StudentController::class, 'show']);
