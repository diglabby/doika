<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Doika Module | {{ config('app.name') }}</title>

    <!-- Styles -->
    @if ($stylePath = Html::asset('client', 'client.css'))
    <link rel="stylesheet" href="{{ $stylePath }}">
    @endif

    <!-- CDN -->
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script defer src="//cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>

    <!-- Scripts -->
    <script defer src="{{ Html::asset('client', 'vendor-client.js') }}"></script>
    <script defer src="{{ Html::asset('client', 'client.js') }}"></script>

    <!-- JS settings -->
    <script type="application/json" data-settings-selector="settings-json">
      {!! json_encode([
          'locale' => app()->getLocale(),
          'locales' => LaravelLocalization::getSupportedLocales(),   
          'campaignEnabled' => config('campaign.enabled')
      ]) !!}
    </script>

    <!-- Named routes -->
    @routes()
</head>
<body class="@yield('body_class')">
    @yield('body')

    @stack('scripts')
</body>
</html>
