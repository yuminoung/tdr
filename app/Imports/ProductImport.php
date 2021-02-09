<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class ProductImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([
            'sku' => $row[0],
            'name' => $row[1],
            'stock' => is_numeric($row[2]) ? $row[2] : 0,
            'weight' => $row[3] ? Str::replaceFirst(' Kg', '', $row[3]) : 0,
            'area' => $row[4]
        ]);
    }
}
