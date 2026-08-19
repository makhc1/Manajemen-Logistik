<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\InboundController;
use App\Http\Controllers\Api\OutboundController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\DashboardController;

Route::get('/warehouses', [WarehouseController::class, 'index']);
Route::post('/warehouses', [WarehouseController::class, 'store']);
Route::put('/warehouses/{id}', [WarehouseController::class, 'update']);
Route::delete('/warehouses/{id}', [WarehouseController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/products/export', [ProductController::class, 'exportCsv']);

Route::post('/inbound', [InboundController::class, 'store']);
Route::put('/inbound/{id}', [InboundController::class, 'update']);
Route::delete('/inbound/{id}', [InboundController::class, 'destroy']);

Route::post('/outbound', [OutboundController::class, 'store']);

Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/dashboard/charts', [DashboardController::class, 'charts']);
