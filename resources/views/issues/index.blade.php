@extends('layouts.app')

@section('content')
<x-page-header title="ISSUES" />

<div class="flex flex-row space-x-4">
    <div class="flex flex-col space-y-4 w-3/4">
    <form action="{{ route('issues.index') }}" method="GET" class="flex flex-row space-x-4">
        <input type="text" name="search" class="w-full p-4 shadow rounded focus-animation" placeholder="Search" value="{{ request()->search }}">
        <button
            class="bg-yellow-100 p-4 rounded shadow focus-animation">
            <x-icons.search />
        </button>
    </form>
    <div class="gap grid-cols-1 divide-y rounded shadow bg-white">
        @foreach($issues as $issue)
        <div class="p-4 flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <div>
                    {{$issue->sku}}
                    @if($issue->order_id) / {{ $issue->order_id }} @endif 
                    @if($issue->name) / {{ $issue->name }}@endif
                    @if($issue->phone) / {{ $issue->phone }}@endif
                </div>
                <div>
                    {{$issue->issue}}
                </div>
                @if($issue->images)
                <div class="flex flex-row">
                    @foreach($issue->images as $image)
                    <a href="{{ asset($image->source) }}" target="_blank">
                        <img class="w-32 h-32" src="{{ asset($image->source) }}" />
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
            <form action="{{ route('issues.update', $issue) }}" method="POST">
                @if($issue->closed)  
                <button class="bg-gray-100 p-4 focus-animation shadow rounded">Closed</button>
                @else  
                <button class="bg-yellow-100 hover:bg-yellow-200 p-4 focus-animation shadow rounded">Open</button>
                @endif
                <input type="hidden" name="search" value="{{ request()->search }}">
                @method('patch')
                @csrf
            </form>
        </div>
            @endforeach
    </div>
    {{ $issues->links() }}
    </div>

    <div class="w-1/4 flex flex-col space-y-4">
        <form action="{{ route('issues.store') }}" enctype="multipart/form-data" method="POST" class="flex flex-col space-y-4">
            <input type="text" name="sku" class="w-full p-4 shadow rounded focus-animation" placeholder="SKU">
            <textarea name="issue" class="w-full p-4 shadow rounded focus-animation" placeholder="Issue"></textarea>
            <input name="order_id" type="text" class="w-full p-4 shadow rounded focus-animation" placeholder="Order ID (optional)">
            <input type="text" class="w-full p-4 shadow rounded focus-animation" name="name" placeholder="Name (optional)">
            <input name="phone" type="text" class="w-full p-4 shadow rounded focus-animation" placeholder="Phone (optional)">
            <input name="images[]" type="file" class="w-full p-4 shadow rounded focus-animation" multiple>
            <button class="p-4 shadow rounded bg-white focus-animation">Create</button>
            @csrf
        </form>
        @if($errors->count())
        {{$errors}}
        @endif
    </div>
</div>
@endsection
