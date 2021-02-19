@extends('layouts.guest')

@section('content')

<div class="text-3xl font-bold text-center mb-4">
    TDRMoto
</div>
<form action="{{ route('login') }}" method="POST"
    class="flex flex-col space-y-4 p-4 bg-white rounded shadow border border-gray-300">
    <x-forms.input placeholder="Username" name="username" />
    <x-forms.input placeholder="Password" name="password" />
    <x-forms.submit label="Login" />
    @csrf
</form>
@endsection
