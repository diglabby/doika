<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Doika Login</title>

    <link rel="stylesheet" href={{ asset(mix("build/css/dashboard/dashboard.css")) }}>

    <script defer src={{ asset(mix("build/js/dashboard/dashboard.js")) }}></script>

    <!-- JS settings -->
    <script type="application/json" data-settings-selector="settings-json">
        {!! json_encode([
            'locale' => app()->getLocale(),
            'appName' => config('app.name'),
            'homePath' => route('dashboard.home'),
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
