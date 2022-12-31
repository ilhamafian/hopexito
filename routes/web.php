<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UploadController;
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

Route::redirect('/', 'login');

Route::get('/sellyourart', function () {
    return view('sellyourart');
})->name('sellyourart');

// Google Auth
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
// Billplz Controller
Route::get('billplz', [PaymentController::class, 'createBill'])->name('billplz-create');
Route::post('billplz', [PaymentController::class, 'storeBill'])->name('billplz-store');
Route::get('billplz-callback', [PaymentController::class, 'callback'])->name('billplz-callback');
Route::get('billplz-redirect', [PaymentController::class, 'redirect'])->name('billplz-redirect');
Route::get('/order/index', [PaymentController::class, 'order'])->name('order.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('/dashboard', [Controller::class, 'redirectUser'])->name('dashboard');
    });

// Route Resource
Route::resource('cart', CartController::class);
Route::resource('product', ProductsController::class);
Route::post('/upload',[UploadController::class,'store'])->name('upload');
Route::post('/uploadCallback',[UploadController::class,'callback'])->name('upload-callback');

Route::get('explore', [ExploreController::class, 'explore'])->name('explore');
Route::get('search', [ExploreController::class, 'search'])->name('search');
Route::get('/people/{shopname}', [ExploreController::class, 'people'])->name('people');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
Route::get('admin/orders', [AdminController::class, 'orders'])->name('admin.orders');


