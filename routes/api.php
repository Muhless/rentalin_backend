<?php

use App\Http\Controllers\Api\CarController as ApiCarController;
use App\Http\Controllers\Api\RentalController as ApiRentalController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('login', [ApiUserController::class, 'login']);
Route::post('register', [ApiUserController::class, 'register']);
Route::apiResource('users', ApiUserController::class);

Route::apiResource('cars', ApiCarController::class);

Route::apiResource('rentals', ApiRentalController::class);
