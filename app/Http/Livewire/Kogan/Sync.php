<?php

namespace App\Http\Livewire\Kogan;

use App\Jobs\Kogan\SyncKogan;
use Livewire\Component;

class Sync extends Component
{

    public function sync()
    {
        SyncKogan::dispatch('https://nimda-marketplace.aws.kgn.io/api/marketplace/v2/products/');
    }

    public function render()
    {
        return view('livewire.kogan.sync');
    }
}
