<?php

namespace App\Imports;

use App\Models\Listing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KoganImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if ($row['product_sku'] != null) {
            return new Listing([
                'sku' => $row['product_sku'],
                'title' => $row['product_title'],
                'description' => $row['product_description'],
                'category' => $row['category'],
                'platform' => 'Kogan',
                'price' => $row['price'],
                'stock' => $row['stock'],
                'shipping' => $row['shipping'],
                'images' => $row['images'],
                'subtitle' => $row['product_subtitle'],
                'product_inbox' => $row['product_inbox'],
                'gtin' => $row['product_gtin'],
                'weight' => $row['weight'],
            ]);
        }
        return;
    }
}
