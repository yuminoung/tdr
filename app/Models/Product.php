<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function presentPrice()
    {
        return '$' . $this->price / 100;
    }
}
