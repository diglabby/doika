<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Модуль Doika | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('build/css/widget.css') }}">

    <script defer src="{{ asset('build/js/vendor-widget.js') }}"></script>
    <script defer src="{{ asset('build/js/widget.js') }}"></script>
</head>
<body class="@yield('body_class')">
    @yield('body')

    @stack('scripts')
</body>
</html>
