<?php

return [
	'http' => [
		'404' => [
			'title' => '404',
			'description' => ''
		]
	],
    'admin' => [	
		'title' => 'Administration',
		'datatables' => [
			'showPerPage' => 'Show',
			'entriesPerPage' => 'entries per page',
			'search' => 'Search',
			'actions' => 'Actions',
			'info' => ''
		],		
		'common' => [
			'search' => 'Поиск',
			'footer' => [
				'left' => 'Powered by',
				'with' => 'with',
				'by' => 'by',
				'supporter' => 'Supported by the European Union'
			],
			'confirmation' => 'Are you sure?'
		],	
		'newMenu' => [
			'header' => 'Добавить',
			'campaign' => 'Новая кампания',
            'user' => 'Новый пользователь'
		],
		'languageMenu' => [
			'header' => 'Язык', 
			'be' => 'Белорусский',
            'ru' => 'Русский',
			'en' => 'Английский'
		],
		'accountMenu' => [
			'header' => 'Профиль',
			'avatar' => 'Аватар пользователя',
			'logout' => 'Выйти'            
		],
		'rightMenu' => [			
			'divider' => [
				'configuration' => 'Конфигурация модуля',
				'access' => 'Управление доступом',
				'help' => 'FAQ',
				'feedback' => 'Обратная связь'
			],			      
		],
        'login' => [
            'title' => 'Вход в систему',
            'email' => 'E-mail адрес',
            'placeholder' => [
                'email' => 'E-mail адрес',
                'password' => 'Пароль',
            ],
            'password' => 'Пароль',
            'remember' => 'Запомнить меня',
            'reset' => [
				'link' => 'Забыли пароль?',
				'title' => 'Сброс пароля',
				'submit' => 'Отправить ссылку на сброс пароля',
				'header' => 'Логин'
			],
            'header' => 'Логин'
        ],
		'campaigns' => [
			'title' => 'Список кампаний',
			'header' => 'Список кампаний',
			'breadcrumb' => 'Список кампаний',
			'name' => 'Название кампании',
            'status' => 'Статус кампании',
			'backers' => 'Жертвователи',
			'recurrent' => 'Подписка',
			'average' => 'Средний чек',
			'recieved' => 'Собранная сумма',
			'goal' => 'Целевая сумма',
			'days' => 'Количество дней до окончания',
			'description' => 'Description',
			'image' => 'Title image',
			'uploadImage' => 'Upload image',
			'allowedImageTypes' => 'Allowed types: png gif jpg jpeg.',
			'paymentSystem' => 'Payment system',
			'startAt' => 'Start at',
			'finishAt' => 'Finish at',
			'colors' => 'Colors configuration',
			'preview' => 'Campaign preview',
			'active' => 'Active',
			'topBanner' => 'Top banner',
			'progressBar' => 'Progress bar',
			'options' => 'Options',			
			'placeholder' => [
				'shortcode' => 'Shortcode',
				'header' => 'Create campaign',
				'breadcrumb' => 'Create',
				'name' => 'Title',
				'image' => 'No file chosen',				
			],
			'create' => [
				'title' => 'Создать кампанию',
				'header' => 'Создать кампанию',
				'breadcrumb' => 'Создать кампанию',
			],
			'edit' => [
				'title' => 'Edit campaign',
				'header' => 'Edit campaign',
				'breadcrumb' => 'Edit',
			]
		],
		'payments' => [			
			'title' => 'Список пожертвований',
			'header' => 'Список пожертвований',
			'breadcrumb' => 'Список пожертвований',
			'date' => 'Дата',
			'campaign' => 'Кампания',
			'amount' => 'Сумма',
			'backer' => 'Жертвователь',
			'recurrent' => 'Подписка на кампанию',
			'status' => 'Статус оплаты',
			'backerStatus' => 'Статус карты',
			'statuses' => [
				'success' => 'Успешно',
				'failed' => 'Не успешно',
				'error' => 'Не завершено'
			],			
			'show' => [
				'title' => 'Показать платеж',
				'header' => 'Показать платеж',
				'breadcrumb' => 'Показать',
			],
			'placeholder' => [
				'date' => 'Дата',
				'campaign' => 'Кампания',
				'amount' => 'Сумма',
				'backer' => 'Жертвователь',
				'recurrent' => 'Подписка на кампанию',
				'status' => 'Статус оплаты',
				'backerStatus' => 'Статус карты',			
			],
		],
		'settings' => [	
			'title' => 'Настройки',		
			'payments' => [
				'header' => 'Объединение с платёжной системой',
				'idMarket' => 'Bepaid Market ID',
				'keyMarket' => 'Bepaid Market key',
				'test' => 'Отключить тестовые платежи',
				'maxPayment' => 'Максимальный платеж, бел.руб',
				'minPayment' => 'Минимальный платеж, бел.руб',
				'termsOfUse' => 'Текст условий сервиса сбора пожертвований',
				'placeholder' => [
					'idMarket' => 'Bepaid Market ID',
					'keyMarket' => 'Bepaid Market key',
					'test' => 'Отключить тестовые платежи',
					'maxPayment' => 'Максимальный платеж, бел.руб',
					'minPayment' => 'Минимальный платеж, бел.руб',
				]
			],			
			'layout' => [
				'header' => 'Параметры макета'				
			],	
			'notifications' => [
				'address' => 'Адрес сервера',
				'port' => 'Порт сервера',
				'user' => 'Пользователь электронной почты',
				'password' => 'Пароль',
				'email' => 'Адрес электронной почты',
				'header' => 'Настройка сообщений',
				'reccurentTemplate' => 'Шаблон электронного письма для рекуррентных платежей',
				'singleTemplate' => 'Благодарность за сделанный платеж на почту',
				'placeholder' => [
					'address' => 'Адрес сервера',
					'port' => 'Порт сервера',
					'user' => 'Пользователь электронной почты',
					'password' => 'Пароль',
					'email' => 'Адрес электронный почты',					
				]					
			]			
		],
		'help' => [
			'title' => 'FAQ',            
            'header' => 'Как пользоваться модулем'
		],
		'feedback' => [
			'title' => 'Обратная связь',
			'header' => 'Обратная связь',
			'email' => 'E-mail',
			'name' => 'Имя',
			'message' => 'Сообщение',
			'placeholder' => [
				'email' => 'E-mail',
				'name' => 'Имя',
				'message' => 'Напишите Ваше обращение'
			]
		],
		'users' => [
			'title' => 'Список пользователей',
			'breadcrumb' => 'Список пользователей',
			'header' => 'Список пользователей',
			'email' => 'E-mail',
			'name' => 'Имя',
			'active' => 'Действующая',
			'createdAt' => 'Дата создания',
			'updatedAt' => 'Дата обновления',
			'message' => 'Сообщение',
			'password' => 'Пароль',
			'passwordConfirmation' => 'Повторите пароль',
			'placeholder' => [
				'email' => 'E-mail',
				'name' => 'Имя',
				'message' => 'Напишите Ваше сообщение',
				'password' => 'Password'
			],
			'create' => [
				'breadcrumb' => 'Создать',
				'header' => 'Создать пользователя'
			],
			'edit' => [
				'breadcrumb' => 'Редактировать',
				'header' => 'Редактирование пользователя'
			]
			
		]
    ],
	'client' => [
		'paymentInfo' => 'Terms of Use',
		'input' => 'Summ',
		'recieved' => 'Recieved',
		'needed' => 'Needed'
	]
];
