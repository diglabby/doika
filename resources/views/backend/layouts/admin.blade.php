<!DOCTYPE html>
<html lang="be">
<head>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Scada">
  <link rel="stylesheet" href="css/toggler.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  @yield('top_scripts')
</head>
<body>
  <header class="doika__header">
    <div class="doika__header__wrapper">
      <div class="logo"></div>
      <button class="button-quit" onclick="document.location.replace('/')">Перайсці на сайт</button>
      <button class="button-quit" onclick="document.location.replace('/doika/get-out')">Выхад</button>
    </div>
    <div class="doika__header__menu">
      <button class="menu__menu-item" onclick="document.location.replace('/doika/show-list')">Галоўная</button>
      <button class="menu__menu-item" onclick="document.location.replace('/doika/show-configurations')">Канфiгурацыя модуля</button>
    </div>
  </header>

	<main>
    @yield('content')
	</main>
  
  @yield('popups')
  
  <footer>
    Бягучая версія (на {{ $version_date->format('d.m.Y') }} - version {{ $version }})
  </footer>
  
</body>
</html>
