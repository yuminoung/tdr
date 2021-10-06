@extends('layouts.app')

@section('content')
<x-page-header title="PRODUCTS">
    <form action="{{ route('products.index') }}" method="GET" class="flex flex-row space-x-4">
        <input type="text" name="search" class="w-full p-4 shadow rounded focus-animation" placeholder="Search" value="{{ request()->search }}">
        <button
            class="bg-yellow-100 p-4 rounded shadow focus-animation">
            <x-icons.search />
        </button>
    </form>
</x-page-header>
<div class="grid grid-cols-1 bg-white shadow rounded divide-y divide-gray-100">
    <div class="flex flex-row items-center font-bold bg-gray-100">
        <div class="p-4 w-1/12">
            SKU
        </div>
        <div class="p-4 w-4/12">
            Name
        </div>
        <div class="p-4 w-2/12">
            Cost
        </div>
        <div class="p-4 w-1/12">
            Stock
        </div>
        <div class="p-4 w-1/12">
            Weight
        </div>
        <div class="p-4 w-1/12">
            Area
        </div>
        <div class="p-4 w-2/12">
            Supplier
        </div>
    </div>
    @foreach($products as $product)
    <div class="flex flex-row">
        <div class="p-4 w-1/12 text-blue-700">
            <a href="{{ route('listings.index', ['search' => $product->sku]) }}">
            {{$product->sku}}
            </a>
        </div>
        <div class="p-4 w-4/12">
            {{$product->name}}
        </div>
        <div class="p-4 w-2/12">
            {{$product->presentCost()}}
        </div>
        <div class="p-4 w-1/12">
            {{$product->stock}}
        </div>
        <div class="p-4 w-1/12">
            {{$product->presentWeight()}}
        </div>
        <div class="p-4 w-1/12">
            {{$product->area}}
        </div>
        <div class="p-4 w-2/12">
            {{$product->supplier}}
        </div>
    </div>

    @endforeach
</div>
{{ $products->links() }}
@endsection
