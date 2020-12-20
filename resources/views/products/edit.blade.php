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
    {{$product}}
@endsection
