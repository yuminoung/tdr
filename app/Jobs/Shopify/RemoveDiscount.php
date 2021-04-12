<?php

namespace App\Jobs\Shopify;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveDiscount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $shopifyID;

    public function __construct($shopifyID)
    {
        $this->shopifyID = $shopifyID;
    }

    public function handle()
    {
    }
}
