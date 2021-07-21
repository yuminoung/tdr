@extends('layouts.app')

@section('content')
<x-page-header title="ORDERS">
    <div class="flex flex-row space-x-4">
        <form action="{{ route('orders.fetch') }}" method="POST">
            <x-button>Fetch</x-button>
            @csrf
        </form>
        <x-link route="{{ route('orders.upload') }}">
            Upload
        </x-link>
        <form action="#" method="GET" class="flex flex-row items-center space-x-4">
            <input type="text" name="search"
                class="px-4 py-2 ring-1 ring-inset ring-red-100 hover:bg-yellow-200 focus:bg-yellow-200 focus:ring-yellow-500 transition ease-in-out duration-300 focus:outline-none bg-yellow-100"
                autocomplete="off" placeholder="SEARCH">
            <button
                class="bg-yellow-100 ring-1 ring-inset ring-red-100 hover:bg-yellow-200 p-2 focus:ring-yellow-500 transition ease-in duration-300 focus:outline-none">
                <x-icons.search />
            </button>
        </form>
    </div>
</x-page-header>
<div class="flex flex-col bg-white shadow rounded divide-y divide-gray-200">
    @foreach($orders as $order)
    <div class="flex flex-row hover:bg-yellow-200 items-center">
        <div class="w-1/8 p-4 flex flex-row items-center space-x-2">
            <div>
                @if($order->status === 'fulfilled')
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                @else
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                @endif
            </div>
            <div>
                {{ $order->order_name }}
            </div>
        </div>
        <div class="w-1/8 p-4">
            {{ $order->processed_at->format('Y-m-d') }}
        </div>
        <div class="w-2/8 p-4">
            {{ $order->customer_first_name }} {{ $order->customer_last_name }}
        </div>
        <div class="w-2/8 p-4" x-data="{ open: false }">
            <div x-show="!open" @mouseover="open = true" class="truncate">
                {{ $order->note }}
            </div>
            <div x-show="open" @mouseover.away="open = false">
                {{$order->note}}
            </div>
        </div>
        <div class=" w-1/8 p-4">
            {{$order->tracking}}
        </div>
        <div class="w-1/8 p-4 text-right">
            $ {{ $order->total / 100}}
        </div>
    </div>
    @endforeach
</div>
@endsection
