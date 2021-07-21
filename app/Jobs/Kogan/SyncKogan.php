<?php

namespace App\Jobs\Kogan;

use App\Models\KoganListing;
use App\Models\Listing;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SyncKogan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $next;
    private $products;

    public function __construct($link)
    {
        $response = Http::withHeaders([
            'SellerToken' => config('services.kogan.token'),
            'SellerID' => config('services.kogan.id')
        ])->get($link)->json();
        $this->next = $response['body']['next'];
        $this->products = $response['body']['results'];
    }

    public function handle()
    {
        foreach ($this->products as $product) {
            $listing = Listing::where('sku', $product['product_sku'])->get();
            $listing->kogan()->create([
                'title' => $product['product_title'],
                'brand' => $product['brand'],
                'category' => 1,
                'stock' => $product['stock'],
                'subtitle' => $product['product_subtitle'],
                'inbox' => $product['product_inbox'] ?? '',
                'price' => $product['offer_data']['AUD']['price'] * 100,
                'shipping' => $product['offer_data']['AUD']['shipping'],
                'rrp' => $product['offer_data']['AUD']['rrp'] * 100 ?? '',
            ]);
        }
        if ($this->next) {
            SyncKogan::dispatch($this->next);
        }
    }
}
