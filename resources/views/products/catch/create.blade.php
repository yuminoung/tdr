@extends('layouts.app')

@section('content')
<x-page-header title="{{ $product->sku }} CATCH CREATE">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
    <span>/</span>
    <a href="{{ route('products.index') }}">Products</a>
    <span>/</span>
    <a href="{{ route('products.show', $product) }}">{{ $product->sku }}</a>
    <span>/</span>
    <a href="{{ route('catch.create', $product) }}">Catch Create</a>
</x-page-header>

<form action="{{ route('catch.store', $product) }}" method="POST"
    class="flex flex-col space-y-4 p-4 bg-white rounded-md border border-gray-300">
    <x-forms.input name="category" placeholder="Catch Category" />
    <x-forms.input name="title" placeholder="Catch Title" :value="$product->name" />
    <x-forms.input name="keywords" placeholder="Keywords" value="TDR|" />
    <x-forms.input name="price" placeholder="Price" />
    <x-forms.input name="discount_price" placeholder="Discount Price" />
    <div class="flex flex-col space-y-2">
        <label for="logistic_class" class="text-sm text-gray-700">Logistic Class</label>
        <select name="logistic_class" id="logistic_class"
            class="appearance-none bg-gray-100 rounded-md shadow-md border border-gray-300 focus:ring ring-blue-300 text-black px-4 py-2 w-full">
            <option>Flat Rate</option>
            <option>Small - Light Weight</option>
            <option>Small - Medium Weight</option>
            <option>Small - Heavy Weight</option>
            <option>Medium - Light Weight</option>
            <option>Medium - Medium Weight</option>
            <option>Medium - Heavy Weight</option>
            <option>Medium - Super Heavy Weight</option>
            <option>Large - Light Weight</option>
            <option>Large - Medium Weight</option>
            <option>Large - Heavy Weight</option>
            <option>Large - Super Heavy Weight</option>
            <option>Large - 2 Men Carry</option>
            <option>Oversize - Light Weight</option>
            <option>Oversize - Medium Weight</option>
            <option>Oversize - Heavy Weight</option>
            <option>Oversize - Super Heavy Weight</option>
            <option>Oversize - 2 Men Carry</option>
            <option>Super Oversize - A</option>
            <option>Super Oversize - B</option>
            <option>FREE</option>
        </select>
    </div>
    <x-forms.submit>
        <x-icons.check-circle />
    </x-forms.submit>
    @csrf
</form>
@endsection
