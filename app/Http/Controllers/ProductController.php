<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Mail\Markdown;

class ProductController extends Controller
{
    public function index()
    {
        if ($query = request()->search) {
            $products = Product::where('sku', 'LIKE', '%' . $query . '%')
                ->orWhere('upc', 'LIKE', '%' . $query . '%')
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

    public function generateKogan()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->kogan()->create([
                'sku' => $product->sku,
                'title' => $product->name,
                'stock' => $product->quantity,
                'price' => $product->price,
                'images' => $product->images->implode('path', '|'),
                'description' => $product->description
            ]);
        }
        return redirect()->route('products.index');
    }
}
