<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}/photos', [PhotoController::class, 'photosByCategory']);
