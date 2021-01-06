@extends('layouts.app')

@section('content')
    <x-page-header title="{{ $product->sku }} EDIT">
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('products.index') }}">Products</a>
        <span>/</span>
        <a href="{{ route('products.show', $product) }}">{{ $product->sku }}</a>
        <span>/</span>
        <a href="{{ route('products.edit', $product) }}">Edit</a>
    </x-page-header>

    <form action="{{ route('products.update', $product) }}" method="POST" class="flex flex-col space-y-4 p-4 bg-white rounded-md border border-gray-300">
        <x-forms.input name="sku" placeholder="Product SKU" :value="$product->sku" />
        <x-forms.input name="name" placeholder="Product Name" :value="$product->name" />
        <x-forms.textarea name="description" placeholder="Product Description" :value="$product->description" />
        <x-forms.input name="price" placeholder="Product Price" :value="$product->presentPrice()" />
        <x-forms.input name="price" placeholder="Product Stock" :value="$product->quantity" />
        <x-forms.submit>
            <x-icons.check-circle />
        </x-forms.submit>
        @method('PATCH')
        @csrf
    </form>
    
@endsection
