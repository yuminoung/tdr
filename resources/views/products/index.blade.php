@extends('layouts.app')

@section('content')
    <x-page-header title="PRODUCTS">
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('products.index') }}">Products</a>
    </x-page-header>
    <div class="flex flex-row justify-between">
        <x-link :route="route('products.create')">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </x-link>
        <x-search />
    </div>

    <div class="flex flex-col shadow-sm z-0 bg-white rounded-md mt-4">
    @if($products->count() === 1)
        <a href="{{ route('products.show', $products[0]) }}"
            class="block border border-gray-300 px-4 py-2 -mb-px rounded-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10"
        >
            {{$products[0]->sku}}
        </a>
    @elseif($products->count() === 0)
        <div class="h-32 px-4 py-2 border border-gray-300 rounded-md flex items-center justify-center text-4xl text-gray-400 tracking-widest">
            NO RESULT
        </div>
    @else
        @foreach ($products as $product)
            @if($loop->first)
                <a href="{{ route('products.show', $product) }}"
                    class="block border border-gray-300 px-4 py-2 -mb-px rounded-t-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10"
                >
                    {{$product->sku}}
                </a>
            @elseif($loop->last)
                <a href="{{ route('products.show', $product) }}"
                class="block border border-gray-300 px-4 py-2 -mb-px rounded-b-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10"
                >
                    {{$product->sku}}
                </a>
            @else
                <a href="{{ route('products.show', $product) }}"
                    class="block border border-gray-300 px-4 py-2 -mb-px focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10"
                >
                    {{$product->sku}}
                </a>
            @endif
        @endforeach
    @endif
    </div>
    <div class="my-8">
        {{ $products->links() }}
    </div>
@endsection
