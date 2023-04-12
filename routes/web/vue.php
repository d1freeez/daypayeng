<?php

/*
|--------------------------------------------------------------------------
| Vue JS Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Pages\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/employer', [HomeController::class, 'index']);
Route::get('/question', [HomeController::class, 'index']);
Route::get('/legal-data', [HomeController::class, 'index']);
Route::get('/support', [HomeController::class, 'index']);
