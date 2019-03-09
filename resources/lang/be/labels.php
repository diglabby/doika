<?php

return [
	'http' => [
		'404' => [
			'title' => '404',
			'description' => ''
		]
	],
    'admin' => [
		'title' => 'Кіраванне',
		'datatables' => [
			'showPerPage' => 'Паказаць',
			'entriesPerPage' => 'запісаў на старонке',
			'search' => 'Пошук',
			'actions' => 'Дзеянні',
			'info' => 'Даведка'
		],
		'common' => [
			'search' => 'Пошук',
			'footer' => [
				'left' => 'Powered by',
				'with' => 'with',
				'by' => 'by',
				'supporter' => 'Supported by the European Union'
			],
			'confirmation' => 'Вы ўпэўнены?'
		],
		'newMenu' => [
			'header' => 'Дадаць',
			'campaign' => 'Новая кампанія',
            'user' => 'Новы карыстальнік'
		],
		'languageMenu' => [
			'header' => 'Мова',
			'be' => 'Беларуская',
            'ru' => 'Руская',
			'en' => 'Английская'
		],
		'accountMenu' => [
			'header' => 'Профіль',
			'avatar' => 'Аватар карыстальніка',
			'logout' => 'Выйсці'
		],
		'rightMenu' => [
			'divider' => [
				'configuration' => 'Канфігурацыя модуля',
				'access' => 'Кіраванне доступам',
				'help' => 'FAQ',
				'feedback' => 'Зваротная сувязь'
			],
		],
        'login' => [
            'title' => 'Уваход у сістэму',
            'email' => 'E-mail адрас',
            'placeholder' => [
                'email' => 'E-mail адрас',
                'password' => 'Пароль',
            ],
            'password' => 'Пароль',
            'remember' => 'Запомніць мяне',
            'reset' => [
				'link' => 'Забыліся пароль?',
				'title' => 'Скід пароля',
				'submit' => 'Адправіць спасылку на скід пароля',
				'header' => 'Лагін'
			],
            'header' => 'Лагін'
        ],
		'campaigns' => [
			'title' => 'Спіс кампаній',
			'header' => 'Спіс кампаній',
			'breadcrumb' => 'Спіс кампаній',
			'name' => 'Назва кампаніі',
            'status' => 'Статус кампаніі',
			'backers' => 'Ахвярадаўцы',
			'recurrent' => 'Падпіска',
			'average' => 'Сярэдні чэк',
			'recieved' => 'Сабраная сума',
			'goal' => 'Мэтавая сума',
			'days' => 'Колькасць дзён да заканчэння',
			'description' => 'Апісанне',
			'image' => 'Выява кампаніі',
			'uploadImage' => 'Загрузіць малюнак',
			'allowedImageTypes' => 'Магчымы фармат: png gif jpg jpeg.',
			'paymentSystem' => 'Плацёжная сістэма',
			'startAt' => 'Дата пачатку',
			'finishAt' => 'Дата заканчэння',
			'colors' => 'Канфігурацыя колераў',
			'preview' => 'Прагляд кампаніі',
			'active' => 'Дзеючая',
			'topBanner' => 'Верхні банэр',
			'progressBar' => 'Паласа прагрэсу',
			'options' => 'Параметры',
			'placeholder' => [
				'shortcode' => 'Шорткод',
				'header' => 'Стварыць кампанію',
				'breadcrumb' => 'Стварыць',
				'name' => 'Назва',
				'image' => 'Файл не абраны',
			],
			'create' => [
				'title' => 'Стварыць кампанію',
				'header' => 'Стварыць кампанію',
				'breadcrumb' => 'Стварыць кампанію',
			],
			'edit' => [
				'title' => 'Рэдагаваць кампанію',
				'header' => 'Рэдагаваць кампанію',
				'breadcrumb' => 'Рэдагаваць',
			]
		],
		'payments' => [
			'title' => 'Спіс ахвяраванняў',
			'header' => 'Спіс ахвяраванняў',
			'breadcrumb' => 'Спіс ахвяраванняў',
			'date' => 'Дата',
			'campaign' => 'Кампанія',
			'amount' => 'Сума',
			'backer' => 'Ахвярадаўца',
			'recurrent' => 'Падпіска на кампанію',
			'status' => 'Статус аплаты',
			'backerStatus' => 'Статус карты',
			'statuses' => [
				'success' => 'Паспяхова',
				'failed' => 'Не паспяхова',
				'error' => 'Не завершана'
			],
			'show' => [
				'title' => 'Паказаць плацёж',
				'header' => 'Паказаць плацёж',
				'breadcrumb' => 'Паказаць',
			],
			'placeholder' => [
				'date' => 'Дата',
				'campaign' => 'Кампанія',
				'amount' => 'Сума',
				'backer' => 'Ахвярадаўца',
				'recurrent' => 'Падпіска на кампанію',
				'status' => 'Статус аплаты',
				'backerStatus' => 'Статус карты',
			],
		],
		'settings' => [
			'title' => 'Налады',
			'payments' => [
				'header' => 'Злучэнне з плацежнай сістэмай',
				'idMarket' => 'Bepaid Market ID',
				'keyMarket' => 'Bepaid Market key',
				'test' => 'Адключыць тэставыя плацяжы',
				'maxPayment' => 'Максімальны плацёж, бел.руб',
				'minPayment' => 'Мінімальны плацёж, бел.руб',
				'termsOfUse' => 'Текст условий сервиса сбора пожертвований',
				'placeholder' => [
					'idMarket' => 'Bepaid Market ID',
					'keyMarket' => 'Bepaid Market key',
					'test' => 'Адключыць тэставыя плацяжы',
					'maxPayment' => 'Максімальны плацёж, бел.руб',
					'minPayment' => 'Мінімальны плацёж, бел.руб',
				]
			],
			'layout' => [
				'header' => 'Параметры макета'
			],
			'notifications' => [
				'address' => 'Адрас сервера',
				'port' => 'Порт сервера',
				'user' => 'Карыстальнік электронная пошты',
				'password' => 'Пароль',
				'email' => 'Адрас электроннай пошты',
				'header' => 'Наладка паведамленняў',
				'reccurentTemplate' => 'Шаблон электроннага ліста для рэкурэнтных плацяжоў',
				'singleTemplate' => 'Удзячнасць за зроблены плацеж на пошту',
				'placeholder' => [
					'address' => 'Адрас сервера',
					'port' => 'Порт сервера',
					'user' => 'Карыстальнік электронная пошты',
					'password' => 'Пароль',
					'email' => 'Адрас электроннай пошты',
				]
			]
		],
		'help' => [
			'title' => 'FAQ',
            'header' => 'Як карыстацца модулям'
		],
		'feedback' => [
			'title' => 'Зваротная сувязь',
			'header' => 'Зваротная сувязь',
			'email' => 'Ваш Email',
			'name' => 'Імя',
			'message' => 'Паведамленне',
			'placeholder' => [
				'email' => 'Ваш Email',
				'name' => 'Імя',
				'message' => 'Напішыце Ваш зварот'
			]
		],
		'users' => [
			'title' => 'Спіс карыстальнікаў',
			'breadcrumb' => 'Спіс карыстальнікаў',
			'header' => 'Спіс карыстальнікаў',
			'email' => 'E-mail',
			'name' => 'Імя',
			'active' => 'Дзеючая',
			'createdAt' => 'Дата стварэння',
			'updatedAt' => 'Дата абнаўлення',
			'message' => 'Паведамленне',
			'password' => 'Пароль',
			'passwordConfirmation' => 'Паўтарыце пароль',
			'placeholder' => [
				'email' => 'E-mail',
				'name' => 'Імя',
				'message' => 'Напішыце Ваша паведамленне',
				'password' => 'Пароль'
			],
			'create' => [
				'breadcrumb' => 'Стварыць',
				'header' => 'Стварыць карыстальніка'
			],
			'edit' => [
				'breadcrumb' => 'Рэдагаваць',
				'header' => 'Рэдагаванне карыстальніка'
			]

		]
    ],
	'client' => [
		'title' => 'Дадзеныя карыстальніка',
		'name' => 'Імя Прозвішча',
		'email' => 'Пошта',
		'phone' => 'Тэлефон',
		'mask' => '(+375)',
		'termsOfUse' => 'Я згодны/згодна з правіламі карыстання',
		'paymentInfo' => 'Terms of Use',
		'input' => 'Сума',
		'recieved' => 'Сабраная сума',
		'needed' => 'Мэтавая сума',
		'thanks' => 'Вялікі дзякуй за дапамогу!'
	]
];
