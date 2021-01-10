<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CatchExport implements FromArray, WithHeadings
{

    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function array(): array
    {
        $images = $this->product->images->take(10)->pluck('path');
        while (count($images) < 10) {
            $images->push('');
        }
        $first = collect([
            $this->product->catch->category,
            $this->product->sku,
            $this->product->catch->title,
            $this->product->upc,
            'UPC',
            $this->product->description,
            'TDR',
            'New',
            $this->product->catch->keywords,
        ]);
        $last = collect([
            $this->product->sku,
            $this->product->upc,
            'UPC',
            $this->product->catch->price / 100,
            $this->product->quantity,
            '3',
            'New',
            $this->product->catch->logistic_class,
            $this->product->catch->discount_price / 100,
            'false',
            '10',
            'false'
        ]);

        return [$first->concat($images)->concat($last)->toArray()];
    }

    public function headings(): array
    {
        return [
            'category',
            'internal-sku',
            'title',
            'product-reference-value',
            'product-reference-type',
            'product-description',
            'brand',
            'condition',
            'keywords',
            'image-1',
            'image-2',
            'image-3',
            'image-4',
            'image-5',
            'image-6',
            'image-7',
            'image-8',
            'image-9',
            'image-10',
            'sku',
            'product-id',
            'product-id-type',
            'price',
            'quantity',
            'minimum-quantity-alert',
            'state',
            'logistic-class',
            'discount-price',
            'club-catch-eligible',
            'tax-au',
            'click-and-collect-eligible'
        ];
    }
}
