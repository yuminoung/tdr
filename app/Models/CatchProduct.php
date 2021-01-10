<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatchProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function presentPrice()
    {
        return '$' . $this->price / 100;
    }

    public function presentPlatform()
    {
        return 'Catch';
    }
}
