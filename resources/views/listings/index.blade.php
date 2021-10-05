@extends('layouts.app')

@section('content')
<x-page-header title="LISTINGS">
    <form action="{{ route('listings.index') }}" method="GET" class="flex flex-row space-x-4">
        <input type="text" name="search" class="w-full p-4 shadow rounded focus-animation" placeholder="Search" value="{{ request()->search }}">
        <button
            class="bg-yellow-100 p-4 rounded shadow focus-animation">
            <x-icons.search />
        </button>
    </form>
</x-page-header>

<div class="grid grid-cols-1 bg-white shadow rounded divide-y divide-gray-100">
    <div class="flex flex-row items-center font-bold bg-gray-100">
        <div class="p-4 w-8/12">
            Product
        </div>
        <div class="p-4 w-1/12">
            Stock
        </div>
        <div class="p-4 w-1/12">
            Price
        </div>
        <div class="p-4 w-1/12">
            Shipping
        </div>
        <div class="p-4 w-1/12">
            Platform
        </div>
    </div>
    @foreach($listings as $listing)
    <div class="flex flex-row">
        <div class="flex flex-row p-4 w-8/12 items-center space-x-4">
            <img src="{{ $listing->images }}" class="w-20 h-20" loading="lazy" alt="">
            <div class="space-y-2 flex flex-col">
                <div>
                    {{$listing->sku}}
                </div>
                <div>
                    {{$listing->title}}
                </div>
            </div>
        </div>
        <div class="p-4 w-1/12">
            {{$listing->stock}}
        </div>
        <div class="p-4 w-1/12">
            ${{$listing->price}}
        </div>
        <div class="p-4 w-1/12">
            {{$listing->shipping}}
        </div>
        <div class="p-4 w-1/12">
            @if ($listing->stock != 0)
            @if($listing->gtin)
            <a class="px-4 py-2 bg-yellow-50 shadow rounded focus-animation" target="_blank" href="https://www.kogan.com/au/shop/?q={{ $listing->gtin }}">
                {{$listing->platform}}
            </a>
            @else
            <a class="px-4 py-2 bg-yellow-50 shadow rounded focus-animation" target="_blank" href="https://www.kogan.com/au/shop/?q={{ $listing->title }}">
                {{$listing->platform}}
            </a>
            @endif
            @endif
        </div>
    </div>

    @endforeach
</div>

{{ $listings->links() }}


@endsection
