@extends('layouts.app')

@section('content')
    <x-page-header :title="$product->sku">
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('products.index') }}">Products</a>
        <span>/</span>
        <a href="#">{{ $product->sku }}</a>
    </x-page-header>

    <div class="flex flex-col space-y-8">
        <div>
            <x-content-header title="Title" />
            <div>
                {{$product->name}}
            </div>
        </div>
        <div>
            <x-content-header title="Description" />
            <div>
                {!!$product->description!!}
            </div>
        </div>
        <div>
            <x-content-header title="Images" />
            <div class="grid grid-cols-5 gap-4">
                @foreach($product->images as $image)
                <div class="shadow rounded-md border border-gray-300">
                    <img src="{{ $image->path }}" class="w-full h-full rounded-md">
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
