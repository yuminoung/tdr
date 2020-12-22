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
            <div>
                {{$product->name}}
            </div>
        </div>
        <div>
            <x-content-header title="UPC" />
            <div>
                {{$product->upc}}
            </div>
        </div>
        <div>
            <x-content-header title="Description" />
            <div>
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
