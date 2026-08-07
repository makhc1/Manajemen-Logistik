<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'dashboard']);
Route::get('/master', [PageController::class, 'master']);
Route::get('/product', [PageController::class, 'master']);
Route::get('/inbound', [PageController::class, 'inbound']);
Route::get('/outbound', [PageController::class, 'outbound']);
Route::get('/warehouses', [PageController::class, 'warehouses']);
Route::get('/security', [PageController::class, 'security']);
Route::get('/settings', [PageController::class, 'settings']);
Route::get('/users', [PageController::class, 'users']);
