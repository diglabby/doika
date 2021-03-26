<?php

return [
    'http' => [
        '404' => [
            'title' => '404',
            'description' => 'Сталася помилка - сторінка не знайдена',
        ],
    ],
    'emailserver' => 'Поштовий сервер',
    'recurrent' => 'Підписка',
    'single' => 'Одноразовий платіж',

    'admin' => [
        'title' => 'Управління',
        'datatables' => [
            'showPerPage' => 'Показати',
            'entriesPerPage' => 'Записів на сторінці',
            'search' => 'Пошук',
            'actions' => 'Дія',
            'info' => 'Довідка',
        ],
        'common' => [
            'search' => 'Пошук',
            'footer' => [
                'left' => 'Powered by',
                'with' => 'with',
                'by' => 'by',
            ],
            'confirmation' => 'Ви впевнені?',
        ],
        'newMenu' => [
            'header' => 'Додати',
            'campaign' => 'Нова кампанія',
            'user' => 'Новий користувач',
        ],
        'languageMenu' => [
            'header' => 'Мова',
            'be' => 'Беларуская',
            'ru' => 'Русский',
            'en' => 'English',
            'ua' => 'Українська',
        ],
        'accountMenu' => [
            'header' => 'Профіль',
            'avatar' => 'Аватар користувача',
            'logout' => 'Вийти',
        ],
        'rightMenu' => [
            'divider' => [
                'configuration' => 'Конфігурація модуля',
                'access' => 'Управління доступом',
                'help' => 'Часті питання',
                'feedback' => 'Зворотній зв\'язок',
            ],
        ],
        'login' => [
            'title' => 'Вхід у систему',
            'email' => 'E-mail адреса',
            'placeholder' => [
                'email' => 'E-mail адреса',
                'password' => 'Пароль',
            ],
            'password' => 'Пароль',
            'remember' => 'Запам\'ятати мене',
            'reset' => [
                'link' => 'Забули пароль?',
                'title' => 'Сброс пароля',
                'submit' => 'Надіслати посилання на скидання пароля',
                'header' => 'Логін',
            ],
            'header' => 'Логін',
        ],
        'campaigns' => [
            'title' => 'Список кампаній',
            'header' => 'Список кампаній',
            'breadcrumb' => 'Список кампаній',
            'name' => 'Назва кампанії',
            'status' => 'Статус кампанії',
            'backers' => 'Благодійники',
            'recurrent' => 'Підписка',
            'average' => 'Середній чек',
            'received' => 'Зібрана сума',
            'goal' => 'Цільова сума',
            'days' => 'Кількість днів до завершення',
            'description' => 'Опис',
            'image' => 'Зображення для кампанії',
            'uploadImage' => 'Загрузить изображение',
            'proportionsImage' => '(Оптимальне співвідношення сторін 2х1)',
            'allowedImageTypes' => 'Допустимий формат: png gif jpg jpeg.',
            'paymentSystem' => 'Платіжна система',
            'startAt' => 'Дата початку',
            'finishAt' => 'Дата закінчення',
            'colors' => 'Конфігурація кольорів',
            'preview' => 'Перегляд кампанії',
            'active' => 'Діюча',
            'amount' => 'Необхідна сума',
            'topBanner' => 'Верхній банер',
            'progressBar' => 'Смуга прогресу',
            'options' => 'Параметри',
            'placeholder' => [
                'shortcode' => 'Шорткод',
                'header' => 'Створити кампанію',
                'breadcrumb' => 'Створити',
                'name' => 'Назва',
                'image' => 'Файл не вибран',
                'amount' => 'Сума гривень',
            ],
            'create' => [
                'title' => 'Створити кампанію',
                'header' => 'Створити кампанію',
                'breadcrumb' => 'Створити кампанію',
            ],
            'edit' => [
                'title' => 'Редагувати кампанію',
                'header' => 'Редагувати кампанію',
                'breadcrumb' => 'Редагувати',
            ],
        ],
        'transactions' => [
            'title' => 'Список пожертв',
            'header' => 'Список пожертв',
            'breadcrumb' => 'Список пожертв',
            'date' => 'Дата',
            'campaign' => 'Кампанія',
            'amount' => 'Сума',
            'backer' => 'Благодійник',
            'recurrent' => 'Підписка на кампанію',
            'currency' => 'Валюта',
            'created_at' => 'Дата створення',
            'status' => 'Статус оплати',
            'backerStatus' => 'Статус карти',
            'statuses' => [
                'success' => 'Успішно',
                'failed' => 'Не успішно',
                'error' => 'Не завершено',
            ],
            'show' => [
                'title' => 'Показати платіж',
                'header' => 'Показати платіж',
                'breadcrumb' => 'Показати',
            ],
            'placeholder' => [
                'date' => 'Дата',
                'campaign' => 'Кампанія',
                'amount' => 'Сума',
                'backer' => 'Пожертвувач',
                'recurrent' => 'Підписка на кампанію',
                'status' => 'Статус оплати',
                'backerStatus' => 'статус карти',
            ],
        ],
        'paymentSystems' => [
            'title' => 'Еквайрінг',
        ],
        'layout' => [
            'title' => 'Зовнішній вигляд',
            'font' => 'Колір шрифту',
            'background' => 'Колір фону',
            'progressBar' => 'Колір полоси виконання',
            'button' => 'Колір кнопок',
        ],
        'notifications' => [
            'title' => 'Повідомлення',
            'name' => 'Назва повідомлення',
            'text' => 'Коротко опишіть зміст повідомлення',
            'caution' => 'Видалена кампанія не відновиться. Усі підписки будуть призупинені!',
        ],
        'settings' => [
            'title' => 'Налаштування',
            'payments' => [
                'header' => 'Інтеграція з платіжною системою',
                'bePaidIdMarket' => 'Bepaid Market ID',
                'artPayIdMarket' => 'Artpay Market Id',
                'bePaidKeyMarket' => 'Bepaid Market key',
                'artPayKeyMarket' => 'Artpay Market key',
                'paymentInterval' => 'Абярыце інтэрвал рэкурэнтага плацяжу',
                'paymentInterval1D' => '1 день',
                'paymentInterval1H' => '1 час',
                'paymentInterval1M' => '1 місяць',
                'paymentInterval1Y' => '1 рік',
                'test' => 'Відключити тестові платежі',
                'maxPayment' => 'Максимальний платіж, гривень',
                'minPayment' => 'Мінімальний платіж, гривень',
                'termsOfUse' => 'Текст умов сервісу збору пожертв',
                'placeholder' => [
                    'bePaidIdMarket' => 'Bepaid Market ID',
                    'artPayIdMarket' => 'Artpay Market Id',
                    'bePaidKeyMarket' => 'Bepaid Market key',
                    'artPayKeyMarket' => 'Artpay Market key',
                    'test' => 'Відключити тестові платежі',
                    'maxPayment' => 'Максимальний платіж, гривень',
                    'minPayment' => 'Мінімальний платіж, гривень',
                ],
            ],
            'layout' => [
                'header' => 'Параметри макета',
            ],
            'notifications' => [
                'address' => 'Адреса сервера',
                'port' => 'Порт сервера',
                'user' => 'Користувач електронної пошти',
                'password' => 'Пароль',
                'email' => 'Адреса електронної пошти',
                'header' => 'Налаштування повідомлень',
                'reccurentTemplate' => 'Шаблон електронного листа для регулярних платежів',
                'singleTemplate' => 'Подяка за зроблений платіж на пошту',
                'placeholder' => [
                    'address' => 'Адреса сервера',
                    'port' => 'Порт сервера',
                    'user' => 'Користувач електронної пошти',
                    'password' => 'Пароль',
                    'email' => 'Адреса електронної пошти',
                ],
            ],
        ],
        'help' => [
            'title' => 'Часті питання',
            'header' => 'Як користуватися модулем',
        ],
        'feedback' => [
            'title' => 'Зворотній зв\'язок',
            'header' => 'Зв\'язок',
            'email' => 'Ваш Email',
            'name' => 'Ім\'я',
            'message' => 'Повідомлення',
            'placeholder' => [
                'email' => 'Ваш Email',
                'name' => 'Ім\'я',
                'message' => 'Напишіть Ваше звернення',
            ],
        ],
        'users' => [
            'title' => 'Список користувачів',
            'breadcrumb' => 'Список користувачів',
            'header' => 'Список користувачів',
            'email' => 'E-mail',
            'name' => 'Ім\'я',
            'active' => 'Діюча',
            'createdAt' => 'Дата створення',
            'updatedAt' => 'дата оновлення',
            'message' => 'Повідомлення',
            'password' => 'Пароль',
            'passwordConfirmation' => 'Повторіть пароль',
            'placeholder' => [
                'email' => 'E-mail',
                'name' => 'Ім\'я',
                'message' => 'Напишіть Ваше звернення',
                'password' => 'Пароль',
                'passwordConfirmation' => 'Повторіть пароль',
            ],
            'create' => [
                'breadcrumb' => 'Створити',
                'header' => 'Створити користувача',
            ],
            'edit' => [
                'breadcrumb' => 'Редагувати',
                'header' => 'Редагувати користувача',
            ],

        ],
    ],
    'widget' => [
        'title' => 'Дані користувача',
        'name' => 'Ім\'я Прізвище',
        'email' => 'email',
        'phone' => 'Телефон',
        'mask' => '(+380)',
        'input' => 'Iнша сума',
        'invalidFeedback' => 'Введіть суму платежу',
        'received' => 'Зібрана сума',
        'needed' => 'Цільова сума',
        'thanks' => 'Щиро дякуємо за допомогу!',
        'paymentInfo' => 'Я згоден з правилами',
        'terms' => 'Правила данейта',
    ],
];
