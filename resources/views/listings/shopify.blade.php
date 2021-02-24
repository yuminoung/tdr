@extends('layouts.app')

@section('content')
Shopify listings
<br>
@foreach($listings as $listing)
<p>{{ $listing['title'] }}</p>
@endforeach

@endsection
