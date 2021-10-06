<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'sku' => $row['sku'],
            'name' => $row['name'],
            'cost' => $row['cost'] * 100,
            'stock' => is_numeric($row['quantity']) ? $row['quantity'] : 0,
            'weight' => $row['gross_weight'] ? (float)Str::replaceFirst(' Kg', '', $row['gross_weight']) * 1000 : 0,
            'area' => $row['stock_area'],
            'supplier' => $row['supplier']
        ]);
    }
}
