<?php

namespace App\Jobs\Shopify;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FetchShopifyOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $orders;

    public function __construct(string $link)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Shopify-Access-Token' => config('services.shopify.secret')
        ])->get($link);
        $this->orders = $response->json()['orders'];
    }

    public function handle()
    {
        foreach ($this->orders as $order) {
            Log::info($order['name']);
            if (Order::where('order_id', $order['id'])->first() === null) {
                Order::create([
                    'order_id' => $order['id'],
                    'order_name' => $order['name'],
                    'note' => $order['note'],
                    'processed_at' => Carbon::parse($order['processed_at'])->format('Y-m-d H:m:s'),
                    'status' => $order['fulfillment_status'] ? 'fulfilled' : 'unfulfilled',
                    'customer_first_name' => $order['customer']['first_name'],
                    'customer_last_name' => $order['customer']['last_name'],
                    'platform' => 'shopify',
                    'contact' => $order['shipping_address']['phone'],
                    'email' => $order['email'],
                    'company' => $order['shipping_address']['company'],
                    'add1' => $order['shipping_address']['address1'],
                    'add2' => $order['shipping_address']['address2'],
                    'city' => $order['shipping_address']['city'],
                    'state' => $order['shipping_address']['province_code'],
                    'postcode' => $order['shipping_address']['zip'],
                    'total' => $order['total_price'] * 100,
                ]);
            }
        }
    }
}
