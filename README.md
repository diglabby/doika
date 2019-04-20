[![Build Status](https://travis-ci.org/diglabby/doika.svg?branch=dev)](https://travis-ci.org/diglabby/doika) [![StyleCI](https://github.styleci.io/repos/137777868/shield?branch=develop)](https://github.styleci.io/repos/137777868)

Doika - модуль, які дапамагае прымаць ахвяраванні з дапамогай банкаўскіх картак і наладзіць новы падыход у фандрэйзінгу беларускіх некамерцыйных грамадскіх арганізацый на сваіх сайтах

## Бягучыя задачы праекта

1. Рэфактарынг кода iтэрацыi 1.2 для пераносу на бягучую (1.3) iтэрацыю. Перанос фронтэнда на vue.js
2. Дэталізуем (абмяркоўваем) задачы па [накірунках](https://github.com/diglabby/doika/milestones)
3. Вывучаем API BePaid [рэкурэнтные плацяжы](https://docs.bepaid.by/ru/subscriptions/intro)

## Як пачаць распрацоўку?
1. Праглядзець статус і роадмэп распрацоукi праекта на старонцы [milestones](https://github.com/diglabby/doika/milestones?direction=asc&sort=due_date&state=open).
2. Як разгарнуць лакальны асяродак для распрацоўкі [інструкцыя] (TODO).
3. Праглядзець [дакументацыю](https://realtimeboard.com/app/board/o9J_k0X88dM=/). 
- [Архiтэктура файлаў i базы](https://realtimeboard.com/app/board/o9J_k0X88dM=/?moveToWidget=3074457346027045333)
- [Блок-схемы](https://realtimeboard.com/app/board/o9J_k0X88dM=/?moveToWidget=3074457346144718504)
- [Спiс класаў](https://realtimeboard.com/app/board/o9J_k0X88dM=/?moveToWidget=3074457346135802429)
- [Вiкi](https://github.com/diglabby/doika/wiki/) Частка "для распрацоўшчыкаў".
- Пры з'яўленні пытанняў і цяжкасцей запытаць у Slack бягучых удзельнікаў каманды: @fr0zen, @tyuba4, @Сёмка, @SvetaN (інвайт у канал Slack магчыма атрымаць звярнуўшыся да нас праз [форму](https://docs.google.com/forms/d/e/1FAIpQLSf3q7HMtfJly4wCrRyIlHDdAzFExSjw2vqbA62XFJHofjMqjg/viewform)).
- Увага! Робім пул рэквэсты ў галіну develop.

[Як зрабіць свой унёсак](CONTRIBUTING.md)

## Патрабаванні да распрацоўкі

* [Apache](https://httpd.apache.org/download.cgi) (rewrite _mod on, for virtual host directory too: AllowOverride All )
* MySQL >= 5.5 PostgreSQL, SQLite, MSSQL Server [Поўны спіс](https://laravel.com/docs/5.8/database)
* PHP >= 7.1.3
* OpenSSL PHP Extension, PDO PHP Extension, Mbstring PHP Extension, Tokenizer PHP Extension, XML PHP Extension, Ctype PHP Extension, JSON PHP Extension, BCMath PHP Extension, Sqlite3
* На базе фрэймворка Laravel 5.8 (для усталёўкі патрэбны Composer)
* [Кодынг-стандарт](https://github.com/diglabby/doika/wiki/%D0%9A%D0%BE%D0%B4%D1%8B%D0%BD%D0%B3-%D1%81%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82) 
* [Composer](https://getcomposer.org/download/)
* [Node](https://nodejs.org/en/download/) версія >= 8.10, npm >=5.6.0
* Увага! Працуем з рэквэстамі (Pull request) на гітхабе у галіну `develop` (!)

## Распрацоўшчыку. Устаноўка 

## linux

1. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork
2. Дадаем змесціва fork рэпазіторыя ў корань вашага сайта з дапамогай git clone. Пераключаемся на `develop` branch, з дапамогай git checkout (напрыклад, `git checkout develop`)
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
11. Усталяваная версія павінна запускацца на Вашым лакальным хасце са шляхам http://[host-name]/doika/doika/dashboard/login
12. Выкарыстоўваеце дадзеныя для ўвахода Лагін: demo@example.com , Пароль: password

## win (Open Server)

1. Адкрыць налады Open Server(min PREMIUM edition), укладка дамены, ручное кіраванне, напісаць імя дамена, на прыклад doika, папка дамена выбраць localhost
2. Адкрыць укладку сервер, налады выкарыстання зменнай Path выбраць `Свой Path + Win Path`, паставіць каўку ў чэк-боксе `запускаць сервер ў агрэсіўным рэжыме`
3. Адкрыць ўкладку модулі, выбраць Apache 7.2, PHP 7.2, MySQL 5.7, захоўваем, запускаем сервер
4. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork. Націскаем clone or download і капіруем адрас
5. Запускаем кансоль git из Open Server (мае закладкі - Git-CMD). З кансолі заходзім у тэчку localhost (напрыклад, cd d:\OSPanel\domains\localhost {шлях да тэчцы localhost}) і клоніруем туды праект пры дапамозе git clone  (git clone https://github.com/diglabby/doika.git)
6. Заходзім з кансолі ў тэчку doika (каманда cd doika) і пры дапамозе гіт пераключаемся на `develop` branch (`git checkout develop`)
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
3. Дадаем змесціва fork рэпазіторыя ў корань вашага сайта з дапамогай `git clone`. Пераключаемся на `develop` branch, з дапамогай `git checkout` (напрыклад, `git checkout develop`)
4. Пераходзім ў тачку /doika
5. `sudo make start`
6. `sudo chmod 777 -R storage/`
7. `sudo make install`
8. Праект дасяжны на адрэсе 127.0.0.1 праз браузер.

* Windows
1. Усталяваць Docker https://www.docker.com/get-started
2. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork
3. Дадаем змесціва fork рэпазіторыя ў корань вашага сайта з дапамогай `git clone`. Пераключаемся на `develop` branch, з дапамогай `git checkout` (напрыклад, `git checkout develop`)
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
- resources - файлы фронтэнда і лакалізацыя;
- routes - спіс усіх шляхоў, якія апрацоўвае модуль;
- src - зменены і дадатковы код фреймворка, непасрэдны код модуля;
- storage - захоўвае часовые дадзеныя модуля пры выпаўненні;
- tests - тэсты модуля (Unit);
- .dockerignore - спіс дырэкторый, з якіх докер не павінен забіраць дадзеныя;
- .env.docker - канфігурацыя модуля для докер-кантэйнераў;
- .env.example - прыклад файла канфігурацыі модуля;
- .gitignore - спіс тэчак, якія git не павінен пушыць у рэпазіторый;
- .htaccess - дырэктывы для сэрвера apache2;
- .travis.yml - файл канфігурацыі для аўтатэстаў.

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

## Што трэба каб паставіць модуль?
* З арганізацыйнага боку: Арганізацыя павінна мець афіцыйную дзяржаўную рэгістрацыю, некамерцыйны статус (арт. 553 Грамадзянскага кодэкса РБ: ахвяраванні могуць прымаць толькі некамерцыйныя арганізацыі ) і рахунак у любым беларускім банку. Збор сродкаў ад фізічных асобаў можа ажыцяўляцца на любую мэту, якая не супярэчыць статутнай мэце некамерцыйнай арганізацыі.
* З юрыдычнага боку: Дамен грамадскай арганізацыі павінен быць абавязкова зарэгістраваны на юрыдычную асобу і прайсці рэгістрацыю ў БЕЛДІЭ – дзяржаўнай інспекцыі Рэспублікі Беларусь па электрасувязі Міністэрства сувязі і інфарматызацыі Рэспублікі Беларусь. Галоўная ўмова рэгістрацыі: размяшчэнне сайта на хостынгу на тэрыторыі Беларусі.
* З тэхнічнага боку: Для забеспячення бяспекі плацежных дадзенных на Вашай старонцы з модулем мы рэкамендуем выкарыстоўваць пратакол https. Сэрверны асяродак: apache, php, mysql.

## Як паставіць модуль?
Апошняя версія і падрабязная інструкцыя па ўсталёўцы Doika_1.2 знаходзіцца [тут](https://github.com/diglabby/doika_1.2/wiki/%D0%A3%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D1%9E%D0%BA%D0%B0-%D0%BC%D0%BE%D0%B4%D1%83%D0%BB%D1%8F-%D0%BD%D0%B0-%D1%85%D0%BE%D1%81%D1%82%D1%8B%D0%BD%D0%B3). 

## Ліцэнзіі і абмежаванні
Выкарыстоўваем наступныя ліцэнзіі:
* [GNU GPL 3.0](https://www.gnu.org/licenses/gpl-3.0.en.html) - для напісанага ў праекце кода
* [Creative Commons Attribution Share-Alike](https://choosealicense.com/licenses/cc-by-sa-4.0/) - для ўсяго кантэнта у тым ліку выяваў, тэхнічнай дакументацыі

Прадукт распаўсюджваецца "як ёсць". Гэта значыць, любыя мадыфікацыі вы робіце самастойна або дамаўляецеся з камандай распрацоўшчыкаў на пэўны кошт (falanster.by@gmail.com).

## Карысныя спасылкі
* [Прэзентацыйная ўэб-старонка](https://doika.falanster.by/)
* [Прэзентацыя у паўэрпоінт](https://docs.google.com/presentation/d/144zEv4DyBoa0jDKwee30Rip0oKZ8QzkeUKaNCRWy1qY/edit#slide=id.g42bd4a5055_0_28)


## У мяне засталіся пытанні...
Заходзьце на старонку з найбольш частымі пытаннямі па праэкту Doika [FAQ](https://github.com/diglabby/doika/wiki/FAQ)

