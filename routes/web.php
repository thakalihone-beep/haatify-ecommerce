<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;



// Home
Route::get('/', [PageController::class, 'index'])
    ->name('home');


// Products
Route::get('/product/{product:slug}', [PageController::class, 'show'])
    ->name('product.show');


// Categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');


// Authentication
Route::middleware('unauth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// Vendor
Route::get('/vendor/register', [VendorController::class, 'showRegister'])
    ->name('vendor.register');

Route::post('/vendor/register', [VendorController::class, 'store'])
    ->name('vendor.register.submit');


// Google Login
Route::get('/google/redirect', [AuthController::class, 'redirect'])
    ->name('google.redirect');

Route::get('/google/callback', [AuthController::class, 'callback'])
    ->name('google.callback');

//cart and checkout
Route::middleware('auth')->group(function () {
    // Cart
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/cart/item/{cartItem}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/item/{cartItem}', [CartController::class, 'remove'])
        ->name('cart.remove');


    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.place');

    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])
        ->name('checkout.success');

});

Route::middleware('auth')->group(function () {

    // Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'index'])
        ->name('wishlist.index');

    // Add product to wishlist
    Route::post('/wishlist/{product}', [WishlistController::class, 'store'])
        ->name('wishlist.store');

    // Remove product from wishlist
    Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])
        ->name('wishlist.destroy');

});

Route::middleware('auth')->group(function () {

    Route::post(
        '/product/{product}/review',
        [ReviewController::class, 'store']
    )->name('reviews.store');

});
