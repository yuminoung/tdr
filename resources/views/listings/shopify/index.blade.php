@extends('layouts.app')

@section('content')
<x-page-header title="LISTINGS - SHOPIFY">
    <form action="{{ route('listings.shopify.sync') }}" method="POST">
        <button class="bg-white rounded shadow p-4">
            Sync
        </button>
        @csrf
    </form>
</x-page-header>

<div class="flex flex-col bg-white shadow rounded divide-y divide-gray-200">
    @foreach($listings as $listing)
    <div class="flex flex-row hover:bg-yellow-200 space-x-4 items-center">
        <a class="w-64 block p-4" href="{{ route('listings.shopify.show', $listing) }}">
            {{$listing->sku}}
        </a>
        <div>
            {{$listing->title}}
        </div>
        <div>
            Edit
        </div>
    </div>
    @endforeach
</div>
{{ $listings->links() }}
@endsection
