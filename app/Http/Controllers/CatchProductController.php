<?php

namespace App\Http\Controllers;

use App\Exports\CatchExport;
use App\Models\CatchProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CatchProductController extends Controller
{
    public function create(Product $product)
    {
        return view('products.catch.create', ['product' => $product]);
    }

    public function store(Request $request, Product $product)
    {
        $attributes = request()->validate([
            'category' => 'required',
            'title' => 'required',
            'keywords' => 'required',
            'price' => 'required',
            'discount_price' => 'nullable',
            'logistic_class' => 'required'
        ]);

        $product->catch()->create([
            'category' => $attributes['category'],
            'title' => $attributes['title'],
            'keywords' => $attributes['keywords'],
            'price' => $attributes['price'] * 100,
            'discount_price' => $attributes['discount_price'] * 100,
            'logistic_class' => $attributes['logistic_class']
        ]);

        return redirect()->route('products.show', $product);
    }

    public function download(Product $product)
    {

        return Excel::download(new CatchExport($product), "{$product->sku}.xlsx");
    }
    public function show(CatchProduct $catchProduct)
    {
        //
    }
}
