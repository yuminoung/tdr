@extends('layouts.app')

@section('content')

<x-page-header title="UPLOAD TRACKING">
    <div class="flex flex-row space-x-4">
        <x-link route="{{ route('orders.download-template') }}">
            <div class="flex flex-row space-x-2 items-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <div>
                    Download template
                </div>
            </div>
        </x-link>
    </div>
</x-page-header>

<div class="">
    <form action="{{ route('orders.tracking-upload') }}" method="POST" enctype="multipart/form-data">
        <div class="flex flex-row space-x-4">
            <input type="file" name="file"
                class="bg-yellow-100 ring-1 ring-inset ring-red-100 hover:bg-yellow-200 p-2 focus:ring-yellow-500 transition ease-in duration-300 focus:outline-none">
            <x-button>
                <div class="flex flex-row items-center space-x-2">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        Submit
                    </div>
                </div>
            </x-button>
        </div>
        @error('file')
        <p class="text-red-700 italic">
            {{$message}}
        </p>
        @enderror
        @csrf
    </form>
</div>
Direct freight, Auspost and Fastway only


@endsection
