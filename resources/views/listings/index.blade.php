@extends('layouts.app')

@section('content')
<x-page-header title="LISTINGS">
    {{-- <form action="{{ route('listings.shopify.sync') }}" method="POST">
    <button class="bg-white rounded shadow px-4 py-2">
        Sync
    </button>
    @csrf
    </form> --}}
    <form action="{{ route('listings.index') }}" method="GET">
        <input type="text" name="search">
        <button>
            Search
        </button>
    </form>
</x-page-header>

<div class="flex flex-col bg-white shadow rounded divide-y divide-gray-200">
    @foreach($listings as $listing)
    <div class="flex flex-row hover:bg-yellow-200 items-start">
        <a class="w-64 block p-4 break-all" href="{{ route('listings.show', $listing) }}">
            {{$listing->sku}}
        </a>
        <div class="flex flex-col w-full space-y-2 p-4">
            <div class="flex flex-row justify-between">
                <div class="flex flex-row space-x-4 items-center">
                    <div>
                        <x-icons.catch />
                    </div>
                    <div>
                        123
                    </div>
                </div>
                <div class="flex flex-row items-center text-base space-x-4">
                    <a href="#">Edit</a>
                    <a href="#">View</a>
                </div>
            </div>
            <div class="flex flex-row justify-between">
                <div class="flex flex-row space-x-4 items-center">
                    <div>
                        <x-icons.kogan />
                    </div>
                    <div>
                        {{$listing->title}}
                    </div>
                </div>
                <div class="flex flex-row items-center text-base space-x-4">
                    <a href="#">Edit</a>
                    <a href="#">View</a>
                </div>
            </div>
            @if($listing->shopify)
            <div class="flex flex-row justify-between">
                <div class="flex flex-row space-x-4 items-center">
                    <div>
                        <x-icons.shopify />
                    </div>
                    <div>
                        {{$listing->shopify->title}}
                    </div>
                </div>
                <div class="flex flex-row items-center text-base space-x-4">
                    @livewire('shopify.discount', ['listing' => $listing->shopify], key($listing->shopify->id))
                    <a href="#">Edit</a>
                    <a href="#">View</a>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
{{ $listings->links() }}
@endsection
