<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function kogan()
    {
        return $this->hasMany(KoganProduct::class);
    }

    public function presentPrice()
    {
        return $this->price / 100;
    }
}
