<?php

namespace App\Jobs\Listings;

use App\Models\Listing;
use App\Models\Product;
use App\Models\ShopifyListing;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ListingSync implements ShouldQueue
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
        $this->products = $response->json()['products'];
        $this->links = explode(',', $response->headers()['Link'][0]);
    }

    public function handle()
    {
        foreach ($this->products as $product) {
            if (count($product['variants']) === 1) {
                $variant = $product['variants'][0];
                $sku = $this->formatSKU($variant['sku']);
                $listing = Listing::create([
                    'sku' => $sku,
                    'upc' => $variant['barcode'],
                    'description' => $product['body_html'],
                    'weight' => $variant['weight'] * 1000
                ]);

                $listing->shopify()->create([
                    'shopify_id' => $product['id'],
                    'variant_id' => $variant['id'],
                    'title' => $product['title'],
                    'price' => $variant['compare_at_price'] ? $variant['compare_at_price'] * 100 : $variant['price'] * 100,
                    'discount_price' => $variant['compare_at_price'] ? $variant['price'] * 100 : null
                ]);

                foreach ($product['images'] as $image) {
                    $listing->images()->create([
                        'source' => $image['src']
                    ]);
                }

                $this->attachSKU(substr($sku, 0, -1), $listing);
            } else {
                $variants = $product['variants'];
                foreach ($variants as $variant) {
                    $sku = $this->formatSKU($variant['sku']);
                    $listing = Listing::create([
                        'sku' => $sku,
                        'variant' => $this->joinVariantSKU($product),
                        'upc' => $variant['barcode'],
                        'description' => $product['body_html'],
                        'weight' => $variant['weight'] * 1000
                    ]);
                    $listing->shopify()->create([
                        'shopify_id' => $variant['id'],
                        'variant_id' => $variant['id'],
                        'title' => $variant['title'],
                        'price' => $variant['compare_at_price'] ? $variant['compare_at_price'] * 100 : $variant['price'] * 100,
                        'discount_price' => $variant['compare_at_price'] ? $variant['price'] * 100 : null
                    ]);
                    foreach ($product['images'] as $image) {
                        $listing->images()->create([
                            'source' => $image['src']
                        ]);
                    }
                    $this->attachSKU(substr($sku, 0, -1), $listing);
                }
            }
        }

        foreach ($this->links as $link) {
            if (Str::contains($link, 'next')) {
                ListingSync::dispatch(Str::substr(trim($link), 1, -13))
                    ->delay(now()->addSeconds(10));
            }
        }
    }

    private function formatSKU($sku)
    {
        return Str::upper(Str::contains($sku, '#') ? $sku : $sku . '#');
    }

    private function joinVariantSKU($product)
    {
        $sku = count($product['variants']) === 1
            ? $product['variants'][0]['sku']
            : collect($product['variants'])
            ->map(function ($item) {
                return Str::contains($item['sku'], '#') ? Str::replaceFirst('#', '', $item['sku']) : $item['sku'];
            })
            ->join('|');
        return Str::upper(Str::contains($sku, '#') ? $sku : $sku . '#');
    }

    private function attachSKU($sku, $listing)
    {
        if (Str::contains($sku, '~') || Str::contains($sku, '*')) {
            $skus = explode('~', implode('~', explode('*', $sku)));
            foreach ($skus as $s) {
                $product = Product::where('sku', $s)->get();
                $listing->products()->attach($product);
            }
        } else {
            $product = Product::where('sku', $sku)->get();
            $listing->products()->attach($product);
        }
    }
}
