<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $catch_categories = Category::where('category_type', 'catch')->get();
        $kogan_categories = Category::where('category_type', 'kogan')->get();
        return view('categories.index', [
            'catch_categories' => $catch_categories,
            'kogan_categories' => $kogan_categories
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'category_type' => ['required'],
            'category_name' => ['required']
        ]);
        Category::create($attributes);
        return redirect()->route('categories.index');
    }
}
