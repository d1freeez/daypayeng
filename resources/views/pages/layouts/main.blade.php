<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Web2Cash | @isset($title) {{ $title }} @endisset  </title>
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('fonts/Qanelos/stylesheet.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}"/>

    @yield('css')
    @toastr_css
</head>
<body>
    <div id="app" class="app">
        @include('_include.toastr_errors')
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @toastr_js
    @toastr_render
@yield('js')
</body>
</html>
