<?php

namespace App\Http\Livewire\Shopify;

use App\Jobs\Shopify\AddDiscount;
use App\Jobs\Shopify\RemoveDiscount;
use Livewire\Component;

class Discount extends Component
{
    public $discount;
    public $listing;

    public function mount($listing)
    {
        $this->listing = $listing;
        $this->discount = $listing->discount_price;
    }

    public function addDiscount()
    {
        AddDiscount::dispatch($this->listing->variant_id);
    }

    public function removeDiscount()
    {
        RemoveDiscount::dispatch($this->listing->variant_id);
    }

    public function render()
    {
        return view('livewire.shopify.discount');
    }
}
