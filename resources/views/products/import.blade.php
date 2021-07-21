@extends('layouts.app')

@section('content')

<form action="{{ route('products.import.store') }}" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <x-button>Submit</x-button>
    @csrf
</form>

@endsection
