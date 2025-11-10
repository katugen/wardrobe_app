<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwaggerTestController;

Route::get('/api/hello', [SwaggerTestController::class, 'hello']);
Route::post('/api/users', [SwaggerTestController::class, 'store']);
