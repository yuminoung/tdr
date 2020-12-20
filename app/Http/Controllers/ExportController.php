<?php

namespace App\Http\Controllers;

use App\Exports\KoganExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function kogan()
    {
        return Excel::download(new KoganExport(), "kogan.xlsx");
    }
}
