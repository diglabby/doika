<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="shortcut icon" href="{{ asset('images/Dbai-logo.png') }}" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <script type="application/json" data-settings-selector="settings-json">
        {!! json_encode([
            'appName' => config('app.name'),
            'homePath' => url()->current(),
            'widgetBasePath' => '/doika/doika/widget',
            'locale' => app()->getLocale(),
            'user' => $loggedInUser,
            'visualSettings' => [
                'buttonBackground' => setting('buttonBackground'),
                'widgetBackground' => setting('widgetBackground'),
                'progressBarColor' => setting('progressBarColor'),
                'fontColor' => setting('fontColor'),
            ],
            'termsOfUse' => setting('termsOfUse'),
        ]) !!}
    </script>

    <script type="text/javascript" src="https://js.bepaid.by/begateway-1-latest.min.js"></script>

    <link href="{{ asset(mix('build/css/widget/widget.css')) }}" rel="stylesheet">

    @routes()
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset(mix('build/js/widget/widget.js')) }}"></script>
</body>
</html>
