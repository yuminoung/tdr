<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Mail\Markdown;
use Maatwebsite\Excel\Facades\Excel;

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
                ->paginate(50)
                ->appends(request()->query());
        } elseif ($filter = request()->filter) {
            $products = Product::where('sku', 'LIKE', $filter . '%')
                ->paginate(50)
                ->appends(request()->query());
        } else {
            $products = Product::paginate(50);
        }
        return view('products.index', ['products' => $products]);
    }

    public function show(Product $product)
    {
        $listings = $product->kogan;
        if ($product->catch) {
            $listings->push($product->catch);
        }
        return view('products.show', ['product' => $product, 'listings' => $listings]);
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

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product)
    {
        $description = Markdown::parse(request()->description);
        $product->update(['description' => $description]);
        return redirect()->route('products.show', $product);
    }

    public function store()
    {
        $attributes = request()->validate([
            'sku' => 'required',
            'upc' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        Product::create([
            'sku' => $attributes['sku'],
            'upc' => $attributes['upc'],
            'name' => $attributes['name'],
            'quantity' => $attributes['quantity'],
            'price' => $attributes['price'] * 100,
            'description' => $attributes['description']
        ]);

        return redirect()->route('products.index');
    }

    public function import()
    {
        return view('products.import');
    }

    public function importStore()
    {
        Excel::import(new ProductImport, request()->file('file'));
    }
}
