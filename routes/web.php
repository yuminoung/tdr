<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Listings\KoganListingController;
use App\Http\Controllers\Listings\ListingController;
use App\Http\Controllers\Listings\ShopifyLisitingController;
use App\Http\Controllers\ProductController;
use App\Models\Listing;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.index');

# TEMP
Route::get('/temp/weight', function () {
    $listings = Listing::with('products')->where('weight', 0)->get();
    return view('temp.weight', compact('listings'));
});

# LISTING KOGAN
Route::get('/categories/kogan', function () {
    // $categories = Http::withHeaders([
    //     'SellerToken' => config('services.kogan.token'),
    //     'SellerID' => config('services.kogan.id')
    // ])->get('https://nimda-marketplace.aws.kgn.io/api/marketplace/v2/orders/');
    // dd($categories->json());
    // curl -L -H "Content-Type: application/json" -H "SellerToken:ac98ad11dfe015c2d193a87ee0df453f7cb85068" -H "SellerID:maxmart" -d '[("product_sku","testsku123"),("product_title","testtitle"),("product_description","<p>description</p>"),("category","ebay:9355"),("images",["https://i.ebayimg.com/images/g/c4cAAOSwyxhfhBFW/s-l1600.jpg"]),("stock",1),("offer_data",("AUD",("price",12.50),("handling_days",1)))]' -X POST https://nimda-marketplace.aws.kgn.io/api/marketplace/v2/products
    // $test = Http::post('https://reqbin.com/echo/post/json', ['okl']);
    // dd($test);
    $product = Http::withHeaders(
        [
            'SellerToken' => config('services.kogan.token'),
            'SellerID' => config('services.kogan.id')
        ]
    )->post('https://nimda-marketplace.aws.kgn.io/api/marketplace/v2/products', [
        'product_sku' => 'test3',
        'product_title' => 'hello',
        'product_description' => '<p>tesrtrfdsf</p>',
        'category' => 'ebay:23345',
        'images' => 'https://cdn.shopify.com/s/files/1/0104/5872/6500/files/off-road-parts-accessories.jpg?v=1614730092',
        'stock' => 5,
        'product_location' => 'AU',
        'offer_data' => [
            'AUD' => [
                'price' => 20.95,
                'handling_days' => 1
            ]
        ]
    ]);
    dd($product);
});

# LISTINGS
Route::get('/listings', [ListingController::class, 'index'])
    ->name('listings.index');
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
