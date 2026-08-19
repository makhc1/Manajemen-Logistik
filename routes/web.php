<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [PageController::class, 'dashboard']);
    Route::get('/master', [PageController::class, 'master']);
    Route::get('/product', [PageController::class, 'master']);
    Route::get('/inbound', [PageController::class, 'inbound']);
    Route::get('/outbound', [PageController::class, 'outbound']);
    Route::get('/warehouses', [PageController::class, 'warehouses']);
    Route::get('/users', [PageController::class, 'users']);
    Route::get('/design-system', function () {
        return file_get_contents(public_path('design-system/index.html'));
    });
});
