<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::get('/vendor/register', [VendorController::class, 'showRegister'])
    ->name('vendor.register');
Route::post('/vendor/register', [VendorController::class, 'store'])
    ->name('vendor.register.submit');
