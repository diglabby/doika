# doika
Модуль прыема ахвяраванняў для некамерцыйных арганізацый метадам эквайрынга.

1. Заходзім у рэпазіторый https://github.com/diglabby/doika.git і ствараем для сябе fork
2. Дадаем змесціва fork рэпазіторыя ў корань вашага сайта з дапамогай git clone. Пераключаемся на  dev branch, з дапамогай git checkout (напрыклад, git checkout dev)
3. Імпартуем файл doika.sql у базу дадзеных. 
4. Рыхтуем канфіг файл. Для гэтага ў тэчцы doika ствараем копію файла .env.example і надаем яму імя .env
5. Дадаем у файл .env свае дадзеныя DB_DATABASE={your_database} DB_USERNAME={your_username} DB_PASSWORD={your_password}