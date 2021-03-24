@extends('layouts.app')

@section('content')
<x-page-header title="PRODUCTS">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
    <span>/</span>
    <a href="{{ route('products.index') }}">Products</a>
</x-page-header>
<div class="flex flex-row justify-between">
    <x-link :route="route('products.create')">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </x-link>
    <x-search />
</div>

<div class="flex flex-col bg-white shadow divide-y divide-gray-200">
    <div class="p-4 flex bg-gray-700 text-white flex-row space-x-4">
        <div class="w-1/6">
            SKU
        </div>
        <div class="w-1/6">
            NAME
        </div>
        <div class="w-1/6 text-right">
            STOCK
        </div>
        <div class="w-1/6 text-right">
            AREA
        </div>
        <div class="w-1/6 text-right">
            WEIGHT
        </div>
        <div class="w-1/6"></div>
    </div>
    @foreach($products as $product)
    <div class="p-4 flex flex-row hover:bg-yellow-200 space-x-4 items-center">
        <div class="w-1/6">
            {{$product->sku}}
        </div>
        <div class="w-1/6">
            {{$product->name}}
        </div>
        <div class="w-1/6 text-right">
            @if($product->stock == 0)
            <span class="text-red-600">
                Out of stock
            </span>
            @else
            {{$product->stock}}
            @endif
        </div>
        <div class="w-1/6 text-right">
            {{$product->area}}
        </div>
        <div class="w-1/6 text-right">
            {{$product->weight}}
        </div>
        <div class="w-1/6 justify-end space-x-4 flex flex-row items-center">
            <a href="#" class="p-2 bg-gray-600 text-white text-sm">Edit</a>
            <a href="#" class="p-2 bg-gray-600 text-white text-sm">View</a>
        </div>
    </div>
    @endforeach
</div>

<div class="my-8">
    {{ $products->links() }}
</div>
@endsection
