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
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/vendor/register', [VendorController::class, 'showRegister'])
    ->name('vendor.register');
Route::post('/vendor/register', [VendorController::class, 'store'])
    ->name('vendor.register.submit');



Route::get('/google/redirect', [AuthController::class, 'redirect'])
    ->name('google.redirect');

Route::get('/google/callback', [AuthController::class, 'callback'])
    ->name('google.callback');
