<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        if ($query = request()->search) {
            $products = Product::where('sku', 'LIKE', '%' . $query . '%')
                ->orderBy('sku')
                ->paginate(100);
        } else {
            $products = Product::orderBy('sku')->paginate(100);
        }
        return view('products.index', ['products' => $products]);
    }
}
