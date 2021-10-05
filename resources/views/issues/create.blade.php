@extends('layouts.app')

@section('content')

<x-page-header title="ISSUES/CREATE"></x-page-header>
<div class="w-1/2 flex flex-col space-y-4">
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
