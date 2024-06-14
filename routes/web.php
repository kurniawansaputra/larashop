<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\LaptopController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('goToLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'create'])->name('goToRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.backend.dashboard.index');
    })->name('dashboard');

    Route::resource('/brands', BrandController::class);
    Route::resource('/laptops', LaptopController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');
