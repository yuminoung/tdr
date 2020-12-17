@extends('layouts.app')

@section('content')
    <a href="#" class="block font-oswald text-3xl mb-4">
            Products
    </a>
    <a href="{{ route('products.create') }}" class="inline-block px-4 py-2 shadow rounded-lg bg-gray-100">
        Create
    </a>
    @foreach ($products as $product)
    <div>
        <a href="{{ route('products.show', $product) }}">{{$product->product_sku}}</a>
    </div>
    @endforeach

@endsection
