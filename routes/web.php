<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
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

Route::get('/profile', function () {
    return view('frontstore.profile');
})->middleware('auth')->name('profile');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');


Route::middleware('auth')->group(function () {
    Route::resource('product', ProductController::class);
    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/backstore', [ProductController::class, 'backstore'])->name('backstore');
    Route::resource('transaction', TransactionController::class);
    Route::get('/backstore/transaction', [TransactionController::class, 'index'])->name('transaction');
});