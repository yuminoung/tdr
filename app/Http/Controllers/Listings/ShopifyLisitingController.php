<?php

namespace App\Http\Controllers\Listings;

use App\Jobs\Listings\ShopifySync;
use App\Http\Controllers\Controller;
use App\Jobs\Listings\ListingSync;
use App\Models\Listing;
use Illuminate\Support\Facades\Http;

class ShopifyLisitingController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        $listings = Listing::paginate(50);
        return view('listings.shopify.index', compact('listings'));
    }

    public function sync()
    {
        ListingSync::dispatch('https://monsterpro.myshopify.com/admin/api/2021-01/products.json?limit=250');
        return redirect()->route('listings.index');
    }

    public function show(Listing $listing)
    {
        dd($listing);
        return view('listings.shopify.show', compact('listing'));
    }
}
