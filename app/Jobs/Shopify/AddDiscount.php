<?php

namespace App\Jobs\Shopify;

use Illuminate\Bus\Queueable;
use App\Models\ShopifyListing;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class AddDiscount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $variantID;

    public function __construct($variantID)
    {
        $this->variantID = $variantID;
    }

    public function handle()
    {
        $listing = ShopifyListing::where('variant_id', $this->variantID)->first();
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Shopify-Access-Token' => config('services.shopify.secret')
        ])->put("https://monsterpro.myshopify.com/admin/api/2021-04/variants/{$this->variantID}.json", [
            'variant' => [
                'id' => $this->variantID,
                'price' => $listing->price * 0.9 / 100,
                'compare_at_price' => $listing->price / 100,
            ]
        ]);
        // {
        //     "variant": {
        //       "id": 808950810,
        //       "option1": "Not Pink",
        //       "price": "99.00"
        //     }
        //   }
        Log::info($response);
    }
}
