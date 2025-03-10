<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/{slug}', [BlogController::class, 'show']);