<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShippingAddressController;

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/register/step2', [RegisterController::class, 'step2'])->name('register.step2');
Route::post('/register/step2', [RegisterController::class, 'storeStep2'])->name('register.step2.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::middleware(['auth'])->group(function() {
    Route::get('/mypage', [ProfileController::class, 'show'])->name('mypage');
    Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/mypage/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/sell', [ProductController::class, 'create'])->name('product.create');
    Route::get('/item/{item_id}', [ProductController::class, 'show'])->name('product.show');

    Route::post('/product/{id}/like', [LikeController::class, 'toggleLike'])->middleware('auth')->name('product.like');

    Route::post('/product/{id}/comment', [CommentController::class, 'store'])->middleware('auth')->name('product.comment');

    Route::post('/Purchase', [PurchaseController::class, 'store'])->middleware('auth')->name('purchase.store');
    Route::get('/Purchase/{item_id}/', [PurchaseController::class, 'show'])->middleware('auth')->name('purchase.show');
    Route::get('/purchase/complete',function(){return view('product.complete');})->name('purchase.complete');

    Route::get('/', [ItemController::class, 'index'])->name('product.list');

    Route::get('/purchase/address/{item_id}', [ShippingAddressController::class, 'edit'])->middleware('auth')->name('shipping.address.edit');
    Route::put('/purchase/address/{item_id}', [ShippingAddressController::class, 'update'])->name('shipping.address.update');

    // Route::get('/profile/edit', [ProfileController::class, 'index'])->name('profile.edit');
    // Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Route::get('/mypage/profile', [ProfileController::class, 'show'])->name('profile.update');
    // Route::get('/?tab=mylist', [ItemController::class, 'index'])->name('product.list');
});
