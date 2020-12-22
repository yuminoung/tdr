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
        <form action="{{ route('products.index') }}" method="GET" class="flex flex-row space-x-4 items-center">
            <select name="filter" class="appearance-none inline-block px-4 py-2 shadow-sm border-gray-300 border rounded-md bg-white focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10 focus:outline-none">
                <option value="">Categories</option>
                <option value="ta">TA</option>
                <option value="tb">TB</option>
                <option value="tc">TC</option>
                <option value="tw">TW - TOOLS</option>
            </select>
            <input type="text" name="search" class="inline-block px-4 py-2 shadow-sm border-gray-300 border rounded-md bg-white focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10 focus:outline-none" placeholder="Search SKU or UPC">
            <x-button>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </x-button>
            @csrf
        </form>
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
