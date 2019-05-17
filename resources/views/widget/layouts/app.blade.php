<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->

    <script type="application/json" data-settings-selector="settings-json">
        {!! json_encode([
            'appName' => config('app.name'),
            'homePath' => url()->current(),
            'widgetBasePath' => '/doika/doika/widget',
            'locale' => app()->getLocale(),
            'user' => $loggedInUser,
        ]) !!}
    </script>

    <script type="text/javascript" src="https://js.bepaid.by/begateway-1-latest.min.js"></script>


    <!-- Styles -->

    <link href="{{ asset(mix('build/css/widget/widget.css')) }}" rel="stylesheet">

    @routes()
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset(mix('build/js/widget/widget.js')) }}"></script>
</body>
</html>
