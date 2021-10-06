<?php

namespace App\Exports;

use App\Models\Issue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class IssueExport implements FromView, WithColumnWidths
{
    use Exportable;

    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function view(): View
    {
        return view('exports.issues', [
            'issues' => Issue::with('images')->whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->get()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 40
        ];
    }
}
