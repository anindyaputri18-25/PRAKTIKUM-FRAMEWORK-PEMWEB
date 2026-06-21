<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HarvestController;

// ==========================================
// PUBLIC ROUTE — Tidak perlu token
// ==========================================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// ==========================================
// PROTECTED ROUTE — Wajib pakai Bearer Token
// ==========================================
Route::middleware('auth:sanctum')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD Harvest (GET, POST, PUT, PATCH, DELETE otomatis terdaftar)
    Route::apiResource('harvests', HarvestController::class);
});