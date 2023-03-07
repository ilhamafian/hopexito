<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\UploadController;
use App\Http\Livewire\Manage\ManageProduct;
use App\Http\Livewire\Manage\ManageOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminAnalytics;
use App\Http\Livewire\Admin\AdminOrder;
use App\Http\Livewire\Admin\AdminCarts;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminWallet;
use App\Http\Livewire\Admin\AdminProduct;
use App\Http\Livewire\Admin\AdminMarketing;

Route::redirect('/', 'explore');

// google auth
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// admin controller
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->group(function () {
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('admin/analytics', AdminAnalytics::class)->name('admin.analytics');
    Route::get('admin/orders', AdminOrder::class)->name('admin.orders');
    Route::get('admin/carts', AdminCarts::class)->name('admin.carts');
    Route::get('admin/wallets', AdminWallet::class)->name('admin.wallets');
    Route::get('admin/products', AdminProduct::class)->name('admin.products');
    Route::get('admin/marketing', AdminMarketing::class)->name('admin.marketing');
});

// protected route
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('dashboard', [Controller::class, 'redirectUser'])->name('dashboard');
    Route::get('product/template/{product}', [ProductsController::class, 'template'])->name('product.template');
    // upload controller 
    Route::post('upload', [UploadController::class, 'store'])->name('upload');
    Route::post('upload/cover_image', [UploadController::class, 'upload_cover'])->name('upload.cover');
    Route::post('upload/product_template', [UploadController::class, 'upload_template'])->name('upload.template');
    Route::post('upload/product_collection', [UploadController::class, 'upload_collection'])->name('upload.collection');
    // cart controller
    Route::resource('cart', CartController::class);
    // billplz controller
    Route::get('billplz', [PaymentController::class, 'createBill'])->name('billplz-create');
    Route::post('billplz', [PaymentController::class, 'storeBill'])->name('billplz-store');
    Route::get('billplz-callback', [PaymentController::class, 'callback'])->name('billplz-callback');
    Route::get('billplz-redirect', [PaymentController::class, 'redirect'])->name('billplz-redirect');
    // order controller
    Route::get('order/index', ManageOrder::class)->name('order.index');
    Route::get('product/manage', ManageProduct::class)->name('product.manage');
});

// route resource product
Route::resource('product', ProductsController::class);

// explore controller
Route::get('sellyourart', [ExploreController::class, 'sellyourart'])->name('sellyourart');
Route::get('explore', [ExploreController::class, 'explore'])->name('explore');
Route::get('shop', [ExploreController::class, 'search'])->name('search');
Route::get('shop/all', [ExploreController::class, 'shop'])->name('shop.all');
Route::get('collection', [ExploreController::class, 'collection'])->name('shop.collection');
Route::get('{shopname}', [ExploreController::class, 'people'])->name('people');
Route::post('sellyourart/{id}', [ExploreController::class, 'upgrade'])->name('upgrade');

