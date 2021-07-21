<?php

namespace App\Imports;

use App\Models\KoganListing;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class KoganImport implements ToModel
{
    public function model(array $row)
    {
        return new KoganListing([
            'title',
            'brand',
            'category',
            'subtitle',
            'inbox',
            'rrp',
            'stock',
            'price',
            'shipping'
        ]);
    }
}
