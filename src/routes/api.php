<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ここから WardrobeApp 用のルート
Route::apiResource('clothes', ClothesController::class)
    ->only(['index', 'store', 'destroy']);
