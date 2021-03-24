@extends('layouts.app')

@section('content')

<form action="{{ route('listings.kogan.store', $listing) }}">
    <input type="text" name="title" placeholder="title" value="{{$listing->shopify->title}}" />
    <input type="text" name="brand" placeholder="brand" value="TDR" />
    <input type="text" name="category" placeholder="cat" value="ebay:" />
    <input type="text" name="stock" placeholder="stock" value="{{ $listing->shopify->stock }}">
    <input type="text" name="subtitle" placeholder="subt">
    <textarea name="inbox" id="" cols="30" rows="10"></textarea>
    @csrf
</form>

@endsection
