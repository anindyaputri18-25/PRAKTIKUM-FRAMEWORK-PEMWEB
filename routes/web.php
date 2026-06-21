<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanenController;

Route::get('/data-panen', [PanenController::class, 'index']);
Route::get('/data-panen/create', [PanenController::class, 'create']);  
Route::post('/data-panen/store', [PanenController::class, 'store']);