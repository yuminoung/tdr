<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.index');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])
    ->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');
Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])
    ->name('categories.store');
