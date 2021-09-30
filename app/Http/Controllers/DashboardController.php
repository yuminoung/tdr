<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'X-Shopify-Access-Token' => config('services.shopify.secret')
        // ])->get('https://monsterpro.myshopify.com//admin/api/2021-01/products/count.json');
        // dd($response->json());
        // $listing = Listing::where('sku', null)->get()->pluck('listing_id');
        // dd($listing);
        return view('dashboard.index');
    }
}
