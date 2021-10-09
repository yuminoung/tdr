<?php

namespace App\Exports;

use App\Models\Issue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class IssueExport implements FromView, WithColumnWidths, WithDrawings, WithEvents
{
    use Exportable;

    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
        $this->issues = Issue::with('images')->whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->get();
    }

    public function view(): View
    {
        return view('exports.issues', [
            'issues' => $this->issues
        ]);
    }

    public function drawings()
    {
        $coords = [0 => 'F', 1 => 'G', 2 => 'H', 3 => 'I', 4 => 'J'];
        $drawings = [];
        foreach ($this->issues as $i => $issue) {
            foreach ($issue->images as $j => $image) {
                $drawing = new Drawing();
                $drawing->setPath(storage_path('app/' . $image->source));
                $drawing->setHeight(100);
                $drawing->setCoordinates($coords[$j] . ($i + 2));
                $drawings[] = $drawing;
            }
        }
        return $drawings;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setRowHeight(100);
            }
        ];
    }


    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 40,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 20
        ];
    }
}
