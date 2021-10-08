<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Maatwebsite\Excel\Sheet;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Sheet::macro('setRowHeight', function (Sheet $sheet, $height) {
            $sheet->getDelegate()->getDefaultRowDimension()->setRowHeight($height);
        });
    }
}
