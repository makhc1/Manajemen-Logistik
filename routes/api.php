<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\InboundController;
use App\Http\Controllers\Api\OutboundController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/export', [ProductController::class, 'exportCsv']);
Route::post('/inbound', [InboundController::class, 'store']);
Route::post('/outbound', [OutboundController::class, 'store']);
