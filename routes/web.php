<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/blog/{slug}', [PostController::class, 'show']);