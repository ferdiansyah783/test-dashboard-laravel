<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::middleware('auth')->group(function () {
    Route::resource('product', ProductController::class);
    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/backstore', [ProductController::class, 'backstore'])->name('backstore');
    Route::resource('transaction', TransactionController::class);
    Route::get('/backstore/transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});