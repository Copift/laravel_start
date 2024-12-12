<!DOCTYPE html>
<html lang="ru">
    @vite(['resources/css/app.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WebApp')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('header')

    <main>
        @yield('content')
    </main>

    @include('footer')
</body>
</html>