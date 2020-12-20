<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class ShopifyImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $product = new Product();
        foreach ($rows as $row) {
            if (isset($row['variant_sku'])) {
                $sku = Str::contains($row['variant_sku'], '#') ? $row['variant_sku'] : $row['variant_sku'] . '#';
                $upc = Str::replaceFirst('\'', '', $row['variant_barcode']);
                $description = str_replace(array("\r", "\n", " "), '', $row['body_html']);
                $product = Product::create([
                    'sku' => $sku,
                    'upc' => $upc,
                    'name' => $row['title'] ?? '',
                    'description' => $description ?? '',
                    'price' => $row['variant_price'] * 100,
                    'quantity' => $row['variant_inventory_qty'],
                ]);
                // $rand = Str::random();
                // $path = "/images/{$product->id}/{$rand}.jpg";
                // Storage::put($path, file_get_contents($row['image_src']));
                if ($row['image_src']) {
                    $product->images()->create([
                        'path' => $row['image_src'],
                        'position' => $row['image_position']
                    ]);
                }
            } else {
                // $rand = Str::random();
                // $path = "/images/{$product->id}/{$rand}.jpg";
                // Storage::put($path, file_get_contents($row['image_src']));
                if ($row['image_src']) {
                    $product->images()->create([
                        'path' => $row['image_src'],
                        'position' => $row['image_position']
                    ]);
                }
            }
        }
    }
}
