<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function shopify()
    {
        return $this->hasOne(ShopifyListing::class);
    }
}
