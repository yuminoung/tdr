@extends('layouts.guest')

@section('content')

<x-page-header title="TDR LOGIN" />

<form action="#" method="POST"
    class="flex flex-col space-y-4 p-4 bg-white rounded shadow w-full border border-gray-300">
    <x-forms.input placeholder="Username" name="username" />
    <x-forms.input placeholder="Password" name="password" />
    <div class="flex flex-row justify-between items-center">
        <label for="remember">
            <input type="checkbox" id="remember" name="remember login">
            Remember me
        </label>
        <x-forms.submit label="Login" />
    </div>
    @csrf
</form>
@endsection
