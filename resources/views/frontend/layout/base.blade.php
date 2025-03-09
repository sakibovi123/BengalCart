<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('frontend.includes.css')
    @stack('styles')

</head>


<body class="animsition">
    @include('frontend.layout.header')
    @include('frontend.layout.cart_sidebar')
    @yield('content')

    @include('frontend.layout.footer')
    @include('frontend.includes.js')
    @stack('scripts')
</body>
