@extends('layouts.app')

@section('content')
<x-page-header :title="$product->sku . ' KOGAN'">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
    <span>/</span>
    <a href="{{ route('products.index') }}">Products</a>
    <span>/</span>
    <a href="{{ route('products.show', $product) }}">{{ $product->sku }}</a>
    <span>/</span>
    <a href="#">KOGAN</a>
</x-page-header>
<div class="p-4 shadow border-gray-300 border bg-white rounded-md">
    {{$kogan->sku}}|{{$kogan->title}}|{{$kogan->brand}}|{{$kogan->category}}|{{$kogan->stock}}|{{$kogan->price / 100}}|{{$kogan->shipping / 100}}|{{$kogan->images}}|{{$kogan->description}}|{{$kogan->subtitle}}|{{$kogan->inbox}}|{{$kogan->gtin}}|{{$kogan->rrp}}|{{$kogan->handling_days}}
</div>
@endsection
