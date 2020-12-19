@extends('layouts.app')

@section('content')
    <x-page-header title="PRODUCTS" />
    <div class="flex flex-row justify-between">
        <a href="{{ route('products.create') }}" class="inline-block px-4 py-2 shadow-sm border-gray-300 border rounded-md bg-white focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10">
            Create
        </a>
        <form action="{{ route('products.index') }}" method="GET" class="flex flex-row items-center">
            <input type="text" name="search" class="inline-block px-4 py-2 shadow-sm border-gray-300 border rounded-md bg-white focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10 focus:outline-none" placeholder="Search">
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
            @endif
            <a href="{{ route('products.show', $product) }}"
                class="block border border-gray-300 px-4 py-2 -mb-px focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10"
            >
                {{$product->sku}}
            </a>
            @if($loop->last)
            <a href="{{ route('products.show', $product) }}"
                class="block border border-gray-300 px-4 py-2 -mb-px rounded-b-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10"
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
