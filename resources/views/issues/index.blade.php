@extends('layouts.app')

@section('content')
<x-page-header title="ISSUES" />

<div class="flex flex-row space-x-4">
    <div class="flex flex-col space-y-4 w-3/4">
    <form action="" class="flex flex-row space-x-4">
        <input type="text" class="w-full p-4 shadow rounded focus:outline-none focus:ring focus:ring-yellow-500" placeholder="Search under construction">
        <button
            class="bg-yellow-100 focus:ring hover:bg-yellow-200 p-4 focus:ring-yellow-500 transition ease-in duration-300 focus:outline-none rounded">
            <x-icons.search />
        </button>
    </form>
    <div class="gap grid-cols-1 divide-y rounded shadow bg-yellow-50">
        @foreach($issues as $issue)
        <div class="p-4 flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <div>
                    {{$issue->sku}} / {{$issue->platform}} @if($issue->name) / {{ $issue->name }} @endif @if($issue->phone) / {{ $issue->phone }} @endif
                </div>
                <div>
                    {{$issue->issue}}
                </div>
            </div>
            <form action="{{ route('issues.update', $issue) }}" method="POST">
                @if($issue->closed)  
                <button class="bg-gray-100 focus:ring p-4 focus:ring-yellow-500 transition ease-in duration-300 focus:outline-none rounded">Closed</button>
                @else  
                <button class="bg-yellow-100 focus:ring hover:bg-yellow-200 p-4 focus:ring-yellow-500 transition ease-in duration-300 focus:outline-none rounded">Open</button>
                @endif
                @method('patch')
                @csrf
            </form>
        </div>
            @endforeach
    </div>
</div>

    <div class="w-1/4 flex flex-col space-y-4">
        <form action="{{ route('issues.store') }}" method="POST" class="flex flex-col space-y-4">
            <input type="text" name="sku" class="w-full p-4 shadow rounded focus:outline-none focus:ring focus:ring-yellow-500" placeholder="SKU">
            <textarea name="issue" class="w-full p-4 shadow rounded focus:outline-none focus:ring focus:ring-yellow-500" placeholder="Issue"></textarea>
            <input type="text" class="w-full p-4 shadow rounded focus:outline-none focus:ring focus:ring-yellow-500" name="name" placeholder="Name (optional)">
            <input name="phone" type="text" class="w-full p-4 shadow rounded focus:outline-none focus:ring focus:ring-yellow-500" placeholder="Phone (optional)">
            <select name="platform" class="w-full p-4 shadow rounded focus:outline-none focus:ring focus:ring-yellow-500">
                <option value="ebay">Ebay</option>
                <option value="catch">Catch</option>
                <option value="kogan">Kogan</option>
                <option value="website">Website</option>
                <option value="other">Other</option>
            </select>
            <button class="p-4 shadow rounded bg-white focus:outline-none focus:ring focus:ring-yellow-500">Create</button>
            @csrf
        </form>
    </div>
</div>


@endsection
