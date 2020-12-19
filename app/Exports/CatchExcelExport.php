<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CatchExcelExport implements FromArray, WithHeadings
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function array(): array
    {
        return [
            [
                $this->product->product_catch_category,
                $this->product->product_upc,
                $this->product->product_title,
                $this->product->product_upc,
                'UPC',
                $this->product->product_description,
                $this->product->product_brand,
                'New',
                $this->product->product_keywords,
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                // offer sku
                $this->product->product_sku,
                $this->product->product_upc,
                'UPC',
                $this->product->product_price,
                $this->product->product_quantity,
                '1',
                'New',
                $this->product->product_logistic_class,
                $this->product->product_discount_price,
                'false',
                '10',
                'false'
            ],
        ];
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
            // 'Quantity multiplier',
            // 'Colour',
            'keywords',
            // 'Gender',
            // 'Material',
            // 'Variant ID',
            // 'Variant Colour Value',
            // 'Variant Size Value',
            // 'Image Size Chart',
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
            // 'Variant Image 1',
            // 'Variant Image 2',
            // 'Variant Image 3',
            // 'Variant Image 4',
            // 'Variant Image 5',
            // 'Variant Image 6',
            // 'Variant Image 7',
            // 'Variant Image 8',
            // 'Variant Image 9',
            // 'Variant Image 10',
            // 'Weight',
            // 'Weight unit',
            // 'Width',
            // 'Width unit',
            // 'Length',
            // 'Length unit',
            // 'Height',
            // 'Height unit',
            // 'Model number',
            // 'Season',
            // 'Adult',
            // 'Commercial use',
            // 'Gift Type',
            // 'Frame Size',
            // 'Bike Type',
            // 'Rack Type',
            // 'Tyre Size',
            // 'Wheel Size',
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
