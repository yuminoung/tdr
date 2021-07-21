<?php

namespace App\Jobs\Shopify;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddTracking implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order_name;
    public $courier;
    public $tracking;

    public function __construct($row)
    {
        $this->order_name = $row[0];
        $this->courier = $row[1];
        $this->tracking = $row[2];
    }

    public function handle()
    {
        $order = Order::where('order_name', $this->order_name)->first();
        if ($order !== NULL) {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-Shopify-Access-Token' => config('services.shopify.secret')
            ])->post(
                config('services.shopify.url') . "/admin/api/2021-07/orders/{$order->order_id}/fulfillments.json",
                [
                    'fulfillment' => $this->payload()
                ]
            );
            if ($response->json()['fulfillment']['status'] === 'success') {
                $order->status = 'fulfilled';
                $order->save();
            }
        }
    }

    public function payload()
    {
        if ($this->courier[0] === 'A') {
            return [
                'location_id' => config('services.shopify.location_id'),
                'tracking_company' => "Australia Post",
                'tracking_number' => $this->tracking,
                'notify_customer' => true
            ];
        } else if ($this->courier[0] === 'F') {
            return [
                'location_id' => config('services.shopify.location_id'),
                'tracking_company' => "Aramex Australia",
                'tracking_number' => $this->tracking,
                'notify_customer' => true
            ];
        } else if ($this->courier[0] === 'D') {
            return [
                'location_id' => config('services.shopify.location_id'),
                'tracking_company' => "Direct Freight Express",
                'tracking_number' => $this->tracking,
                'tracking_urls' => [
                    "https://www.directfreight.com.au/ConsignmentStatus.aspx?consignment_no={$this->tracking}"
                ],
                'notify_customer' => true
            ];
        } else {
            return [
                'location_id' => config('services.shopify.location_id'),
                'tracking_company' => $this->courier,
                'tracking_number' => $this->tracking,
                //3382290000258
                'notify_customer' => true
            ];
        }
    }
}
