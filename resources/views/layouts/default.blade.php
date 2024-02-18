<!DOCTYPE html>
<html lang="@yield('lang', 'ru')">
<head>
    <title>@yield('title', env('APP_NAME', 'Megano'))</title>
    <meta name="description" content="@yield('description')">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    @include('layouts.head')
    @yield('head')
</head>
<body class="Site">
    
    @include('components.header')

    @yield('content')
    
    @include('components.footer')

    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>