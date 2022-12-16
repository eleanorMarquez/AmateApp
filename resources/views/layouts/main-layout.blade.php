<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="msapplication-TileColor" content="#2b5797">
    {{-- <meta name="msapplication-config" content="{{ asset('assets/favicons/browserconfig.xml') }}"> --}}
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{ asset('asset/favicons/Icono.ico') }}">

    <title>@yield('title') | Violentómetro </title>

    <x-css>
        {{$css}}
    </x-css>

</head>
<body>
    <div class="container-scroller">
        
            <!----- Header ------>
            <x-navbar></x-navbar>
            <div class="container-fluid page-body-wrapper">
            <!----- Sidebar ------>
            <x-sidebar></x-sidebar>
                {{ $slot }}
            
            </div>
                

           
    </div>
        <x-js>
            {{$js}}
        </x-js>
        
</body>
</html>
