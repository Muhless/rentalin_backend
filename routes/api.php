<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/users', [DataController::class, 'index']);

Route::post('/auth/register', [UsersController::class, 'register']);
Route::post('/auth/login', [UsersController::class, 'login']);

Route::apiResource('/cars', CarsController::class);
Route::apiResource('/akun', UsersController::class);
