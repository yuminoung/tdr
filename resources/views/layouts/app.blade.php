<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TDR</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    @livewireStyles

</head>

<body class="bg-gray-50 text-xl font-inconsolate">
    @include('layouts.header')
    <main class="mx-12 flex flex-col space-y-4">
        @yield('content')
    </main>
    {{-- <footer class="my-4 px-4 font-satisfy text-center">
        Developed by Oung
    </footer> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireScripts
</body>

</html>
