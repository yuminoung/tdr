@extends('layouts.app')

@section('content')
    <x-page-header title="Shopify Import" />

    <form 
        action="{{ route('imports.shopify.store') }}" 
        class="flex flex-col space-y-4 items-start"
        enctype="multipart/form-data"
        method="POST"
    >
        <input type="file" name="file" class="px-4 py-2 shadow rounded-lg bg-gray-200 appearance-none">
        @error('file')
        <p class="text-red-700 text-sm italic">{{ $message }}</p>
        @enderror
        <button type="submit" class="px-4 py-2 shadow rounded-lg bg-gray-200">
            Import
        </button>
        @csrf
    </form>
    
@endsection
