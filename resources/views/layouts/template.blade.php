<!DOCTYPE html>
<html lang="@yield('lang', 'ru')">
<head>
    <title>@yield('title', env('APP_NAME', 'Megano'))</title>
    <meta name="description" content="@yield('description')">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    {{-- <link href="favicon.ico" rel="shortcut icon">
    <link rel="preload" href="assets/fonts/Roboto/Roboto-Regular.woff" as="font">
    <link rel="preload" href="assets/fonts/Roboto/Roboto-Italic.woff" as="font">
    <link rel="preload" href="assets/fonts/Roboto/Roboto-Bold.woff" as="font">
    <link rel="preload" href="assets/fonts/Roboto/Roboto-Bold_Italic.woff" as="font">
    <link rel="preload" href="assets/fonts/Roboto/Roboto-Light.woff" as="font">
    <link rel="preload" href="assets/fonts/Roboto/Roboto-Light_Italic.woff" as="font">
    <link rel="stylesheet" href="assets/css/fonts.css?v=65245665">
    <link rel="stylesheet" href="assets/css/basic.css?v=65245665">
    <link rel="stylesheet" href="assets/css/extra.css?v=65245665">
    <script src="assets/plg/CountDown/countdown.js"></script> --}}
    @yield('head')
</head>
<body class="Site">
    
    @include('layouts.header')

    @section('header')
        @yield('header')
    @endsection

    @yield('content')
    
    @include('layouts.footer')

    @section('footer')
        @yield('footer')
    @endsection

    @yield('scripts')
</body>
</html>