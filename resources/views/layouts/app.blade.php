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
        <div class="container-xl">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Hello page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/categories">News categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/Hi%20Tech">Hi Tech category News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/Hi%20Tech/1">Show me one News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/authentication">Auth page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/add">Add news</a>
                </li>
            </ul>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
        <nav class="navbar fixed-bottom navbar-light bg-light d-flex justify-content-center">
            <a class="navbar-brand" href="/">Created by valeriy.olyunin</a>
        </nav>
    </div>
</body>
</html>
