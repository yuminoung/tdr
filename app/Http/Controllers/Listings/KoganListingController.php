<?php

namespace App\Http\Controllers\Listings;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class KoganListingController extends Controller
{
    public function show(Listing $listing)
    {
        return view('listings.kogan.show', compact('listing'));
    }

    public function store(Listing $listing)
    {
    }
}
