@extends('layouts.app')

@section('content')

<form action="{{ route('products.import.store') }}" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button class="bg-white">submit</button>
    @csrf
</form>

@endsection
