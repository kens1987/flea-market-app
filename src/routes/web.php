<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::middleware(['auth'])->group(function() {
    Route::get('/mypage', [ProfileController::class, 'index'])->name('profile.edit');
    Route::put('/mypage', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/sell', [ProductController::class, 'create'])->name('product.create');
    Route::get('/', [ItemController::class, 'index'])->name('product.list');
    // Route::get('/?tab=mylist', [ItemController::class, 'index'])->name('product.list');
});
