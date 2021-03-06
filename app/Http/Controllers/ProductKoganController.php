<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductKoganController extends Controller
{
    public function index(Product $product)
    {
        $kogan = $product->kogan()->first();
        return view('products.kogan.index', ['product' => $product, 'kogan' => $kogan]);
    }
}
