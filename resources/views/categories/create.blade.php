@extends('layouts.app')

@section('content')
<a href="#" class="block font-oswald text-3xl mb-4">
    Create Categories
</a>
<form action="{{ route('categories.store') }}" method="POST" class="flex flex-col items-start space-y-4">
    <select name="category_type" class="bg-gray-200 rounded-lg shadow text-black px-4 py-2 w-1/2">
        <option value="catch">Catch</option>
        <option value="kogan">Kogan</option>
    </select>
    <input type="text" name="category_name" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Category">
    <button class="bg-gray-200 rounded-lg shadow text-black px-4 py-2">Create</button>
    @csrf
</form>


@endsection
