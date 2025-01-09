<?php

use App\Http\Controllers\Api\CarController as ApiCarController;
use App\Http\Controllers\Api\RentalController as ApiRentalController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('login', [ApiUserController::class, 'login']);
Route::post('register', [ApiUserController::class, 'register']);

Route::apiResource('users', ApiUserController::class);
Route::apiResource('cars', ApiCarController::class);
Route::apiResource('rentals', ApiRentalController::class);
Route::apiResource('transactions', TransactionController::class);
