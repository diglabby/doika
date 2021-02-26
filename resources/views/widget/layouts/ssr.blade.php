<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="shortcut icon" href="{{ asset('images/Dbai-logo.png') }}" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Модуль Doika | {{ config('app.name') }}</title>

    <link href="{{ asset(mix('build/css/widget/widget.css')) }}" rel="stylesheet">

    <script defer src="{{ asset(mix('build/js/widget/widget.js')) }}"></script>
</head>
<body class="@yield('body_class')">
    @yield('body')

    @stack('scripts')
</body>
</html>
