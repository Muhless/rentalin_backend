<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::post('/login', [UserController::class, 'login']);
Route::get('/home', function () {
    return view('pages.home');
})->middleware('auth');

Route::get('/rents', [TransactionController::class, 'index'])->name('rents');

Route::get('/cars', [CarController::class, 'index'])->name('cars');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::get('/cars/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/update/{id}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/delete/{id}', [CarController::class, 'delete'])->name('cars.delete');


