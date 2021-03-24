<?php

namespace App\Jobs\Listings;

use App\Models\ShopifyListing;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class ShopifySync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $products;
    public $links;

    public function __construct($link)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Shopify-Access-Token' => config('services.shopify.secret')
        ])->get($link);
        Log::info($response->status());
        $this->products = $response->json()['products'];
        $this->links = explode(',', $response->headers()['Link'][0]);
    }

    public function handle()
    {
        foreach ($this->products as $product) {
            ShopifyListing::create([]);
        }
        foreach ($this->links as $link) {
            if (Str::contains($link, 'next')) {
                Log::info('Link: ' . $link);
                ShopifySync::dispatch(Str::substr(trim($link), 1, -13))
                    ->delay(now()->addSeconds(10));
            }
        }
    }
}
