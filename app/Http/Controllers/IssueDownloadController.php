<?php

namespace App\Http\Controllers;

use App\Exports\IssueExport;
use Illuminate\Http\Request;

class IssueDownloadController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        return view('issues.download.index');
    }

    public function download()
    {
        $year = request()->year;
        $month = request()->month;
        return (new IssueExport($year, $month))->download("issues-{$year}-{$month}.xlsx");
    }
}
