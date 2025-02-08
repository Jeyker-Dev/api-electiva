<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products',[ProductController::class, 'show']);

Route::post('/products/create', [ProductController::class, 'store']);

Route::put('products/update/{product}', [ProductController::class, 'update']);

Route::delete('/products/delete/{product}', [ProductController::class, 'destroy']);
