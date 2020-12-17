@extends('layouts.app')

@section('content')
<a href="#" class="block font-oswald text-3xl mb-4">
    Categories
</a>
<a href="{{ route('categories.create') }}" class="inline-block px-4 py-2 shadow rounded-lg bg-gray-100">
    Create
</a>
<div class="flex flex-col">
    <h3 class="text-2xl font-bold font-secular-one">
    Catch categories
    </h3>
    @foreach ($catch_categories as $category)
    <div>
        {{$category->category_name}}
    </div>
    @endforeach

    <h3 class="text-2xl font-bold font-secular-one">
        Kogan categories
    </h3>
    @foreach ($kogan_categories as $category)
    <div>
        {{$category->category_name}}
    </div>
    @endforeach
</div>
@endsection
