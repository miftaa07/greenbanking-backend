<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes — GreenBanking
|--------------------------------------------------------------------------
|
| Auth routes: register, login (public)
| Protected routes: user, logout (auth:sanctum)
|
*/

// =====================
// Public Routes
// =====================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Contact form (public)
Route::post('/contact', [ContactController::class, 'store']);

// =====================
// Protected Routes (membutuhkan token Sanctum)
// =====================
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user',    [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Profile
    Route::put('/profile/update', [ProfileController::class, 'update']);
    Route::get('/profile/messages', [ProfileController::class, 'getMessages']);

    // Admin Messages
    Route::get('/admin/messages', [\App\Http\Controllers\Api\AdminController::class, 'getMessages']);
    Route::put('/admin/messages/{id}/read', [\App\Http\Controllers\Api\AdminController::class, 'markAsRead']);
});