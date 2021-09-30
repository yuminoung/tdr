<?php

namespace App\Http\Controllers;

use App\Exports\DownloadTrackingTemplate;
use App\Imports\TrackingImport;
use App\Jobs\Shopify\FetchShopifyOrder;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function index()
    {
        $orders = Order::orderBy('processed_at', 'desc')->paginate(50);
        return view('orders.index', ['orders' => $orders]);
    }

    public function upload()
    {
        return view('orders.upload');
    }

    public function downloadTemplate()
    {
        return Excel::download(new DownloadTrackingTemplate(), 'tracking-template.xlsx');
    }

    public function trackingUpload()
    {
        $attributes = request()->validate([
            'file' => 'required|mimes:xlsx'
        ]);
        Excel::import(new TrackingImport, $attributes['file']);
        return redirect()->route('orders.index');
    }

    public function fetch()
    {
        FetchShopifyOrder::dispatch(config('services.shopify.url') . 'admin/api/2021-07/orders.json?status=any&fulfillment_status=unfulfilled&financial_status=paid');
        return redirect()->route('orders.index');
    }
}
