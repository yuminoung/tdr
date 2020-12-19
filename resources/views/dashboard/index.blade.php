@extends('layouts.app')

@section('content')
<div class="flex flex-row space-x-4">
    <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 shadow rounded-lg inline-block">Products</a>
    <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-200 shadow rounded-lg inline-block">Categories</a>
    <a href="{{ route('imports.shopify.index') }}" class="px-4 py-2 bg-gray-200 shadow rounded-lg inline-block">Import From Shopify</a
</div>

@endsection
