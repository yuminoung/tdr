<?php

namespace App\Exports;

use App\Models\KoganProduct;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KoganExport implements FromQuery, WithHeadings, WithMapping
{

    public function query()
    {
        return KoganProduct::query()
            ->where('stock', '!=', 0)
            ->where('title', '!=', '')
            ->where('sku', '!=', '');
    }

    public function map($product): array
    {
        return [
            $product->sku,
            $product->title,
            $product->brand,
            $product->category,
            $product->stock,
            $product->price / 100,
            $product->shipping / 100,
            $product->images,
            $product->description,
            $product->subtitle,
            $product->inbox,
            $product->gtin,
            $product->rrp,
            $product->handling_days,
            '',
            '',
            '',
            '',
            ''
        ];
    }

    public function headings(): array
    {
        return [
            'PRODUCT_SKU',
            'PRODUCT_TITLE',
            'BRAND',
            'CATEGORY',
            'STOCK',
            'PRICE',
            'SHIPPING',
            'IMAGES',
            'PRODUCT_DESCRIPTION',
            'product_subtitle',
            'product_inbox',
            'product_gtin',
            'rrp',
            'handling_days',
            'variant_group_id',
            'variant_group_title',
            'variant_facet_type',
            'variant_facet_group',
            'variant_facet_value'
        ];
    }
}
