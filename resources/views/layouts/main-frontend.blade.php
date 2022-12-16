<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="msapplication-TileColor" content="#2b5797">
    {{-- <meta name="msapplication-config" content="{{ asset('assets/favicons/browserconfig.xml') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('asset/favicons/Icono.ico') }}">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title') | Amate </title>

    <x-css-frontend>
        {{$css}}
    </x-css-frontend>

</head>
<body>

    <!----- Header ------>
    <x-header-frontend></x-header-frontend>

        {{ $slot }}

    <!-- |=====|| ScrollToTop Start ||===============| -->
    <a href="#" class="scrollToTop">
        <i class="fas fa-level-up-alt"></i>
    </a>

    <!----- Footer ------>
    <x-footer-frontend></x-footer-frontend>
    <x-js-frontend>
        {{$js}}
    </x-js-frontend>
</body>
</html>
