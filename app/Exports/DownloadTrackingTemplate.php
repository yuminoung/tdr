<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadTrackingTemplate implements WithHeadings
{
    public function headings(): array
    {
        return ['order_id', 'courier', 'tracking'];
    }
}
