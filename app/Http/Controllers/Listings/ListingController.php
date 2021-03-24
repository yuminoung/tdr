<?php

namespace App\Http\Controllers\Listings;

use App\Http\Controllers\Controller;
use App\Models\Listing;

class ListingController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        $listings = Listing::paginate(25);
        return view('listings.index', compact('listings'));
    }

    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    public function update(Listing $listing)
    {
        $attributes = request()->validate([
            'description' => 'nullable',
            'upc' => 'nullable'
        ]);
        $listing->update($attributes);
        return redirect()->route('listings.show', $listing);
    }
}
