<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Include AdminLTE CSS -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">

    <!-- Include MainPage CSS -->
    <link href="{{ asset('CSS/MainPage.css') }}" rel="stylesheet">

    <!-- Use Vite for JS and CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased main-background"> <!-- Ensure this class is here -->

    <nav class="bg-light text-center py-3">
        <h1 class="h2">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">SSO MAIN PAGE</a>
        </h1>
    </nav>


    <div class="flex flex-col h-screen">
        <div class="flex-grow">
            @yield('content')
        </div>
    </div>
</body>

</html>