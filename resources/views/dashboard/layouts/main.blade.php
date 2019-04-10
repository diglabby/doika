<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Doika Admin Panel | {{ config('app.name') }}</title>

    <!-- Styles -->

    {{-- @if ($stylePath = Html::asset('dashboard', 'dashboard.css'))
    <link rel="stylesheet" href="{{ $stylePath }}">
    @endif --}}
    <link rel="stylesheet" href="{{ asset('build/css/dashboard.css') }}">


    <!-- CDN -->
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script defer src="//cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>

    <script defer src="{{ assert('build/js/vendor-dashboard.js') }}"></script>
    <script defer src="{{ assert('build/js/dashboard.js') }}"></script>

    <!-- JS settings -->
    <script type="application/json" data-settings-selector="settings-json">
        {!! json_encode([
            'locale' => app()->getLocale(),
            'appName' => config('app.name'),
            'homePath' => route('dashboard.home'),
            //'adminHomePath' => route('admin.home', [], false),
            'adminHomePath' => '/doika/dashboard',
            'adminPathName' => config('app.admin_path'),
            'locales' => 'en',
            'user' => $loggedInUser,
        ]) !!}
    </script>
</head>
<body class="@yield('body_class')">
    @yield('body')

    @stack('scripts')
</body>
</html>
