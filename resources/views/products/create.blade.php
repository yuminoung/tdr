@extends('layouts.app')

@section('content')
<x-page-header title="PRODUCT CREATE">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
    <span>/</span>
    <a href="{{ route('products.index') }}">Products</a>
    <span>/</span>
    <a href="#">Create</a>
</x-page-header>

<form action="{{ route('products.store') }}" method="POST"
    class="flex flex-col space-y-4 p-4 bg-white rounded-md border border-gray-300">
    <x-forms.input name="sku" placeholder="SKU" />
    <x-forms.input name="upc" placeholder="UPC" />
    <x-forms.input name="name" placeholder="Name" />
    <x-forms.input name="description" placeholder="Description" />
    <x-forms.input name="price" placeholder="Price" />
    <x-forms.input name="quantity" placeholder="Stock" />
    <x-forms.submit label="Create" />


    @csrf
</form>
@endsection
