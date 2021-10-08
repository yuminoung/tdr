<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\IssueDownloadController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Imports\KoganImport;
use App\Imports\ProductImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

# DASHBOARD
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.index');

# LISTINGS
Route::get('/listings', [ListingController::class, 'index'])
    ->name('listings.index');
Route::get('/listings/upload', function () {
    return view('listings.upload');
});
Route::post('/listings/upload', function () {
    Excel::import(new KoganImport, request()->file('file'));
    return redirect()->route('listings.index');
})->name('listings.upload');


# PRODUCTS
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('/products/upload', function () {
    return view('products.upload');
});
Route::post('/products/upload', function () {
    Excel::import(new ProductImport, request()->file('file'));
    return redirect()->route('products.index');
})->name('products.upload');

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

// ISSUES
Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
Route::patch('/issues/{issue}', [IssueController::class, 'update'])->name('issues.update');
Route::post('/issues/{issue}/comments', [CommentController::class, 'store'])->name('issues.comments.store');
Route::get('/issues/download', [IssueDownloadController::class, 'index'])->name('issues.download.index');
Route::post('/issues/download', [IssueDownloadController::class, 'download'])->name('issues.download');

Route::post('/issues/filepond/process', [IssueController::class, 'filepondProcess'])
    ->name('issues.filepond-process');
