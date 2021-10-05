<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        if ($query = request()->search) {
            $listings = Listing::where('sku', 'LIKE', '%' . $query . '%')
                ->orderBy('sku')
                ->paginate(100);
        } else {
            $listings = Listing::orderBy('sku')->paginate(100);
        }

        return view('listings.index', compact('listings'));
    }
}
