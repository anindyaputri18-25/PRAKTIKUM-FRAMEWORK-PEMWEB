<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanenController;

Route::get('/data-panen', [PanenController::class, 'index']);