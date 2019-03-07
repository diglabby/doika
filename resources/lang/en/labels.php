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
			'search' => 'Search',
			'footer' => [
				'left' => 'Powered by',
				'with' => 'with',
				'by' => 'by',
				'supporter' => 'Supported by the European Union'
			],
			'confirmation' => 'Are you sure?'
		],
		'newMenu' => [
			'header' => 'Add',
			'campaign' => 'New campaign',
            'user' => 'New user'
		],
		'languageMenu' => [
			'header' => 'Language',
			'be' => 'Belarussian',
            'ru' => 'Russian',
			'en' => 'English'
		],
		'accountMenu' => [
			'header' => 'My profile',
			'avatar' => 'User avatar',
			'logout' => 'Logout'
		],
		'rightMenu' => [
			'divider' => [
				'configuration' => 'MODULE CONFIGURATION',
				'access' => 'ACCESS MANAGEMENT',
				'help' => 'FAQ',
				'feedback' => 'FEEDBACK'
			],
		],
        'login' => [
            'title' => 'Administration',
            'email' => 'Email',
            'placeholder' => [
                'email' => 'Email',
                'password' => 'Password',
            ],
            'password' => 'Password',
            'remember' => 'Remember',
            'reset' => [
				'link' => 'Forget password?',
				'title' => 'Password reset',
				'submit' => 'Send reset password link',
				'header' => 'Login'
			],
            'header' => 'Login'
        ],
		'campaigns' => [
			'title' => 'Campaigns',
			'header' => 'Campaigns List',
			'breadcrumb' => 'Campaigns',
			'name' => 'Title',
            'status' => 'Status',
			'backers' => 'Backers',
			'recurrent' => 'Recurrent',
			'average' => 'Average',
			'recieved' => 'Recieved',
			'goal' => 'Goal',
			'days' => 'Days',
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
				'title' => 'Create campaign',
				'header' => 'Create campaign',
				'breadcrumb' => 'Create',
			],
			'edit' => [
				'title' => 'Edit campaign',
				'header' => 'Edit campaign',
				'breadcrumb' => 'Edit',
			]
		],
		'payments' => [
			'title' => 'Payments',
			'header' => 'Payments list',
			'breadcrumb' => 'Payments',
			'date' => 'Date',
			'campaign' => 'Campaign',
			'amount' => 'Amount',
			'backer' => 'Backer',
			'recurrent' => 'Recurrent',
			'status' => 'Payment status',
			'backerStatus' => 'Backer status',
			'statuses' => [
				'success' => 'Success',
				'failed' => 'Failed',
				'error' => 'Error'
			],
			'show' => [
				'title' => 'Show payment',
				'header' => 'Show payment',
				'breadcrumb' => 'Show',
			],
			'placeholder' => [
				'date' => 'Date',
				'campaign' => 'Campaign',
				'amount' => 'Amount',
				'backer' => 'Backer',
				'recurrent' => 'Recurrent',
				'status' => 'Payment status',
				'backerStatus' => 'Backer status',
			],
		],
		'settings' => [
			'title' => 'Settings',
			'payments' => [
				'header' => 'Payment systems options',
				'idMarket' => 'Bepaid Market Id',
				'artPayIdMarket' => 'Artpay Market Id',
				'keyMarket' => 'Bepaid Market key',
				'artPayKeyMarket' => 'Artpay Market key',
				'test' => 'Turn off test payments',
				'maxPayment' => 'Max payment amount',
				'minPayment' => 'Min payment amount',
				'termsOfUse' => 'Terms of use',
				'placeholder' => [
					'idMarket' => 'Bepaid Market Id',
					'artPayIdMarket' => 'Artpay Market Id',
					'keyMarket' => 'Bepaid Market key',
					'artPayKeyMarket' => 'Artpay Market key',
					'test' => 'Turn off test payments',
					'maxPayment' => 'Max payment amount',
					'minPayment' => 'Min payment amount',
				]
			],
			'layout' => [
				'header' => 'Layout options'
			],
			'notifications' => [
				'address' => 'Server address',
				'port' => 'Server port',
				'user' => 'Email user',
				'password' => 'Email password',
				'email' => 'Email address',
				'header' => 'Notifications options',
				'reccurentTemplate' => 'Recurrent payments email template',
				'singleTemplate' => 'Single payment email template',
				'placeholder' => [
					'address' => 'Server address',
					'port' => 'Server port',
					'user' => 'Email user',
					'password' => 'Email password',
					'email' => 'Email address',
				]
			]
		],
		'help' => [
			'title' => 'FAQ',
            'header' => 'Frequently asked questions'
		],
		'feedback' => [
			'title' => 'Feedback',
			'header' => 'Feedback',
			'email' => 'Your Email',
			'name' => 'Name',
			'message' => 'Message',
			'placeholder' => [
				'email' => 'Your Email',
				'name' => 'Name',
				'message' => 'Write your message'
			]
		],
		'users' => [
			'title' => 'Users',
			'breadcrumb' => 'List',
			'header' => 'User List',
			'email' => 'Email',
			'name' => 'Name',
			'active' => 'Active',
			'createdAt' => 'Created at',
			'updatedAt' => 'Updated at',
			'message' => 'Message',
			'password' => 'Password',
			'passwordConfirmation' => 'Repeat password',
			'placeholder' => [
				'email' => 'Email',
				'name' => 'Name',
				'message' => 'Write your message',
				'password' => 'Password'
			],
			'create' => [
				'breadcrumb' => 'Create',
				'header' => 'Create user'
			],
			'edit' => [
				'breadcrumb' => 'Edit',
				'header' => 'Edit user'
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
