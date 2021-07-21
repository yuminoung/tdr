<?php

namespace App\Imports;

use App\Jobs\Shopify\AddTracking;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TrackingImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key !== 0) {
                AddTracking::dispatch($row);
            }
        }
    }
}
