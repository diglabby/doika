<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Doika Module | {{ config('app.name') }}</title>

    <!-- Styles -->

    {{-- @if ($stylePath = Html::asset('backend', 'backend.css'))
    <link rel="stylesheet" href="{{ $stylePath }}">
    @endif --}}
    <link rel="stylesheet" href="/doika/public/build/css/widget.css">

    <!-- CDN -->
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script defer src="//cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>

    <script defer src="/doika/public/build/js/vendor-widget.js"></script>
    <script defer src="/doika/public/build/js/widget.js"></script>
</head>
<body class="@yield('body_class')">
    @yield('body')

    @stack('scripts')
</body>
</html>
