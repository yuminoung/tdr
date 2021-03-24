<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoganListing extends Model
{
    use HasFactory;

    public function listings()
    {
        return $this->belongsTo(KoganListing::class);
    }
}
