@extends('layouts.guest')

@section('content')

<div class="grid grid-cols-6 gap-4 border-2 border-gray-500 p-4">
    @foreach ($listings as $listing)
    <div class="flex flex-col">
        <div>
            {{ $loop->index < 10 ? '0' . ($loop->index + 1) : $loop->index + 1}}:{{$listing->sku}}
        </div>
        <div class="flex flex-col text-sm">
            @foreach($listing->products as $product)
            <div>
                {{$product->area}} - {{$product->stock}}
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

@endsection
