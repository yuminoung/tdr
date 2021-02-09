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
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SKU
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NAME
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                STOCK
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                AREA
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                LISTINGS
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('products.show', $product) }}">{{ $product->sku }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $product->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $product->stock }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $product->area }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex flex-row items-center space-x-2">
                                    <x-icons.catch />
                                    <x-icons.kogan />
                                    <x-icons.shopify />
                                    <x-icons.ebay />
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <div class="flex flex-col shadow-sm z-0 bg-white rounded-md mt-4">
    @if($products->count() === 1)
        <a href="{{ route('products.show', $products[0]) }}"
class="block border border-gray-300 px-4 py-2 -mb-px rounded-md focus:ring ring-gray-300 focus:border-blue-300
transition ease-in-out duration-300 focus:z-10"
>
{{$products[0]->sku}}
</a>
@elseif($products->count() === 0)
<div
    class="h-32 px-4 py-2 border border-gray-300 rounded-md flex items-center justify-center text-4xl text-gray-400 tracking-widest">
    NO RESULT
</div>
@else
@foreach ($products as $product)
@if($loop->first)
<a href="{{ route('products.show', $product) }}"
    class="block border border-gray-300 px-4 py-2 -mb-px rounded-t-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10">
    {{$product->sku}}
</a>
@elseif($loop->last)
<a href="{{ route('products.show', $product) }}"
    class="block border border-gray-300 px-4 py-2 -mb-px rounded-b-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10">
    {{$product->sku}}
</a>
@else
<a href="{{ route('products.show', $product) }}"
    class="flex flex-row items-center justify-between border border-gray-300 px-4 py-2 -mb-px focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10">
    <div>
        {{$product->sku}}
    </div>
    @if($product->quantity < 1) <div class="text-sm text-red-700">
        Out of stock
        </div>
        @endif
</a>
@endif
@endforeach
@endif
</div> --}}
<div class="my-8">
    {{ $products->links() }}
</div>
@endsection
