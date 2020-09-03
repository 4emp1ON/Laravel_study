<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="container">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin') }}">Hello page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Auth page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.create') }}">Add news</a>
            </li>
        </ul>
    </div>

    <main class="py-4 container">
        @yield('content')
    </main>
    <nav class="navbar fixed-bottom navbar-light bg-light d-flex justify-content-center">
        <a class="navbar-brand" href="/">Created by valeriy.olyunin</a>
    </nav>
</div>
@yield('js')
</body>
</html>
