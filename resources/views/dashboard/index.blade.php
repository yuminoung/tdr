@extends('layouts.app')

@section('content')

<x-page-header title="DASHBOARD">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</x-page-header>

<div class="flex flex-row space-x-4">
    <x-link :route="route('products.index')">
        Products
    </x-link>
    <x-link :route="route('imports.shopify.index')">
        Import From Shopify
    </x-link>
    <x-link :route="route('exports.kogan')">
        Export To Kogan
    </x-link>
</div>

@endsection
