# Устаноўка для Распрацоўшчыкаў 

## Тэхнічныя патрабаванні да распрацоўкі
* PHP >= 7.1.3 (OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath Extensions)
* База дадзеных: MySQL >= 5.5, PostgreSQL, SQLite, MS SQL Server [Поўны спіс](https://laravel.com/docs/5.8/database)
* Веб-сервер [Apache](https://httpd.apache.org/download.cgi) (rewrite _mod on, for virtual host directory too: AllowOverride All) ці nginx.
* [Composer](https://getcomposer.org/download/)
* [Node](https://nodejs.org/en/download/) версія >= 8.10, npm >=5.6.0

* Увага! Працуем з рэквэстамі (Pull request) на гітхабе у галіну dev (!)


## Linux

1. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork
2. Дадаем змесціва fork рэпазіторыя ў корань вашага сайта з дапамогай git clone. Пераключаемся на dev branch, з дапамогай git checkout (напрыклад, git checkout dev)
3. Неабходна вызначыць групу і карыстальніка для ўсіх файлаў модуля камандай: `sudo chown -R www-data:www-data .`
4. З тэрмінала запусціць каманду `composer install`. Вы павінны запусціць з карнявой дырэкторыі doika
5. З тэрмінала запусціць каманду `npm install`. Вы павінны запусціць з карнявой дырэкторыі doika
6. Выконваем зборку фронтэнда `npm run build`
7. Рыхтуем канфіг файл. Для гэтага ў тэчцы doika ствараем копію файла .env.example і надаем яму імя .env (падказка: выканаць каманду `cp .env.example .env`)
8. Рыхтуем пустую Mysql базу.
8. Дадаем у файл .env свае дадзеныя, для падключэння к базе, створанай на папярэднім кроку DB_DATABASE={назва_базы} DB_USERNAME={лагін_для_падключэння} DB_PASSWORD={пароль}
9. Разгортваем базу дадзеных камандай `php artisan migrate`.
10. Пасля дадаем зыходныя дадзеныя камандай `php artisan db:seed`
10. Генерым ключ для laravel: зайсцi у папку doika праз i выканаць `php artisan key:generate`
11. Усталяваная версія павінна запускацца на Вашым лакальным хасце са шляхам http://[host-name]/doika/be/admin/login
12. Выкарыстоўваеце дадзеныя для ўвахода Лагін: demo@example.com , Пароль: demo

## Windows (Open Server)
1. Адкрыць налады Open Server(min PREMIUM edition), укладка дамены, ручное кіраванне, напісаць імя дамена, на прыклад doika, папка дамена выбраць localhost
2. Адкрыць укладку сервер, налады выкарыстання зменнай Path выбраць `Свой Path + Win Path`, паставіць каўку ў чэк-боксе `запускаць сервер ў агрэсіўным рэжыме`
3. Адкрыць ўкладку модулі, выбраць Apache 7.2, PHP 7.2, MySQL 5.7, захоўваем, запускаем сервер
4. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork. Націскаем clone or download і капіруем адрас
5. Запускаем кансоль git из Open Server (мае закладкі - Git-CMD). З кансолі заходзім у тэчку localhost (напрыклад, cd d:\OSPanel\domains\localhost {шлях да тэчцы localhost}) і клоніруем туды праект пры дапамозе git clone  (git clone https://github.com/diglabby/doika.git)
6. Заходзім з кансолі ў тэчку doika (каманда cd doika) і пры дапамозе гіт пераключаемся на dev branch (git checkout dev)
7. З тэрмінала запусціць каманду `composer install`. Вы павінны запусціць з карнявой дырэкторыі doika
8. З тэрмінала запусціць каманду `npm install`. Вы павінны запусціць з карнявой дырэкторыі doika
9. Выконваем зборку фронтэнда `npm run build`. Вы павінны запусціць з карнявой дырэкторыі doika
10. Рыхтуем пустую Mysql базу. Адкрываем PhpMyAdmin (127.0.0.1/openserver/phpmyadmin/index.php), ствараем новую БД.
11. Рыхтуем канфіг файл. Для гэтага ў тэчцы doika ствараем копію файла .env.example і надаем яму імя .env
12. Дадаем у файл .env свае дадзеныя, для падключэння к базе, створанай на папярэднім кроку `DB_DATABASE={назва_базы}` `DB_USERNAME=root` (калі не мянялі) `DB_PASSWORD=` (пуста калі не устонаўлівалі пароль)
13. Разгортваем базу дадзеных камандай `php artisan migrate`. Вы павінны запусціць з карнявой дырэкторыі doika
14. Пасля дадаем зыходныя дадзеныя камандай `php artisan db:seed`. Вы павінны запусціць з карнявой дырэкторыі doika
15. Генерым ключ для laravel камандай `php artisan key:generate`. Вы павінны запусціць з карнявой дырэкторыі doika
16. Усталяваная версія павінна запускацца на Вашым лакальным хасце са шляхам http://[host-name]/doika/be/admin/login
17. Выкарыстоўваеце дадзеныя для ўвахода Лагін: `demo@example.com` , Пароль: `demo`

## Разгортванне з дапамогай Docker
* Linux, MacOS
1. Усталяваць Docker https://www.docker.com/get-started
2. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork
3. Дадаем змесціва fork рэпазіторыя ў корань вашага сайта з дапамогай `git clone`. Пераключаемся на dev branch, з дапамогай `git checkout` (напрыклад, `git checkout dev`)
4. Пераходзім ў тачку /doika
5. `sudo make start`
6. `sudo chmod 777 -R storage/`
7. `sudo make install`
8. Праект дасяжны на адрэсе 127.0.0.1 праз браузер.

* Windows
1. Усталяваць Docker https://www.docker.com/get-started
2. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork
3. Дадаем змесціва fork рэпазіторыя ў корань вашага сайта з дапамогай `git clone`. Пераключаемся на dev branch, з дапамогай `git checkout` (напрыклад, `git checkout dev`)
4. Пераходзім ў тачку /doika
5. `makefile.bat start`
6. `makefile.bat install`
7. Праект дасяжны на адрэсе 127.0.0.1 праз браузер.


## Структура праекта (распрацоўваем)
Для чаго патрэбны ключавыя файлы: 
- config - утрымлівае ўсю канфігурацыю Laravel;
- database - міграцыі, сідеры для стварэння базы;
- docker - канфігурацыя докер-кантэйнераў, логі кантэйнераў;
- docs - агульная дакументацыя.
   
**Laravel** 
- public - дырэкторыя сборкі js+scss. Таксама ўтрымлівае малюнкі;
- recources - файлы фронтэнда і лакалізацыя;
- routes - спіс усіх шляхоў, якія апрацоўвае модуль;
- src - зменены і дадатковы код фреймворка, непасрэдны код модуля;
- storage - захоўвае часовые дадзеныя модуля пры выпаўненні;
- tests - тэсты модуля (Unit);
- .dockerignore - спіс дырэкторый, з якіх докер не павінен забіраць дадзеныя;
- .env.docker - канфігурацыя модуля для докер-кантэйнераў;
- .env.example - прыклад файла канфігурацыі модуля;
- .gitignore - спіс тэчак, якія git не павінен пушыць у рэпазіторый;
- .htaccess - дырэктывы для сэрвера apache2;
- .scrutinizer.yml і .travis.yml - файлы канфігурацыі для аўтатэстаў.

**Http**
- Controllers - кантролеры старонак Laravel;
- Middleware - фільтры laravel.

**Makefile**
- Makefile.bat - файлы з камандамі для разгортвання докер-кантэйнераў;
- composer.json - спіс усіх PHP пакетаў, якія выкарыстоўваюцца ў модуле;
- index.php - кропка ўваходу пры выпаўненні кода модуля;
- package.json - спіс npm-пакетаў якія выкарыстоўваюцца ў модуле;
- phpunit.xml - файл канфігурацыі для запуска Юніт-тэстаў;
- webpack.config.js - файл канфігурацыі сборшчыка JS+CSS.
