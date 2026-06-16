<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Student

// Route::apiResource('students', StudentController::class); // Nota:Otra manera de definir las rutas del CRUD
Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/{id}', [StudentController::class, 'show']);

Route::post('/students', [StudentController::class, 'store']);

Route::put('students/{id}', [StudentController::class, 'update']);

Route::delete('students/{id}', [StudentController::class, 'destroy']);


