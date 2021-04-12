@extends('layouts.app')

@section('content')
<x-page-header title="{{ $listing->sku }}">
    <a href="{{ route('listings.kogan.show', $listing) }}" class="p-2 bg-white shadow block">
        <x-icons.kogan />
    </a>
</x-page-header>
<div class="flex flex-col space-y-4">
    <!-- PRODUCTS -->
    <div class="flex flex-col divide-y divide-gray-200 bg-white shadow">
        <div class=" flex flex-row items-center justify-between p-4">
            <div class="text-2xl font-bold">
                Product
            </div>
        </div>
        <div class="p-4">
            @foreach($listing->products as $product)
            <div>
                {{$product->sku}} - {{$product->name}} - {{$product->area}}
            </div>
            @endforeach
        </div>
    </div>
    <!-- UPC -->
    <div class="flex flex-col divide-gray-200 divide-y bg-white shadow" x-data="{ open: false }">
        <div class=" flex flex-row items-center justify-between p-4">
            <div class="text-2xl font-bold">
                UPC
            </div>
            <div class="flex flex-row space-x-4">
                <button
                    class="p-2 bg-white shadow cursor-pointer border focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none"
                    @click="open = true" x-show="!open">
                    <x-icons.edit />
                </button>
                <button
                    class="p-2 bg-green-50 shadow cursor-pointer border focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none"
                    @click="$refs.upcForm.submit()" x-show="open">
                    <x-icons.save />
                </button>
                <button
                    class="p-2 bg-red-50 shadow cursor-pointer border focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none"
                    @click="open = false" x-show="open">
                    <x-icons.x />
                </button>
            </div>
        </div>
        <div class="p-4" x-show="!open">
            {{$listing->upc ?? 'No UPC'}}
        </div>
        <form action="{{ route('listings.update', $listing) }}" x-show="open" method="POST" class="flex flex-col"
            x-ref="upcForm">
            <input name="upc"
                class="w-full bg-white p-4 border-0 ring-1 focus:ring focus:ring-gray-600 transition ease-in-out duration-300 focus:outline-none"
                value="{{ $listing->upc }}" />
            @csrf
            @method('PATCH')
        </form>
    </div>
    <!-- DESCRIPTION -->
    <div class="flex flex-col divide-gray-200 divide-y bg-white shadow" x-data="{open: false}">
        <div class=" flex flex-row items-center justify-between p-4">
            <div class="text-2xl font-bold">
                Description
            </div>
            <div class="flex flex-row space-x-4">
                <button
                    class="p-2 bg-white shadow cursor-pointer border focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none"
                    @click="open = true" x-show="!open">
                    <x-icons.edit />
                </button>
                <button
                    class="p-2 bg-green-50 shadow cursor-pointer border focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none"
                    @click="$refs.descriptionForm.submit()" x-show="open">
                    <x-icons.save />
                </button>
                <button
                    class="p-2 bg-red-50 shadow cursor-pointer border focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none"
                    @click="open = false" x-show="open">
                    <x-icons.x />
                </button>
            </div>
        </div>
        <div x-show="!open" class="p-4">
            {!! Illuminate\Support\Str::markdown($listing->description) !!}
        </div>
        <form action="{{ route('listings.update', $listing) }}" x-show="open" method="POST" x-ref="descriptionForm">
            <textarea name="description"
                class="w-full h-64 bg-white p-4 border-0 ring-1 focus:ring focus:ring-gray-600 transition ease-in-out duration-300 focus:outline-none">
                {{ $listing->description }}
            </textarea>
            @csrf
            @method('PATCH')
        </form>
    </div>
    <!-- IMAGES -->
    <div class="flex flex-col bg-white divide-y divide-white shadow">
        <div class=" flex flex-row items-center justify-between p-4 shadow">
            <div class="text-2xl font-bold">
                Images
            </div>
        </div>
        <div class="w-full grid grid-cols-5 p-4">
            @foreach($listing->images as $image)
            <img class="w-full h-full" src="{{ $image->source }}" />
            @endforeach
        </div>
    </div>

</div>
@endsection
