@extends('layouts.app')

@section('content')
    <x-page-header :title="$product->sku">
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('products.index') }}">Products</a>
        <span>/</span>
        <a href="#">{{ $product->sku }}</a>
    </x-page-header>
    <!-- buttons -->
    <div class="mb-4 flex flex-row justify-between">
        <div class="flex flex-row space-x-4">
            <x-link 
            :route="route('products.edit', $product)">
            <x-icons.edit />
            </x-link>
            <x-link 
                :route="route('products.edit', $product)">
                <x-icons.catch />
            </x-link>
            <x-link 
            :route="route('products.kogan', $product)">
                <x-icons.kogan />
            </x-link>
        </div>
        <x-search />
    </div>

    <div class="flex flex-col space-y-8 bg-white rounded-md p-4 shadow border border-gray-300">
        <div>
            <x-content-header title="Title" />
            <div class="bg-gray-100 rounded-md shadow-md px-4 py-2 border border-gray-300">
                {{$product->name}}
            </div>
        </div>
        <div>
            <x-content-header title="Listings" />
            <div class="bg-gray-100 rounded-md shadow-md px-4 py-2 border border-gray-300">
                    @foreach($product->kogan as $kogan)
                    <div class="grid grid-cols-5 gap-x-4 gap-y-2 px-4 py-2">
                        <div>
                            Market
                        </div>
                        <div class="col-span-4">
                            Kogan
                        </div>
                        <div>
                            Title
                        </div>
                        <div class="col-span-4 text-blue-700">
                            <a target="_blank" href="https://www.kogan.com/au/shop/?q={{str_replace(" ","+", $kogan->title)}}">
                                {{$kogan->title}}
                            </a>
                        </div>
                        <div>
                            Price
                        </div>
                        <div class="col-span-4">
                            {{$kogan->presentPrice()}}
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        <div>
            <x-content-header title="UPC" />
            <div class="bg-gray-100 rounded-md shadow-md px-4 py-2 border border-gray-300">
                {{$product->upc}}
            </div>
        </div>
        <div>
            <x-content-header title="Price" />
            <div class="bg-gray-100 rounded-md shadow-md px-4 py-2 border border-gray-300">
                {{$product->presentPrice()}}
            </div>
        </div>
        <div>
            <x-content-header title="Stock" />
            <div class="bg-gray-100 rounded-md shadow-md px-4 py-2 border border-gray-300">
                {{$product->quantity}}
            </div>
        </div>
        <div x-data="{ copied: false }">
            <x-content-header title="Description" />
            <button @click="copied = true" x-text="copied ? 'Copied!' : 'Copy HTML'">
            </button>
            <div class="space-y-2 bg-gray-100 shadow-md rounded-md border border-gray-300 px-4 py-2">
                {!!$product->description!!}
            </div>
        </div>
        <div>
            <x-content-header title="Images" />
            <div class="grid grid-cols-5 gap-4">
                @foreach($product->images as $image)
                <div class="shadow rounded-md border border-gray-300">
                    <img src="{{ $image->path }}" class="w-full h-full rounded-md">
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
