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

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function presentCost()
    {
        return '$' . $this->cost / 100;
    }

    public function presentWeight()
    {
        return $this->weight / 1000 . 'kg';
    }
}
