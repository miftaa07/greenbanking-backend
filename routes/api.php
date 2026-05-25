<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;

// Register user
Route::post('/register', [AuthController::class, 'register']);

// Login user
Route::post('/login', [AuthController::class, 'login']);

// Kirim pesan contact
Route::post('/contact', [ContactController::class, 'store']);


// Route yang butuh login (token Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Ambil data user login
    Route::get('/user', [AuthController::class, 'user']);

    // Logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});