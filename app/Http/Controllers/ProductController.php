<?php

namespace App\Http\Controllers;

use App\Exports\CatchExcelExport;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', ['products' => $products]);
    }

    public function show(Product $product)
    {
        return Excel::download(new CatchExcelExport($product), "{$product->product_sku}.xlsx");
    }

    public function create()
    {
        $catch_categories = Category::where('category_type', 'catch')->latest()->get();
        $kogan_categories = Category::where('category_type', 'kogan')->get();
        return view('products.create', [
            'catch_categories' => $catch_categories,
            'kogan_categories' => $kogan_categories
        ]);
    }

    public function edit()
    {
        return view('products.edit');
    }

    public function store()
    {
        $attributes = request()->validate([
            'product_catch_category' => 'required',
            'product_sku' => 'required|unique:products,product_sku',
            'product_upc' => 'required|unique:products,product_upc',
            'product_title' => 'required',
            'product_description' => 'required',
            'product_brand' => 'required',
            'product_keywords' => 'required',
            'product_images' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_discount_price' => 'required',
            'product_logistic_class' => 'required'
        ]);

        Product::create($attributes);

        return redirect()->route('products.index');
    }
}
