<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,400italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" media="screen" >
        <link rel="stylesheet" href="{{ asset('datepicker/css/datepicker.css') }}" media="screen" >
        
        <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
        <!-- header -->
        <!-- nav -->
        @include('layouts.partials.navbar')
        
        @yield('content')
        
        <!-- footer -->
        @include('layouts.partials.footer')

        <!-- script -->
        @yield('scripts')
    </body>
</html>
