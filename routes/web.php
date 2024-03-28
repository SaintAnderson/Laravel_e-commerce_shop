<?php

use App\Http\Controllers\{CartController,
    CatalogController,
    CheckoutController,
    ContactsController,
    HomeController,
    ProductController,
    ProfileController,
    AboutController,
    ArticleController,
    ReviewController,
    CompareController,
    SellerController};
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/{slug}', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/compare', [CompareController::class, 'index'])->name('compare');
Route::post('/compare/add', [CompareController::class, 'add'])->name('compare.add');
Route::post('/compare/remove', [CompareController::class, 'remove'])->name('compare.remove');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
Route::get('/catalog/{slug}', [CatalogController::class, 'indexByCategory'])->name('catalog.category');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/sellers/{id}', [SellerController::class, 'show']);//->name('sellers.list'); // Страница продавца!!!

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/password-reset', [PasswordController::class, 'edit'])->name('password.edit');
    Route::get('/profile/viewed-products', [ProfileController::class, 'viewedProducts'])->name('profile.viewed-products');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::post('/checkout/delivery', [CheckoutController::class, 'delivery'])->name('checkout.delivery');
    Route::get('/profile/history-list-orders', [ProfileController::class, 'historyListOrders'])->name('profile.history-list-orders');
});

require __DIR__ . '/auth.php';
