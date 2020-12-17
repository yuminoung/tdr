@extends('layouts.app')

@section('content')

    <h3 class="text-2xl font-bold font-secular-one">
    Create product 
    </h3>
    {{$errors}}
    <form action="{{ route('products.store') }}" method="POST" class="flex flex-col items-start space-y-4">
        <select name="product_catch_category" class="bg-gray-200 rounded-lg shadow text-black px-4 py-2 w-1/2">
            @foreach($catch_categories as $category)
            <option>{{ $category->category_name }}</option>
            @endforeach
        </select>
        <input type="text" name="product_sku" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="SKU">
        <input type="text" name="product_upc" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="UPC">
        <input type="text" name="product_title" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Title">
        <textarea name="product_description" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Description"></textarea>
        <input type="text" name="product_brand" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Brand" value="TDRMOTO">
        <textarea name="product_keywords" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Keywords"></textarea>
        <textarea name="product_images" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Images use (,) to seperate image"></textarea>
        <input type="text" name="product_price" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Price">
        <input type="text" name="product_quantity" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Quantity">
        <input type="text" name="product_discount_price" class="bg-gray-200 rounded-lg shadow w-1/2 text-black px-4 py-2" placeholder="Discount Price">
        <select name="product_logistic_class" class="bg-gray-200 rounded-lg shadow text-black px-4 py-2 w-1/2">
            <option>Flat Rate</option>
            <option>Small - Light Weight</option>
            <option>Small - Medium Weight</option>
            <option>Small - Heavy Weight</option>
            <option>Medium - Light Weight</option>
            <option>Medium - Medium Weight</option>
            <option>Medium - Heavy Weight</option>
            <option>Medium - Super Heavy Weight</option>
            <option>Large - Light Weight</option>
            <option>Large - Medium Weight</option>
            <option>Large - Heavy Weight</option>
            <option>Large - Super Heavy Weight</option>
            <option>Large - 2 Men Carry</option>
            <option>Oversize - Light Weight</option>
            <option>Oversize - Medium Weight</option>
            <option>Oversize - Heavy Weight</option>
            <option>Oversize - Super Heavy Weight</option>
            <option>Oversize - 2 Men Carry</option>
            <option>Super Oversize - A</option>
            <option>Super Oversize - B</option>
            <option>FREE</option>
        </select>
        <button class="bg-gray-200 rounded-lg shadow text-black px-4 py-2">Create</button>
        @csrf
    </form>
@endsection
