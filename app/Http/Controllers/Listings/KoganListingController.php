<?php

namespace App\Http\Controllers\Listings;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class KoganListingController extends Controller
{
    public function index()
    {
        // $products = Http::withHeaders([
        //     'SellerToken' => config('services.kogan.token'),
        //     'SellerID' => config('services.kogan.id')
        // ])->get('https://nimda-marketplace.aws.kgn.io/api/marketplace/v2/products/')->json();
        // dd($products);

        return view('listings.kogan.index');
    }


    public function show(Listing $listing)
    {
        return view('listings.kogan.show', compact('listing'));
    }

    public function store(Listing $listing)
    {
    }

    public function upload()
    {
    }
}
