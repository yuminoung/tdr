@extends('layouts.app')

@section('content')
<x-page-header title="ISSUES">
    <form action="{{ route('issues.index') }}" method="GET" class="flex flex-row space-x-4">
        <input type="text" name="search" class="w-full p-4 shadow rounded focus-animation" placeholder="Search" value="{{ request()->search }}">
        <button
            class="bg-yellow-100 p-4 rounded shadow focus-animation">
            <x-icons.search />
        </button>
    </form>
    <a href="{{ route('issues.create') }}" class="p-4 shadow rounded focus-animation bg-yellow-100">
        Create
    </a>
</x-page-header>

<div class="grid grid-cols-1 bg-white shadow rounded divide-y divide-gray-100">
    <div class="flex flex-row items-center font-bold bg-gray-100">
        <div class="p-4 w-1/12">
            ID
        </div>
        <div class="p-4 w-1/12">
            SKU
        </div>
        <div class="p-4 w-2/12">
            Date
        </div>
        <div class="p-4 w-2/12">
            Order  ID
        </div>
        <div class="p-4 w-2/12">
            Created By
        </div>
        <div class="p-4 w-3/12">
            Details
        </div>
        <div class="p-4 w-1/12">
            Status
        </div>
    </div>
    @foreach ($issues as $issue)
    <div x-data="{ open: false }">
        <div class="flex flex-row items-center hover:bg-yellow-100 cursor-pointer">
            <div class="p-4 w-1/12 text-blue-700" @click.self="open = !open">
                {{ $issue->id }}
            </div>
            <div class="p-4 w-1/12">
                {{ $issue->sku }}
            </div>
            <div class="p-4 w-2/12">
                {{ $issue->created_at->format('d/m/Y') }}
            </div>
            <div class="p-4 w-2/12">
                {{ $issue->order_id }}
            </div>
            <div class="p-4 w-2/12">
                {{ $issue->user->name }}
            </div>
            <div class="p-4 w-3/12">
                {{ $issue->issue }}
            </div>
            <div class="w-1/12 pl-4">
                <form action="{{ route('issues.update', $issue) }}" method="POST">
                    @if($issue->closed)  
                    <button class="bg-gray-100 px-4 py-2 focus-animation shadow rounded">
                        <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </button>
                    @else  
                    <button class="bg-yellow-100 hover:bg-yellow-200 px-4 py-2 focus-animation shadow rounded">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </button>
                    @endif
                    <input type="hidden" name="search" value="{{ request()->search }}">
                    @method('patch')
                    @csrf
                </form>
            </div>
        </div>
        <!-- dropdown -->
        <div class="p-4 flex flex-col bg-gray-50 space-y-4" x-show="open">
            @if($issue->images)
            <div class="flex flex-row">
                @foreach($issue->images as $image)
                <a href="{{ asset($image->source) }}" target="_blank">
                    <img class="w-32 h-32" src="{{ asset($image->source) }}" loading=lazy/>
                </a>
                @endforeach
            </div>
            @endif
            <div class="flex flex-row space-x-4">
                <form action="{{ route('issues.comments.store', $issue) }}" method="POST" class="flex flex-col space-y-4 w-1/2 items-start">
                    <textarea name="body" class="focus-animation rounded shadow p-4 w-full resize-none h-32" placeholder="Comment"></textarea>
                    <button class="p-4 shadow focus-animation rounded bg-yellow-100">Submit</button>
                    <input type="hidden" name="search" value="{{ request()->search }}">
                    @csrf
                </form>
                <div class="w-1/2 flex flex-col space-y-4">
                    @if ($issue->name)
                    <div>
                        Name: {{ $issue->name }} 
                    </div>
                    @endif
                    @if ($issue->phone)
                    <div>
                        Phone: {{ $issue->phone }}
                    </div>
                    @endif
                    @foreach($issue->comments as $comment)
                    <div>
                        {{ $comment->name }}: {{ $comment->body }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $issues->links() }}


@endsection
