<?php

namespace App\Jobs\Category;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SyncCategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $res;

    public function __construct(string $link)
    {
        $res = Http::withHeaders([
            'SellerToken' => config('services.kogan.token'),
            'SellerID' => config('services.kogan.id')
        ])->get($link);
        $this->res = $res->json();
    }

    public function handle()
    {
        $categories = $this->res['body']['results'];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['title'],
                'display' => $category['display'],
                'code' => 'kogan:' . $category['id'],
                'type' => 'kogan'
            ]);
        }
        if ($next = $this->res['body']['next']) {
            SyncCategory::dispatch($next);
        }
    }
}
