<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoganProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function presentPrice()
    {
        return $this->price / 100;
    }

    public function presentPlatform()
    {
        return 'Kogan';
    }
}
