<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
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


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');




Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::get('cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');


Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');
Route::get('rentals/{id}', [RentalController::class, 'show'])->name('rentals.show');
Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
Route::get('/rentals/{id}/edit', [RentalController::class, 'edit'])->name('rentals.edit');
Route::put('/rentals/{id}', [RentalController::class, 'update'])->name('rentals.update');
Route::delete('/rentals/{id}', [RentalController::class, 'destroy'])->name('rentals.destroy');
Route::patch('/rentals/{rental}/updateStatus', [RentalController::class, 'updateStatus'])->name('rentals.updateStatus');



Route::get('/returns', [RentalController::class, 'indexed'])->name('returns.index');
Route::get('/returns/{id}', [RentalController::class, 'show'])->name('returns.show');
