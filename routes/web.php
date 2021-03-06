<?php

use App\Http\Controllers\CatchProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductKoganController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.index');

Route::get('/listings/shopify', function () {
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'X-Shopify-Access-Token' => config('services.shopify.secret')
    ])->get('https://monsterpro.myshopify.com/admin/api/2021-01/products.json?limit=250');
    // dd($response->json());
    return view('listings.shopify', ['listings' => $response->json()['products'], 'header' => $response->headers()]);
})->name('orders.shopify');


Route::get('products/import', [ProductController::class, 'import'])->name('products.import');
Route::post('products/import', [ProductController::class, 'importStore'])->name('products.import.store');

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
Route::patch('products/{product}', [ProductController::class, 'update'])
    ->name('products.update');
Route::get('products/{product}/kogan', [ProductKoganController::class, 'index'])
    ->name('products.kogan');

# KOGAN
Route::get('products/generate/kogan', [ProductController::class, 'generateKogan'])
    ->name('products.generate.kogan');

# CATCH
Route::get('products/{product}/catch/create', [CatchProductController::class, 'create'])
    ->name('catch.create');
Route::post('products/{product}/catch', [CatchProductController::class, 'store'])
    ->name('catch.store');
Route::post('products/{product}/catch/download', [CatchProductController::class, 'download'])
    ->name('catch.download');

// # CATEGORIES
// Route::get('/categories', [CategoryController::class, 'index'])
//     ->name('categories.index');
// Route::get('categories/create', [CategoryController::class, 'create'])
//     ->name('categories.create');
// Route::post('categories', [CategoryController::class, 'store'])
//     ->name('categories.store');


# IMPORT
Route::get('imports/shopify', [ImportController::class, 'shopify'])
    ->name('imports.shopify.index');
Route::post('imports/shopify', [ImportController::class, 'store'])
    ->name('imports.shopify.store');


# EXPORT
Route::get('exports/kogan', [ExportController::class, 'kogan'])
    ->name('exports.kogan');


// require __DIR__ . '/auth.php';
