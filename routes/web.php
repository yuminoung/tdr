<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductKoganController;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.index');


# PRODUCTS
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])
    ->name('products.create');
Route::get('products/{product}', [ProductController::class, 'show'])
    ->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');
Route::post('products', [ProductController::class, 'store'])
    ->name('products.store');
Route::get('products/{product}/kogan', [ProductKoganController::class, 'index'])
    ->name('products.kogan');

# KOGAN
Route::get('products/generate/kogan', [ProductController::class, 'generateKogan'])
    ->name('products.generate.kogan');


# CATEGORIES
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])
    ->name('categories.store');


# IMPORT
Route::get('imports/shopify', [ImportController::class, 'shopify'])
    ->name('imports.shopify.index');
Route::post('imports/shopify', [ImportController::class, 'store'])
    ->name('imports.shopify.store');


# EXPORT
Route::get('exports/kogan', [ExportController::class, 'kogan'])
    ->name('exports.kogan');
