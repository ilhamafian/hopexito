<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ExploreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/','login');
Route::get('explore', [ExploreController::class, 'explore'])->name('explore');
Route::get('/sellyourart', function () {
    return view('sellyourart');
})->name('sellyourart');

// Google Auth
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// Middleware
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Cart Section
Route::resource('cart',CartController::class);

Route::resource('product', ProductsController::class);
