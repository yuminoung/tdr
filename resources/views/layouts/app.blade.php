<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TDR</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Padauk&display=swap" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>

<body class="bg-gray-100 w-3/4 mx-auto font-padauk">
    <header class="my-8">
        <a href="{{ route('dashboard.index') }}" class="font-oswald text-3xl">
            TDR
        </a>
    </header>
    <main class="">
        @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
