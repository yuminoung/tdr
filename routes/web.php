<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Listings\KoganListingController;
use App\Http\Controllers\Listings\ListingController;
use App\Http\Controllers\Listings\ShopifyLisitingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Jobs\Category\SyncCategory;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.index');

# LISTING KOGAN
Route::get('/categories/kogan', function () {
    SyncCategory::dispatch('https://nimda-marketplace.aws.kgn.io/api/marketplace/v2/category/');
});
Route::get('/listings', [ListingController::class, 'index'])
    ->name('listings.index');
Route::get('/listings/kogan', [KoganListingController::class, 'index'])
    ->name('listings.kogan.index');


Route::get('/listings/{listing}', [ListingController::class, 'show'])
    ->name('listings.show');
Route::patch('listings/{listing}', [ListingController::class, 'update'])
    ->name('listings.update');
Route::get('/listings/{listing}/kogan', [KoganListingController::class, 'show'])
    ->name('listings.kogan.show');
Route::post('/listings/{listing}/kogan', [KoganListingController::class, 'store'])
    ->name('listings.kogan.store');

Route::get('/listings/shopify', [ShopifyLisitingController::class, 'index'])
    ->name('listings.shopify.index');
Route::post('/listings/shopify/sync', [ShopifyLisitingController::class, 'sync'])
    ->name('listings.shopify.sync');
// Route::get('/listings/shopify/{listing}', [ShopifyLisitingController::class, 'show'])
//     ->name('listings.shopify.show');

Route::get('products/import', [ProductController::class, 'import'])->name('products.import');
Route::post('products/import', [ProductController::class, 'importStore'])->name('products.import.store');

# PRODUCTS
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('products/create', function () {
    return 'under construction';
})->name('products.create');
Route::get('products/{product}', [ProductController::class, 'show'])
    ->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');
// Route::post('products', [ProductController::class, 'store'])
//     ->name('products.store');
// Route::patch('products/{product}', [ProductController::class, 'update'])
//     ->name('products.update');

# ORDERS
Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders.index');
Route::get('/orders/upload', [OrderController::class, 'upload'])
    ->name('orders.upload');
Route::get('/orders/download-template', [OrderController::class, 'downloadTemplate'])
    ->name('orders.download-template');
Route::post('/orders/tracking-upload', [OrderController::class, 'trackingUpload'])
    ->name('orders.tracking-upload');
Route::post('/orders', [OrderController::class, 'fetch'])
    ->name('orders.fetch');
