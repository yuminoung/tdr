<?php

namespace App\Http\Livewire\Shopify;

use Livewire\Component;
use App\Jobs\Shopify\AddDiscount;
use App\Jobs\Shopify\RemoveDiscount;
use Illuminate\Support\Facades\Http;

class Discount extends Component
{
    public $listing;

    public function mount($listing)
    {
        $this->listing = $listing;
    }

    public function addDiscount()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Shopify-Access-Token' => config('services.shopify.secret')
        ])->put("https://monsterpro.myshopify.com/admin/api/2021-04/variants/{$this->listing->variant_id}.json", [
            'variant' => [
                'id' => $this->listing->variant_id,
                'price' => $this->listing->price * 0.9 / 100,
                'compare_at_price' => $this->listing->price / 100,
            ]
        ]);
        if ($response->status() === 200) {
            $this->listing->discount_price = $this->listing->price * 0.9;
            $this->listing->save();
        }
    }

    public function removeDiscount()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Shopify-Access-Token' => config('services.shopify.secret')
        ])->put("https://monsterpro.myshopify.com/admin/api/2021-04/variants/{$this->listing->variant_id}.json", [
            'variant' => [
                'id' => $this->listing->variant_id,
                'price' => $this->listing->price / 100,
                'compare_at_price' => 0,
            ]
        ]);
        if ($response->status() === 200) {
            $this->listing->discount_price = null;
            $this->listing->save();
        }
    }

    public function render()
    {
        return view('livewire.shopify.discount');
    }
}
