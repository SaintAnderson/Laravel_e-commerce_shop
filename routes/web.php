<?php

use App\Http\Controllers\{HomeController, ProductController, ProfileController};
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/account', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
});

require __DIR__.'/auth.php';
