<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/users', UserController::class);

    Route::middleware('auth:sanctum')->get('/search', [SearchController::class, 'search']);

});
