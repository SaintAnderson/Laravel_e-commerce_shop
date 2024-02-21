<?php

use App\Http\Controllers\{HomeController, ProductController, ProfileController};
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/password-reset', [PasswordController::class, 'edit'])->name('password.edit');
    Route::get('/profile/viewed-products', [ProfileController::class, 'viewedProducts'])->name('profile.viewed-products');
});

require __DIR__.'/auth.php';
