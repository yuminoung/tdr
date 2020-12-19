<?php

namespace App\Http\Controllers;

use App\Imports\ShopifyImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function shopify()
    {
        return view('imports.shopify.index');
    }

    public function store()
    {
        request()->validate([
            'file' => ['required', 'mimes:txt,csv']
        ]);

        Excel::import(new ShopifyImport, request()->file('file'));

        return redirect()->route('imports.shopify.index');
    }
}
