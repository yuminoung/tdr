@extends('layouts.app')

@section('content')
    
    <x-page-header title="ISSUES DOWNLOAD"/>

    <form action="#" method="POST" class="flex flex-col space-y-4 w-1/2">
        <input class="w-full p-4 shadow rounded focus-animation" type="text" name="year" value="{{ Illuminate\Support\Carbon::now()->year }}">
        <select class="w-full p-4 shadow rounded focus-animation" name="month">
            <option value="{{ Illuminate\Support\Carbon::now()->month }}">{{ Illuminate\Support\Carbon::now()->month }}</option>
            @foreach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] as $month)
                @if($month !== Illuminate\Support\Carbon::now()->month)
                <option value="{{$month}}">
                    {{ $month }}
                </option>
                @endif
            @endforeach
        </select>
        @csrf
        <button
            class="bg-yellow-100 p-4 rounded shadow focus-animation">
            Download
        </button>
    </form>


@endsection
