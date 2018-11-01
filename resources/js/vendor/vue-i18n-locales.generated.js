export default {
    "be": {
        "alerts": {
            "backend": {
                "users": {
                    "created": "Пользователь создан",
                    "updated": "Пользователь обновлён",
                    "deleted": "Пользователь удалён",
                    "bulk_destroyed": "Выбранные пользователи удалены",
                    "bulk_enabled": "Выбранные пользователи активированы",
                    "bulk_disabled": "Выбранные пользователи заблокированы"
                },
                "roles": {
                    "created": "Роль создана",
                    "updated": "Роль обновлена",
                    "deleted": "Роль удалена"
                },
                "metas": {
                    "created": "Метаданные созданы",
                    "updated": "Метаданные обновлены",
                    "deleted": "Метаданные удалены",
                    "bulk_destroyed": "Выбранные метаданные удалены"
                },
                "form_submissions": {
                    "deleted": "Представление удалёно",
                    "bulk_destroyed": "Выбранные представления удалены"
                },
                "form_settings": {
                    "created": "Настройка формы создана",
                    "updated": "Настройка формы обновлена",
                    "deleted": "Настройка формы удалена"
                },
                "redirections": {
                    "created": "Перенаправление создано",
                    "updated": "Перенаправление обновлено",
                    "deleted": "Перенаправление удалено",
                    "bulk_destroyed": "Выделенные перенаправления удалены",
                    "bulk_enabled": "Выделенные перенаправления включены",
                    "bulk_disabled": "Выделенные перенаправления отключены",
                    "file_imported": "Файл успешно импортирован"
                },
                "posts": {
                    "created": "Статья создана",
                    "updated": "Статья обновлена",
                    "deleted": "Статья удалена",
                    "bulk_destroyed": "Выбранные статьи удалены",
                    "bulk_published": "Выбранные статьи опубликованы",
                    "bulk_pending": "Выбранные статьи ожидают проверки",
                    "bulk_pinned": "Выбранные статьи закреплены",
                    "bulk_promoted": "Выбранные статьи выделены"
                },
                "actions": {
                    "invalid": "Неверное действие"
                }
            },
            "frontend": []
        },
        "auth": {
            "failed": "Имя пользователя или пароль указаны неверно.",
            "throttle": "Слишком много попыток входа. Пожалуйста, попробуйте снова через {seconds} секунд.",
            "socialite": {
                "unacceptable": "{provider} не является допустимым типом входа."
            }
        },
        "buttons": {
            "cancel": "Отмена",
            "save": "Сохранить",
            "close": "Закрыть",
            "create": "Создать",
            "delete": "Удалить",
            "confirm": "Подтвердить",
            "show": "Показать",
            "edit": "Изменить",
            "update": "Обновить",
            "view": "Смотреть",
            "preview": "Предпросмотр",
            "back": "Назад",
            "send": "Отправить",
            "login-as": "Увайсці як {name}",
            "apply": "Применить",
            "users": {
                "create": "Стварыць карыстальніка"
            },
            "roles": {
                "create": "Стварыць ролю"
            },
            "metas": {
                "create": "Стварыць метададзеныя"
            },
            "form_settings": {
                "create": "Стварыць форму"
            },
            "redirections": {
                "create": "Стварыць рэдырэкт",
                "import": "Загрузить CSV"
            },
            "posts": {
                "create": "Создать статью",
                "save_and_publish": "Сохранить и опубликовать",
                "save_as_draft": "Сохранить как черновик"
            }
        },
        "exceptions": {
            "general": "Серверная ошибка",
            "unauthorized": "Недопустимое действие",
            "backend": {
                "users": {
                    "create": "Ошибка создания пользователя",
                    "update": "Ошибка обновления пользователя",
                    "delete": "Ошибка удаления пользователя",
                    "first_user_cannot_be_edited": "Вы не можете редактировать супер-администратора",
                    "first_user_cannot_be_disabled": "Супер-администратор не может быть отключён",
                    "first_user_cannot_be_destroyed": "Супер-администратор не может быть удалён",
                    "first_user_cannot_be_impersonated": "Нельзя войти под видом супер-администратора",
                    "cannot_set_superior_roles": "Вы не можете назначать роли, превосходящие ваши"
                },
                "roles": {
                    "create": "Ошибка создания роли",
                    "update": "Ошибка обновления роли",
                    "delete": "Ошибка удаления роли"
                },
                "metas": {
                    "create": "Ошибка создания метаданных",
                    "update": "Ошибка обновления метаданных",
                    "delete": "Ошибка удаления метаданных",
                    "already_exist": "Для этих языковых настроек уже есть метаданные"
                },
                "form_submissions": {
                    "create": "Ошибка создания представления",
                    "delete": "Ошибка удаления представления"
                },
                "form_settings": {
                    "create": "Ошибка создания настройки формы",
                    "update": "Ошибка обновления настройки формы",
                    "delete": "Ошибка удаления настройки формы",
                    "already_exist": "Уже существует настройка, связанная с этой формой"
                },
                "redirections": {
                    "create": "Ошибка создания перенаправления",
                    "update": "Ошибка обновления перенаправления",
                    "delete": "Ошибка удаления перенаправления",
                    "already_exist": "Для этого пути уже существует перенаправление"
                },
                "posts": {
                    "create": "Ошибка создания статьи",
                    "update": "Ошибка обновления статьи",
                    "save": "Ошибка сохранения статьи",
                    "delete": "Ошибка удаления статьи"
                }
            },
            "frontend": {
                "user": {
                    "email_taken": "Этот адрес электронной почты уже используется.",
                    "password_mismatch": "Это не ваш старый пароль.",
                    "delete_account": "Ошибка удаления аккаунта.",
                    "updating_disabled": "Редактирование аккаунта отключено."
                },
                "auth": {
                    "registration_disabled": "Регистрация отключена."
                }
            }
        },
        "forms": {
            "contact": {
                "display_name": "Форма обратной связи"
            }
        },
        "labels": {
            "language": "Язык",
            "actions": "Действия",
            "general": "Основные",
            "no_results": "Нет доступных результатов",
            "search": "Искать",
            "validate": "Применить",
            "choose_file": "Выберите файл",
            "no_file_chosen": "Файл не выбран",
            "are_you_sure": "Вы уверены?",
            "delete_image": "Удалить изображение",
            "yes": "Да",
            "no": "Нет",
            "add_new": "Добавить",
            "export": "Экспорт",
            "more_info": "Больше информации",
            "author": "Автор",
            "author_id": "ID автора",
            "last_access_at": "Последний доступ",
            "published_at": "Опубликовано",
            "created_at": "Создано",
            "updated_at": "Обновлено",
            "deleted_at": "Удалено",
            "no_value": "Нет значения",
            "upload_image": "Загрузить изображение",
            "anonymous": "Аноним",
            "all_rights_reserved": "Все права зарезервированы.",
            "with": "с",
            "by": "",
            "datatables": {
                "no_results": "Нет доступных результатов",
                "no_matched_results": "Не найдено подходящих результатов",
                "show_per_page": "Показать",
                "entries_per_page": "записей на страницу",
                "search": "Искать",
                "infos": "Показаны записи с {offset_start} по {offset_end} из {total}"
            },
            "morphs": {
                "post": "Статья, ID {id}",
                "user": "Пользователь, ID {id}"
            },
            "auth": {
                "disabled": "Ваш аккаунт заблокирован."
            },
            "http": {
                "403": {
                    "title": "Доступ запрещён",
                    "description": "Извините, но у вас нет прав доступа к этой странице."
                },
                "404": {
                    "title": "Ресурс не найден",
                    "description": "Извините, но этого ресурса не существует."
                },
                "500": {
                    "title": "Ошибка сервера",
                    "description": "Извините, но сервер столкнулся с ситуацией, которую он не может обработать. Мы исправим это как можно скорее."
                }
            },
            "localization": {
                "en": "Английский",
                "ru": "Русский",
                "be": "Беларусский"
            },
            "placeholders": {
                "route": "Выберите правильный внутренний маршрут",
                "tags": "Выберите или создайте метку"
            },
            "cookieconsent": {
                "message": "На этом сайте используются файлы cookie, чтобы вам было комфортнее им пользоваться.",
                "dismiss": "Понятно!"
            },
            "descriptions": {
                "allowed_image_types": "Доступные типы: PNG GIF JPG JPEG."
            },
            "user": {
                "dashboard": "Панель управления",
                "remember": "Запомніць",
                "login": "Уваход",
                "logout": "Выхад",
                "password_forgot": "Запамятавалі пароль?",
                "send_password_link": "Отправить ссылку сброса пароля",
                "password_reset": "Сброс пароля",
                "register": "Рэгістрацыя",
                "space": "Моё пространство",
                "settings": "Наладкі",
                "account": "Мой аккаунт",
                "profile": "Мой профіль",
                "avatar": "Аватар",
                "online": "В&nbsp;сети",
                "edit_profile": "Изменить мой профиль",
                "change_password": "Изменить мой пароль",
                "delete": "Удалить мой аккаунт",
                "administration": "Администрирование",
                "member_since": "Участник с {date}",
                "profile_updated": "Профиль успешно изменён.",
                "password_updated": "Пароль успешно изменён.",
                "super_admin": "Супер-администратор",
                "account_delete": "<p>Это действие полностью удалит вашу учетную запись с этого сайта, а также все связанные данные.<\/p>",
                "account_deleted": "Аккаунт успешно удалён",
                "titles": {
                    "space": "Моё пространство",
                    "account": "Мой аккаунт"
                }
            },
            "alerts": {
                "login_as": "Вы вошли как <strong>{name}<\/strong>, вы можете обратно войти как <a href=\"{route}\" data-turbolinks=\"false\">{admin}<\/a>."
            },
            "backend": {
                "dashboard": {
                    "new_posts": "Новые статьи",
                    "pending_posts": "Ожидающие одобрения статьи",
                    "published_posts": "Опубликованные статьи",
                    "active_users": "Активные пользователи",
                    "form_submissions": "Заполненные формы",
                    "last_posts": "Последние статьи",
                    "last_published_posts": "Последние публикации",
                    "last_pending_posts": "Последние ожидающие статьи",
                    "last_new_posts": "Последние новые статьи",
                    "all_posts": "Все статьи"
                },
                "new_menu": {
                    "post": "Новая статья",
                    "form_setting": "Новая форма",
                    "user": "Новый пользователь",
                    "role": "Новая роль",
                    "meta": "Новые метаданные",
                    "redirection": "Новое перенаправление"
                },
                "sidebar": {
                    "content": "Управление содержимым",
                    "forms": "Управление формами",
                    "access": "Управление доступом",
                    "seo": "Настройки SEO"
                },
                "titles": {
                    "dashboard": "Панель управления"
                },
                "users": {
                    "titles": {
                        "main": "Пользователи",
                        "index": "Список пользователей",
                        "create": "Создание пользователя",
                        "edit": "Изменение пользователя"
                    },
                    "actions": {
                        "destroy": "Удалить выбранных пользователей",
                        "enable": "Активировать выбранных пользователей",
                        "disable": "Отключить выбранных пользователей"
                    }
                },
                "roles": {
                    "titles": {
                        "main": "Роли",
                        "index": "Список ролей",
                        "create": "Создание роли",
                        "edit": "Изменение роли"
                    }
                },
                "metas": {
                    "titles": {
                        "main": "Метаданные",
                        "index": "Список метаданных",
                        "create": "Создание метаданных",
                        "edit": "Изменение метаданных"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные метаданные"
                    }
                },
                "form_submissions": {
                    "titles": {
                        "main": "Заполнения",
                        "index": "Список заполнений форм",
                        "show": "Детали заполнения формы"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные заполнения"
                    }
                },
                "form_settings": {
                    "titles": {
                        "main": "Формы",
                        "index": "Список форм",
                        "create": "Создание формы",
                        "edit": "Изменение формы"
                    },
                    "descriptions": {
                        "recipients": "Пример: 'webmaster@example.com' или 'sales@example.com,support@example.com'. Для указания нескольких получателей перечислите адреса через запятую.",
                        "message": "Сообщение для показа пользователю после отправки формы. Оставьте пустым, если ничего не надо показывать."
                    }
                },
                "redirections": {
                    "titles": {
                        "main": "Перенаправления",
                        "index": "Список перенаправлений",
                        "create": "Создание перенаправления",
                        "edit": "Изменение перенаправления"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные перенаправления",
                        "enable": "Активировать выбранные перенаправления",
                        "disable": "Отключить выбранные перенаправления"
                    },
                    "types": {
                        "permanent": "Постоянное перенаправление (301)",
                        "temporary": "Временное перенаправление (302)"
                    },
                    "import": {
                        "title": "Импорт CSV-файла",
                        "label": "Выберите CSV-файл для импорта",
                        "description": "Файл должен содержать две колонки с заголовками «source» (исходный) и «target» (целевой), перенаправления будут постоянные по-умолчанию."
                    }
                },
                "posts": {
                    "statuses": {
                        "draft": "Черновик",
                        "pending": "Ожидающее",
                        "published": "Опубликованное"
                    },
                    "titles": {
                        "main": "Статьи",
                        "index": "Список статей",
                        "create": "Создать статью",
                        "edit": "Редактировать статью",
                        "publication": "Параметры публикации"
                    },
                    "descriptions": {
                        "meta_title": "Если оставить пустым, по-умолчанию будет заголовком статьи.",
                        "meta_description": "Если оставить пустым, по умолчанию будет отображаться резюме статьи."
                    },
                    "placeholders": {
                        "body": "Напишите своё содержимое...",
                        "meta_title": "Заголовок статьи",
                        "meta_description": "Резюме статьи"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные статьи",
                        "publish": "Опубликовать выбранные статьи",
                        "pin": "Закрепить выбранные статьи",
                        "promote": "Выделить выбранные статьи"
                    }
                }
            },
            "frontend": {
                "titles": {
                    "home": "Начало",
                    "about": "О нас",
                    "contact": "Контакты",
                    "blog": "Блог",
                    "message_sent": "Сообщение отправлено",
                    "legal_mentions": "Юридическая информация",
                    "administration": "Администрирование"
                },
                "submissions": {
                    "message_sent": "<p>Ваше сообщение успешно отправлено.<\/p>"
                },
                "placeholders": {
                    "locale": "Выберите свой язык",
                    "timezone": "Выберите свой часовой пояс"
                },
                "blog": {
                    "published_at": "Опубликовано {date}",
                    "published_at_with_owner_linkable": "Опубликовано <a href=\"{link}\">{name}<\/a>, {date}",
                    "tags": "Метки"
                }
            }
        },
        "logs": {
            "backend": {
                "users": {
                    "created": "Пользователь ID {user} создан",
                    "updated": "Пользователь ID {user} обновлён",
                    "deleted": "Пользователь ID {user} удалён"
                },
                "form_submissions": {
                    "created": "Заполнение формы ID {form_submission} создано"
                }
            },
            "frontend": []
        },
        "mails": {
            "layout": {
                "hello": "Здравствуйте!",
                "regards": "С уважением",
                "trouble": "Если у вас не получается воспользоваться кнопкой {action}, скопируйте URL ниже и откройте его в удобном вам браузере:",
                "all_rights_reserved": "Все права зарезервированы."
            },
            "password_reset": {
                "subject": "Сброс пароля",
                "intro": "Вам отправлено это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.",
                "action": "Сбросить пароль",
                "outro": "Если вы не запрашивали сброс пароля, просто проигнорируйте это письмо."
            },
            "contact": {
                "subject": "Новое сообщение с сайта",
                "new_contact": "Получено новое сообщение с сайта:"
            },
            "alert": {
                "subject": "[{app_name}] Ошибка приложения",
                "message": "На сервере произошёл сбой со следующим сообщением об ошибке: {message}",
                "trace": "Детали трассировки:"
            }
        },
        "pagination": {
            "previous": "&laquo;&nbsp;Назад",
            "next": "Вперёд&nbsp;&raquo;"
        },
        "passwords": {
            "password": "Пароль должен быть как минимум 6 символов длиной и совпадать с подтверждением.",
            "reset": "Ваш пароль изменён!",
            "sent": "Мы отправили вам на почту ссылку для сброса пароля!",
            "token": "Неверный токен сброса пароля.",
            "user": "У нас нет пользователя с таким адресом электронной почты."
        },
        "permissions": {
            "categories": {
                "blog": "Блог",
                "form": "Формы",
                "access": "Доступ",
                "seo": "SEO"
            },
            "access": {
                "backend": {
                    "display_name": "Доступ к бэк-офису",
                    "description": "Доступ к страницам администрирования."
                }
            },
            "view": {
                "form_settings": {
                    "display_name": "Просмотр настроек формы",
                    "description": "Можно просматривать настройки формы."
                },
                "form_submissions": {
                    "display_name": "Просмотр заполнений форм",
                    "description": "Пожно просматривать данные заполнения форм."
                },
                "users": {
                    "display_name": "Просмотр пользователей",
                    "description": "Можно видеть список пользователей."
                },
                "roles": {
                    "display_name": "Просмотр ролей",
                    "description": "Можно видеть список ролей."
                },
                "metas": {
                    "display_name": "Просмотр метаданных",
                    "description": "Можно видеть метаданные."
                },
                "redirections": {
                    "display_name": "Просмотр перенаправлений",
                    "description": "Можно видеть список перенаправлений."
                },
                "posts": {
                    "display_name": "Просмотр всех статей",
                    "description": "Можно видеть все статьи."
                },
                "own": {
                    "posts": {
                        "display_name": "Просмотр своих статей",
                        "description": "Можно видеть свои статьи."
                    }
                }
            },
            "create": {
                "form_settings": {
                    "display_name": "Создание форм",
                    "description": "Можно создавать новые формы."
                },
                "users": {
                    "display_name": "Создание пользователей",
                    "description": "Можно создавать новых пользователей."
                },
                "roles": {
                    "display_name": "Создание ролей",
                    "description": "Можно создавать новые роли."
                },
                "metas": {
                    "display_name": "Создание метаданных",
                    "description": "Можно создавать новые метаданные."
                },
                "redirections": {
                    "display_name": "Создание перенеправлений",
                    "description": "Можно создавать новые перенаправления."
                },
                "posts": {
                    "display_name": "Создание статей",
                    "description": "Можно создавать новые статьи."
                }
            },
            "edit": {
                "form_settings": {
                    "display_name": "Правка форм",
                    "description": "Можно изменять данные форм."
                },
                "users": {
                    "display_name": "Правка пользователей",
                    "description": "Можно изменять данные пользователей."
                },
                "roles": {
                    "display_name": "Правка ролей",
                    "description": "Можно изменять данные ролей."
                },
                "metas": {
                    "display_name": "Правка метаданных",
                    "description": "Можно изменять данные метаданных."
                },
                "redirections": {
                    "display_name": "Правка перенаправлений",
                    "description": "Можно изменять данные перенаправлений."
                },
                "posts": {
                    "display_name": "Правка всех статей",
                    "description": "Можно изменять данные всех статей."
                },
                "own": {
                    "posts": {
                        "display_name": "Правка своих статей",
                        "description": "Можно изменять данные своих статей."
                    }
                }
            },
            "delete": {
                "form_settings": {
                    "display_name": "Удаление форм",
                    "description": "Можно удалять формы."
                },
                "form_submissions": {
                    "display_name": "Удаление заполнений форм",
                    "description": "Можно удалять данные заполнения форм."
                },
                "users": {
                    "display_name": "Удаление пользователей",
                    "description": "Можно удалять пользователей."
                },
                "roles": {
                    "display_name": "Удаление ролей",
                    "description": "Можно удалять роли."
                },
                "metas": {
                    "display_name": "Удаление метаданных",
                    "description": "Можно удалять метаданные."
                },
                "redirections": {
                    "display_name": "Удаление перенаправлений",
                    "description": "Можно удалять перенаправления."
                },
                "posts": {
                    "display_name": "Удаление всех статьи",
                    "description": "Можно удалять все статьи."
                },
                "own": {
                    "posts": {
                        "display_name": "Удаление своих статей",
                        "description": "Можно удалять свои статьи."
                    }
                }
            },
            "publish": {
                "posts": {
                    "display_name": "Публикация статей",
                    "description": "Можно управлять публикацией статей."
                }
            },
            "impersonate": {
                "display_name": "Войти под видом пользователя",
                "description": "Можно войти под видом другого пользователя. Полезно для тестирования."
            }
        },
        "routes": {
            "home": "home",
            "about": "about",
            "contact": "contact",
            "contact-sent": "contact-sent",
            "legal-mentions": "legal-mentions",
            "redactors": "blog\/redactors\/{user}"
        },
        "validation": {
            "accepted": "{attribute} должен быть принят.",
            "active_url": "{attribute} является некорректным URL.",
            "after": "{attribute} должен быть датой после {date}.",
            "after_or_equal": "{attribute} должен быть датой после или равной {date}.",
            "alpha": "{attribute} может содержать только буквы.",
            "alpha_dash": "{attribute} может содержать только буквы, цифры и дефисы.",
            "alpha_num": "{attribute} может содержать только буквы и цифры.",
            "array": "{attribute} должен быть списком.",
            "before": "{attribute} должен быть датой до {date}.",
            "before_or_equal": "{attribute} должен быть датой до или равной {date}.",
            "between": {
                "numeric": "{attribute} должен быть между {min} и {max}.",
                "file": "{attribute} должен быть между {min} и {max} kilobytes.",
                "string": "{attribute} должен быть между {min} и {max} characters.",
                "array": "{attribute} должен содержать от {min} до {max} элементов."
            },
            "boolean": "{attribute} должен быть «истина» или «ложь».",
            "confirmed": "{attribute} подтверждение не совпадает.",
            "date": "{attribute} не является корректной датой.",
            "date_format": "{attribute} не совпадает с форматом {format}.",
            "different": "{attribute} и {other} должны различаться.",
            "digits": "{attribute} должен содержать {digits} цифр.",
            "digits_between": "{attribute} должен быть от {min} до {max} цифр.",
            "dimensions": "{attribute} содержит неверные размеры изображения.",
            "distinct": "{attribute} содержит дублирующее значение.",
            "email": "{attribute} должен быть корректным почтовым адресом.",
            "exists": "выбранный {attribute} неверен.",
            "file": "{attribute} должен быть файлом.",
            "filled": "{attribute} должен быть заполнен.",
            "image": "{attribute} должен быть изображением.",
            "in": "выбранный {attribute} неверен.",
            "in_array": "{attribute} отсутствует в {other}.",
            "integer": "{attribute} должен быть целым.",
            "ip": "{attribute} должен быть корректным IP-адресом.",
            "ipv4": "{attribute} должен быть корректным IPv4-адресом.",
            "ipv6": "{attribute} должен быть корректным IPv6-адресом.",
            "json": "{attribute} должен быть корректной JSON-строкой.",
            "max": {
                "numeric": "{attribute} не может быть более чем {max}.",
                "file": "{attribute} не может быть более чем {max} Кб.",
                "string": "{attribute} не может быть более чем {max} символов.",
                "array": "{attribute} не может содержать более чем {max} значений."
            },
            "mimes": "{attribute} должен быть файлом типа {values}.",
            "mimetypes": "{attribute} должен быть файлом типа {values}.",
            "min": {
                "numeric": "{attribute} должен быть не менее чем {min}.",
                "file": "{attribute} должен быть не менее чем {min} Кб.",
                "string": "{attribute} должен содержать не менее чем {min} символов.",
                "array": "{attribute} должен содержать не менее чем {min} значений."
            },
            "not_in": "выбранный {attribute} неверен.",
            "not_regex": "формат {attribute} неверен.",
            "numeric": "{attribute} должен быть числом.",
            "present": "поле {attribute} должно присутствовать.",
            "regex": "формат {attribute} неверен.",
            "required": "поле {attribute} обязательно.",
            "required_if": "поле {attribute} обязательно, когда {other} равно {value}.",
            "required_unless": "поле {attribute} обязательно, если {other} в {values}.",
            "required_with": "поле {attribute} обязательно, если присутствуют {values}.",
            "required_with_all": "поле {attribute} обязательно, если присутствуют {values}.",
            "required_without": "поле {attribute} обязательно, если отсутствуют {values}.",
            "required_without_all": "поле {attribute} обязательно, если нет ничего из {values}.",
            "same": "{attribute} и {other} должны совпадать.",
            "size": {
                "numeric": "{attribute} должно быть {size}.",
                "file": "{attribute} должно быть {size} Кб.",
                "string": "{attribute} должно быть {size} символов.",
                "array": "{attribute} должно содержать {size} элементов."
            },
            "string": "{attribute} должно быть строкой.",
            "timezone": "{attribute} должно быть корректным часовым поясом.",
            "unique": "{attribute} уже есть в базе.",
            "uploaded": "{attribute} не получилось загрузить.",
            "url": "{attribute} имеет неверный формат.",
            "custom": {
                "attribute-name": {
                    "rule-name": "custom-message"
                }
            },
            "attributes": {
                "name": "Имя",
                "display_name": "Отображаемое имя",
                "username": "Псевдоним",
                "email": "E-mail",
                "first_name": "Имя",
                "last_name": "Фамилия",
                "password": "Пароль",
                "password_confirmation": "Подтверждение пароля",
                "old_password": "Старый пароль",
                "new_password": "Новый пароль",
                "new_password_confirmation": "Подтверждение нового пароля",
                "postal_code": "Почтовы индекс",
                "city": "Город",
                "country": "Страна",
                "address": "Адрес",
                "phone": "Телефон",
                "mobile": "Мобильный",
                "age": "Возраст",
                "sex": "Пол",
                "gender": "Пол",
                "day": "День",
                "month": "Месяц",
                "year": "Год",
                "hour": "Час",
                "minute": "Минута",
                "second": "Секунда",
                "title": "Назва кампаніі",
                "content": "Содержание",
                "description": "Описание",
                "summary": "Резюме",
                "excerpt": "Отрывок",
                "date": "Дата",
                "time": "Время",
                "available": "Доступный",
                "size": "Размер",
                "roles": "Роли",
                "permissions": "Права",
                "active": "Активный",
                "message": "Сообщение",
                "g-recaptcha-response": "Защитный код",
                "locale": "Локализация",
                "route": "Маршрут",
                "url": "URL",
                "form_type": "Тип формы",
                "form_data": "Данные формы",
                "recipients": "Получатели",
                "source_path": "Исходный путь",
                "target_path": "Целевой путь",
                "redirect_type": "Тип переадресации",
                "timezone": "Часовой пояс",
                "order": "Порядок показа",
                "image": "Изображение",
                "status": "Статус кампаніі",
                "pinned": "Закреплено",
                "promoted": "Выделено",
                "body": "Основная часть",
                "tags": "Метки",
                "published_at": "Опубликовано",
                "unpublished_at": "Снято с публикации",
                "metable_type": "Сущность"
            }
        }
    },
    "en": {
        "alerts": {
            "backend": {
                "users": {
                    "created": "User created",
                    "updated": "User updated",
                    "deleted": "User deleted",
                    "bulk_destroyed": "Selected users deleted",
                    "bulk_enabled": "Selected users enabled",
                    "bulk_disabled": "Selected users disabled"
                },
                "roles": {
                    "created": "Role created",
                    "updated": "Role updated",
                    "deleted": "Role deleted"
                },
                "metas": {
                    "created": "Meta created",
                    "updated": "Meta updated",
                    "deleted": "Meta deleted",
                    "bulk_destroyed": "Selected metas deleted"
                },
                "form_submissions": {
                    "deleted": "Submission deleted",
                    "bulk_destroyed": "Selected submissions deleted"
                },
                "form_settings": {
                    "created": "Form setting created",
                    "updated": "Form setting updated",
                    "deleted": "Form setting deleted"
                },
                "redirections": {
                    "created": "Redirection created",
                    "updated": "Redirection updated",
                    "deleted": "Redirection deleted",
                    "bulk_destroyed": "Selected redirections deleted",
                    "bulk_enabled": "Selected redirections enabled",
                    "bulk_disabled": "Selected redirections disabled",
                    "file_imported": "File successfully imported"
                },
                "posts": {
                    "created": "Post created",
                    "updated": "Post updated",
                    "deleted": "Post deleted",
                    "bulk_destroyed": "Selected posts deleted",
                    "bulk_published": "Selected posts published",
                    "bulk_pending": "Selected posts are awaiting moderation",
                    "bulk_pinned": "Selected posts pinned",
                    "bulk_promoted": "Selected posts promoted"
                },
                "actions": {
                    "invalid": "Invalid action"
                }
            },
            "frontend": []
        },
        "auth": {
            "failed": "These credentials do not match our records.",
            "throttle": "Too many login attempts. Please try again in {seconds} seconds.",
            "socialite": {
                "unacceptable": "{provider} is not an acceptable login type."
            }
        },
        "buttons": {
            "cancel": "Cancel",
            "save": "Save",
            "close": "Close",
            "create": "Create",
            "delete": "Delete",
            "confirm": "Confirm",
            "show": "Show",
            "edit": "Edit",
            "update": "Update",
            "view": "View",
            "preview": "Preview",
            "back": "Back",
            "send": "Send",
            "login-as": "Login as {name}",
            "apply": "Apply",
            "users": {
                "create": "Create user"
            },
            "roles": {
                "create": "Create role"
            },
            "metas": {
                "create": "Create meta"
            },
            "form_settings": {
                "create": "Create setting"
            },
            "redirections": {
                "create": "Create redirection",
                "import": "Import CSV"
            },
            "campaigns": {
                "create": "Create campaign",
                "save_and_publish": "Save and publish",
                "save_as_draft": "Save as draft"
            }
        },
        "exceptions": {
            "general": "Server exception",
            "unauthorized": "Action not allowed",
            "backend": {
                "users": {
                    "create": "Error on user creation",
                    "update": "Error on user updating",
                    "delete": "Error on user deletion",
                    "first_user_cannot_be_edited": "You cannot edit super admin user",
                    "first_user_cannot_be_disabled": "Super admin user cannot be disabled",
                    "first_user_cannot_be_destroyed": "Super admin user cannot be deleted",
                    "first_user_cannot_be_impersonated": "Super admin user cannot be impersonated",
                    "cannot_set_superior_roles": "You cannot attribute roles superior to yours"
                },
                "roles": {
                    "create": "Error on role creation",
                    "update": "Error on role updating",
                    "delete": "Error on role deletion"
                },
                "metas": {
                    "create": "Error on meta creation",
                    "update": "Error on meta updating",
                    "delete": "Error on meta deletion",
                    "already_exist": "There is already a meta for this locale route"
                },
                "form_submissions": {
                    "create": "Error on submission creation",
                    "delete": "Error on submission deletion"
                },
                "form_settings": {
                    "create": "Error on form setting creation",
                    "update": "Error on form setting updating",
                    "delete": "Error on form setting deletion",
                    "already_exist": "There is already a setting linked to this form"
                },
                "redirections": {
                    "create": "Error on redirection creation",
                    "update": "Error on redirection updating",
                    "delete": "Error on redirection deletion",
                    "already_exist": "There is already a redirection for this path"
                },
                "posts": {
                    "create": "Error on post creation",
                    "update": "Error on post updating",
                    "save": "Error on post saving",
                    "delete": "Error on post deletion"
                }
            },
            "frontend": {
                "user": {
                    "email_taken": "That e-mail address is already taken.",
                    "password_mismatch": "That is not your old password.",
                    "delete_account": "Error on account deletion.",
                    "updating_disabled": "Account editing is disabled."
                },
                "auth": {
                    "registration_disabled": "Registration is disabled."
                }
            }
        },
        "forms": {
            "contact": {
                "display_name": "Contact form"
            }
        },
        "labels": {
            "language": "Language",
            "actions": "Actions",
            "general": "General",
            "no_results": "No results available",
            "search": "Search",
            "validate": "Validate",
            "choose_file": "Choose File",
            "no_file_chosen": "No file chosen",
            "are_you_sure": "Are you sure ?",
            "delete_image": "Delete image",
            "yes": "Yes",
            "no": "No",
            "add_new": "Add",
            "export": "Export",
            "more_info": "More info",
            "author": "Author",
            "author_id": "Author ID",
            "last_access_at": "Last access at",
            "published_at": "Published at",
            "created_at": "Created at",
            "updated_at": "Updated at",
            "deleted_at": "Deleted at",
            "no_value": "No value",
            "upload_image": "Upload image",
            "anonymous": "Anonymous",
            "all_rights_reserved": "All rights reserved.",
            "supporters": "Supported by the European Union",
            "help": "Help Doika Team",
            "with": "with",
            "by": "by",
            "datatables": {
                "no_results": "No results available",
                "no_matched_results": "No matched results available",
                "show_per_page": "Show",
                "entries_per_page": "entries per page",
                "search": "Search",
                "infos": "Showing {offset_start} to {offset_end} of {total} entries"
            },
            "morphs": {
                "campaign": "campaign, identity {id}",
                "user": "User, identity {id}"
            },
            "auth": {
                "disabled": "Your account has been disabled."
            },
            "http": {
                "403": {
                    "title": "Access Denied",
                    "description": "Sorry, but you do not have permissions to access this page."
                },
                "404": {
                    "title": "Page Not Found",
                    "description": "Sorry, but the page you were trying to view does not exist."
                },
                "500": {
                    "title": "Server Error",
                    "description": "Sorry, but the server has encountered a situation it doesn't know how to handle. We'll fix this as soon as possible."
                }
            },
            "localization": {
                "en": "English",
                "ru": "Russian",
                "fr": "French",
                "es": "Spanish",
                "de": "German",
                "zh": "Chinese",
                "ar": "Arab",
                "pt": "Portuguese"
            },
            "placeholders": {
                "route": "Select a valid internal route",
                "tags": "Select or create a tag"
            },
            "cookieconsent": {
                "message": "This website uses cookies to ensure you get the best experience on our website.",
                "dismiss": "Got it !"
            },
            "descriptions": {
                "allowed_image_types": "Allowed types: png gif jpg jpeg."
            },
            "user": {
                "dashboard": "Dashboard",
                "remember": "Remember",
                "login": "Login",
                "logout": "Logout",
                "password_forgot": "Forget password ?",
                "send_password_link": "Send reset password link",
                "password_reset": "Password Reset",
                "register": "Register",
                "space": "My space",
                "settings": "Settings",
                "account": "My account",
                "profile": "My profile",
                "avatar": "Avatar",
                "online": "Online",
                "edit_profile": "Edit my profile",
                "change_password": "Change my password",
                "delete": "Delete my account",
                "administration": "Administration",
                "member_since": "Member since {date}",
                "profile_updated": "Profile successfully updated.",
                "password_updated": "Password successfully updated.",
                "super_admin": "Super administrator",
                "account_delete": "<p>This action will delete entirely your account from this site as well as all associated data.<\/p>",
                "account_deleted": "Account successfully deleted",
                "titles": {
                    "space": "My space",
                    "account": "My account"
                }
            },
            "alerts": {
                "login_as": "You are actually logged as <strong>{name}<\/strong>, you can logout as <a href=\"{route}\" data-turbolinks=\"false\">{admin}<\/a>."
            },
            "backend": {
                "campaigns": {
                    "statuses": {
                        "draft": "Draft",
                        "pending": "Pending",
                        "published": "Published"
                    },
                    "titles": {
                        "main": "Campaigns",
                        "index": "List of campaigns",
                        "create": "Create campaign",
                        "edit": "Edit campaign",
                        "publication": "Publication options"
                    },
                    "descriptions": {
                        "meta_title": "If leave empty, title will be that of article' title by default.",
                        "meta_description": "If leave empty, description will be that of article's summary by default."
                    },
                    "placeholders": {
                        "body": "Write your content...",
                        "meta_title": "Article's title.",
                        "meta_description": "Article's summary."
                    },
                    "actions": {
                        "destroy": "Delete selected campaigns",
                        "publish": "Publish selected campaigns",
                        "pin": "Pin selected campaigns",
                        "promote": "Promote selected campaigns"
                    }
                },
                "dashboard": {
                    "new_campaigns": "New campaigns",
                    "pending_campaigns": "Pending campaigns",
                    "published_campaigns": "Published campaigns",
                    "active_users": "Active users",
                    "form_submissions": "Submissions",
                    "last_campaigns": "Last campaigns",
                    "last_published_campaigns": "Last publications",
                    "last_pending_campaigns": "Last pending campaigns",
                    "last_new_campaigns": "Last new campaigns",
                    "all_campaigns": "All campaigns"
                },
                "new_menu": {
                    "campaign": "New campaign",
                    "form_setting": "New form setting",
                    "user": "New user",
                    "role": "New role",
                    "meta": "New meta",
                    "redirection": "New redirection"
                },
                "sidebar": {
                    "content": "Content management",
                    "forms": "Form management",
                    "access": "Access management",
                    "seo": "SEO settings",
                    "configuration": "Module configuration",
                    "guides": "FAQ",
                    "feedback": "Feedback"
                },
                "titles": {
                    "campaigns": "Campaigns",
                    "payments": "Payments",
                    "paymentConfig": "Payment system",
                    "layoutConfig": "Layout",
                    "notificationsConfig": "Notifications",
                    "howTo": "How to use",
                    "sendFeedback": "Write feedback"
                },
                "users": {
                    "titles": {
                        "main": "User",
                        "index": "User list",
                        "create": "User creation",
                        "edit": "User modification"
                    },
                    "actions": {
                        "destroy": "Delete selected users",
                        "enable": "Enable selected users",
                        "disable": "Disable selected users"
                    }
                },
                "roles": {
                    "titles": {
                        "main": "Role",
                        "index": "Role list",
                        "create": "Role creation",
                        "edit": "Role modification"
                    }
                },
                "metas": {
                    "titles": {
                        "main": "Meta",
                        "index": "Meta list",
                        "create": "Meta creation",
                        "edit": "Meta modification"
                    },
                    "actions": {
                        "destroy": "Delete selected metas"
                    }
                },
                "form_submissions": {
                    "titles": {
                        "main": "Submission",
                        "index": "Submission list",
                        "show": "Submission detail"
                    },
                    "actions": {
                        "destroy": "Delete selected submissions"
                    }
                },
                "form_settings": {
                    "titles": {
                        "main": "Forms",
                        "index": "Form setting list",
                        "create": "Form setting creation",
                        "edit": "Form setting modification"
                    },
                    "descriptions": {
                        "recipients": "Example: 'webmaster@example.com' or 'sales@example.com,support@example.com' . To specify multiple recipients, separate each email address with a comma.",
                        "message": "The message to display to the user after submission of this form. Leave blank for no message."
                    }
                },
                "redirections": {
                    "titles": {
                        "main": "Redirection",
                        "index": "Redirection list",
                        "create": "Redirection creation",
                        "edit": "Redirection modification"
                    },
                    "actions": {
                        "destroy": "Delete selected redirections",
                        "enable": "Enable selected redirections",
                        "disable": "Disable selected redirections"
                    },
                    "types": {
                        "permanent": "Permanent redirect (301)",
                        "temporary": "Temporary redirect (302)"
                    },
                    "import": {
                        "title": "CSV file import",
                        "label": "Select CSV file to import",
                        "description": "File must have 2 columns with \"source\" and \"target\" as heading, redirection will be permanent by default"
                    }
                }
            },
            "frontend": {
                "titles": {
                    "home": "Home",
                    "about": "About",
                    "contact": "Contact",
                    "blog": "Blog",
                    "message_sent": "Message sent",
                    "legal_mentions": "Legal mentions",
                    "administration": "Administration"
                },
                "submissions": {
                    "message_sent": "<p>Your message has been successfully sent<\/p>"
                },
                "placeholders": {
                    "locale": "Select your language",
                    "timezone": "Select your timezone"
                },
                "blog": {
                    "published_at": "Published at {date}",
                    "published_at_with_owner_linkable": "Published at {date} by <a href=\"{link}\">{name}<\/a>",
                    "tags": "Tags"
                }
            }
        },
        "logs": {
            "backend": {
                "users": {
                    "created": "User ID {user} created",
                    "updated": "User ID {user} updated",
                    "deleted": "User ID {user} deleted"
                },
                "form_submissions": {
                    "created": "Form submission ID {form_submission} created"
                }
            },
            "frontend": []
        },
        "mails": {
            "layout": {
                "hello": "Hello !",
                "regards": "Regards",
                "trouble": "If you’re having trouble clicking the {action} button, copy and paste the URL below into your web browser :",
                "all_rights_reserved": "All rights reserved."
            },
            "password_reset": {
                "subject": "Password reset",
                "intro": "You are receiving this email because we received a password reset request for your account.",
                "action": "Reset Password",
                "outro": "If you did not request a password reset, no further action is required."
            },
            "contact": {
                "subject": "New contact message",
                "new_contact": "You've got a new contact message. Submission detail :"
            },
            "alert": {
                "subject": "[{app_name}] Exception error",
                "message": "You've got unexpected server exception error which message is : {message}.",
                "trace": "All trace detail :"
            }
        },
        "pagination": {
            "previous": "&laquo; Previous",
            "next": "Next &raquo;"
        },
        "passwords": {
            "password": "Passwords must be at least six characters and match the confirmation.",
            "reset": "Your password has been reset!",
            "sent": "We have e-mailed your password reset link!",
            "token": "This password reset token is invalid.",
            "user": "We can't find a user with that e-mail address."
        },
        "permissions": {
            "categories": {
                "blog": "Blog",
                "form": "Forms",
                "access": "Access",
                "seo": "SEO"
            },
            "access": {
                "backend": {
                    "display_name": "Backoffice access",
                    "description": "Can access to administration pages."
                }
            },
            "view": {
                "form_settings": {
                    "display_name": "View form settings",
                    "description": "Can view form settings."
                },
                "form_submissions": {
                    "display_name": "View form submissions",
                    "description": "Can view form submissions."
                },
                "users": {
                    "display_name": "View users",
                    "description": "Can view users."
                },
                "roles": {
                    "display_name": "View roles",
                    "description": "Can view roles."
                },
                "metas": {
                    "display_name": "View metas",
                    "description": "Can view metas."
                },
                "redirections": {
                    "display_name": "View redirections",
                    "description": "Can view redirections."
                },
                "posts": {
                    "display_name": "View all posts",
                    "description": "Can view all posts."
                },
                "own": {
                    "posts": {
                        "display_name": "View own posts",
                        "description": "Can view own posts."
                    }
                }
            },
            "create": {
                "form_settings": {
                    "display_name": "Create form settings",
                    "description": "Can create form settings."
                },
                "users": {
                    "display_name": "Create users",
                    "description": "Can create users."
                },
                "roles": {
                    "display_name": "Create roles",
                    "description": "Can create roles."
                },
                "metas": {
                    "display_name": "Create metas",
                    "description": "Can create metas."
                },
                "redirections": {
                    "display_name": "Create redirections",
                    "description": "Can create redirections."
                },
                "posts": {
                    "display_name": "Create posts",
                    "description": "Can create all posts."
                }
            },
            "edit": {
                "form_settings": {
                    "display_name": "Edit form settings",
                    "description": "Can edit form settings."
                },
                "users": {
                    "display_name": "Edit users",
                    "description": "Can edit users."
                },
                "roles": {
                    "display_name": "Edit roles",
                    "description": "Can edit roles."
                },
                "metas": {
                    "display_name": "Edit metas",
                    "description": "Can edit metas."
                },
                "redirections": {
                    "display_name": "Edit redirections",
                    "description": "Can edit redirections."
                },
                "posts": {
                    "display_name": "Edit all posts",
                    "description": "Can edit all posts."
                },
                "own": {
                    "posts": {
                        "display_name": "Edit own posts",
                        "description": "Can edit own posts."
                    }
                }
            },
            "delete": {
                "form_settings": {
                    "display_name": "Delete form settings",
                    "description": "Can delete form settings."
                },
                "form_submissions": {
                    "display_name": "Delete form submissions",
                    "description": "Can delete form submissions."
                },
                "users": {
                    "display_name": "Delete users",
                    "description": "Can delete users."
                },
                "roles": {
                    "display_name": "Delete roles",
                    "description": "Can delete roles."
                },
                "metas": {
                    "display_name": "Delete metas",
                    "description": "Can delete metas."
                },
                "redirections": {
                    "display_name": "Delete redirections",
                    "description": "Can delete redirections."
                },
                "posts": {
                    "display_name": "Delete all posts",
                    "description": "Can delete all posts."
                },
                "own": {
                    "posts": {
                        "display_name": "Delete own posts",
                        "description": "Can delete own posts."
                    }
                }
            },
            "publish": {
                "posts": {
                    "display_name": "Publish posts",
                    "description": "Can manage posts publication."
                }
            },
            "impersonate": {
                "display_name": "Impersonate user",
                "description": "Can take ownership of others user identities. Useful for tests."
            }
        },
        "routes": {
            "home": "home",
            "about": "about",
            "contact": "contact",
            "contact-sent": "contact-sent",
            "legal-mentions": "legal-mentions",
            "redactors": "blog\/redactors\/{user}"
        },
        "validation": {
            "accepted": "The {attribute} must be accepted.",
            "active_url": "The {attribute} is not a valid URL.",
            "after": "The {attribute} must be a date after {date}.",
            "after_or_equal": "The {attribute} must be a date after or equal to {date}.",
            "alpha": "The {attribute} may only contain letters.",
            "alpha_dash": "The {attribute} may only contain letters, numbers, and dashes.",
            "alpha_num": "The {attribute} may only contain letters and numbers.",
            "array": "The {attribute} must be an array.",
            "before": "The {attribute} must be a date before {date}.",
            "before_or_equal": "The {attribute} must be a date before or equal to {date}.",
            "between": {
                "numeric": "The {attribute} must be between {min} and {max}.",
                "file": "The {attribute} must be between {min} and {max} kilobytes.",
                "string": "The {attribute} must be between {min} and {max} characters.",
                "array": "The {attribute} must have between {min} and {max} items."
            },
            "boolean": "The {attribute} field must be true or false.",
            "confirmed": "The {attribute} confirmation does not match.",
            "date": "The {attribute} is not a valid date.",
            "date_format": "The {attribute} does not match the format {format}.",
            "different": "The {attribute} and {other} must be different.",
            "digits": "The {attribute} must be {digits} digits.",
            "digits_between": "The {attribute} must be between {min} and {max} digits.",
            "dimensions": "The {attribute} has invalid image dimensions.",
            "distinct": "The {attribute} field has a duplicate value.",
            "email": "The {attribute} must be a valid email address.",
            "exists": "The selected {attribute} is invalid.",
            "file": "The {attribute} must be a file.",
            "filled": "The {attribute} field must have a value.",
            "image": "The {attribute} must be an image.",
            "in": "The selected {attribute} is invalid.",
            "in_array": "The {attribute} field does not exist in {other}.",
            "integer": "The {attribute} must be an integer.",
            "ip": "The {attribute} must be a valid IP address.",
            "ipv4": "The {attribute} must be a valid IPv4 address.",
            "ipv6": "The {attribute} must be a valid IPv6 address.",
            "json": "The {attribute} must be a valid JSON string.",
            "max": {
                "numeric": "The {attribute} may not be greater than {max}.",
                "file": "The {attribute} may not be greater than {max} kilobytes.",
                "string": "The {attribute} may not be greater than {max} characters.",
                "array": "The {attribute} may not have more than {max} items."
            },
            "mimes": "The {attribute} must be a file of type: {values}.",
            "mimetypes": "The {attribute} must be a file of type: {values}.",
            "min": {
                "numeric": "The {attribute} must be at least {min}.",
                "file": "The {attribute} must be at least {min} kilobytes.",
                "string": "The {attribute} must be at least {min} characters.",
                "array": "The {attribute} must have at least {min} items."
            },
            "not_in": "The selected {attribute} is invalid.",
            "not_regex": "The {attribute} format is invalid.",
            "numeric": "The {attribute} must be a number.",
            "present": "The {attribute} field must be present.",
            "regex": "The {attribute} format is invalid.",
            "required": "The {attribute} field is required.",
            "required_if": "The {attribute} field is required when {other} is {value}.",
            "required_unless": "The {attribute} field is required unless {other} is in {values}.",
            "required_with": "The {attribute} field is required when {values} is present.",
            "required_with_all": "The {attribute} field is required when {values} is present.",
            "required_without": "The {attribute} field is required when {values} is not present.",
            "required_without_all": "The {attribute} field is required when none of {values} are present.",
            "same": "The {attribute} and {other} must match.",
            "size": {
                "numeric": "The {attribute} must be {size}.",
                "file": "The {attribute} must be {size} kilobytes.",
                "string": "The {attribute} must be {size} characters.",
                "array": "The {attribute} must contain {size} items."
            },
            "string": "The {attribute} must be a string.",
            "timezone": "The {attribute} must be a valid zone.",
            "unique": "The {attribute} has already been taken.",
            "uploaded": "The {attribute} failed to upload.",
            "url": "The {attribute} format is invalid.",
            "custom": {
                "attribute-name": {
                    "rule-name": "custom-message"
                }
            },
            "attributes": {
                "name": "Name",
                "backers": "Backers\/Subscribers",
                "reccurent": "Reccurent",
                "average": "Average amount",
                "recieved": "All",
                "goal": "Needed",
                "recurrent": "Recurrent",
                "days": "Days remaining",
                "display_name": "Display name",
                "username": "Pseudo",
                "email": "Email",
                "first_name": "Firstname",
                "last_name": "Lastname",
                "password": "Password",
                "password_confirmation": "Confirm password",
                "old_password": "Old password",
                "new_password": "New password",
                "new_password_confirmation": "Confirm new password",
                "postal_code": "Postal code",
                "city": "City",
                "country": "Country",
                "address": "Address",
                "phone": "Phone",
                "mobile": "Mobile",
                "age": "Age",
                "sex": "Sex",
                "gender": "Gender",
                "day": "Day",
                "month": "Month",
                "year": "Year",
                "hour": "Hour",
                "minute": "Minute",
                "second": "Second",
                "title": "Title",
                "content": "Content",
                "description": "Description",
                "summary": "Summary",
                "excerpt": "Excerpt",
                "date": "Date",
                "time": "Time",
                "available": "Available",
                "size": "Size",
                "roles": "Roles",
                "permissions": "Permissions",
                "active": "Active",
                "message": "Message",
                "g-recaptcha-response": "Captcha",
                "locale": "Localization",
                "route": "Route",
                "url": "URL alias",
                "form_type": "Form type",
                "form_data": "Form data",
                "recipients": "Recipients",
                "source_path": "Original path",
                "target_path": "Target path",
                "redirect_type": "Redirect type",
                "timezone": "Timezone",
                "order": "Display order",
                "image": "Image",
                "status": "Status",
                "pinned": "Pinned",
                "promoted": "Promoted",
                "body": "Body",
                "tags": "Tags",
                "published_at": "Publish at",
                "unpublished_at": "Unpublish at",
                "metable_type": "Entity"
            }
        }
    },
    "ru": {
        "alerts": {
            "backend": {
                "users": {
                    "created": "Пользователь создан",
                    "updated": "Пользователь обновлён",
                    "deleted": "Пользователь удалён",
                    "bulk_destroyed": "Выбранные пользователи удалены",
                    "bulk_enabled": "Выбранные пользователи активированы",
                    "bulk_disabled": "Выбранные пользователи заблокированы"
                },
                "roles": {
                    "created": "Роль создана",
                    "updated": "Роль обновлена",
                    "deleted": "Роль удалена"
                },
                "metas": {
                    "created": "Метаданные созданы",
                    "updated": "Метаданные обновлены",
                    "deleted": "Метаданные удалены",
                    "bulk_destroyed": "Выбранные метаданные удалены"
                },
                "form_submissions": {
                    "deleted": "Представление удалёно",
                    "bulk_destroyed": "Выбранные представления удалены"
                },
                "form_settings": {
                    "created": "Настройка формы создана",
                    "updated": "Настройка формы обновлена",
                    "deleted": "Настройка формы удалена"
                },
                "redirections": {
                    "created": "Перенаправление создано",
                    "updated": "Перенаправление обновлено",
                    "deleted": "Перенаправление удалено",
                    "bulk_destroyed": "Выделенные перенаправления удалены",
                    "bulk_enabled": "Выделенные перенаправления включены",
                    "bulk_disabled": "Выделенные перенаправления отключены",
                    "file_imported": "Файл успешно импортирован"
                },
                "posts": {
                    "created": "Статья создана",
                    "updated": "Статья обновлена",
                    "deleted": "Статья удалена",
                    "bulk_destroyed": "Выбранные статьи удалены",
                    "bulk_published": "Выбранные статьи опубликованы",
                    "bulk_pending": "Выбранные статьи ожидают проверки",
                    "bulk_pinned": "Выбранные статьи закреплены",
                    "bulk_promoted": "Выбранные статьи выделены"
                },
                "actions": {
                    "invalid": "Неверное действие"
                }
            },
            "frontend": []
        },
        "auth": {
            "failed": "Имя пользователя или пароль указаны неверно.",
            "throttle": "Слишком много попыток входа. Пожалуйста, попробуйте снова через {seconds} секунд.",
            "socialite": {
                "unacceptable": "{provider} не является допустимым типом входа."
            }
        },
        "buttons": {
            "cancel": "Отмена",
            "save": "Сохранить",
            "close": "Закрыть",
            "create": "Создать",
            "delete": "Удалить",
            "confirm": "Подтвердить",
            "show": "Показать",
            "edit": "Изменить",
            "update": "Обновить",
            "view": "Смотреть",
            "preview": "Предпросмотр",
            "back": "Назад",
            "send": "Отправить",
            "login-as": "Войти как {name}",
            "apply": "Применить",
            "users": {
                "create": "Создать пользователя"
            },
            "roles": {
                "create": "Создать роль"
            },
            "metas": {
                "create": "Создать метаданные"
            },
            "form_settings": {
                "create": "Создать форму"
            },
            "redirections": {
                "create": "Создать перенаправление",
                "import": "Загрузить CSV"
            },
            "posts": {
                "create": "Создать статью",
                "save_and_publish": "Сохранить и опубликовать",
                "save_as_draft": "Сохранить как черновик"
            }
        },
        "exceptions": {
            "general": "Серверная ошибка",
            "unauthorized": "Недопустимое действие",
            "backend": {
                "users": {
                    "create": "Ошибка создания пользователя",
                    "update": "Ошибка обновления пользователя",
                    "delete": "Ошибка удаления пользователя",
                    "first_user_cannot_be_edited": "Вы не можете редактировать супер-администратора",
                    "first_user_cannot_be_disabled": "Супер-администратор не может быть отключён",
                    "first_user_cannot_be_destroyed": "Супер-администратор не может быть удалён",
                    "first_user_cannot_be_impersonated": "Нельзя войти под видом супер-администратора",
                    "cannot_set_superior_roles": "Вы не можете назначать роли, превосходящие ваши"
                },
                "roles": {
                    "create": "Ошибка создания роли",
                    "update": "Ошибка обновления роли",
                    "delete": "Ошибка удаления роли"
                },
                "metas": {
                    "create": "Ошибка создания метаданных",
                    "update": "Ошибка обновления метаданных",
                    "delete": "Ошибка удаления метаданных",
                    "already_exist": "Для этих языковых настроек уже есть метаданные"
                },
                "form_submissions": {
                    "create": "Ошибка создания представления",
                    "delete": "Ошибка удаления представления"
                },
                "form_settings": {
                    "create": "Ошибка создания настройки формы",
                    "update": "Ошибка обновления настройки формы",
                    "delete": "Ошибка удаления настройки формы",
                    "already_exist": "Уже существует настройка, связанная с этой формой"
                },
                "redirections": {
                    "create": "Ошибка создания перенаправления",
                    "update": "Ошибка обновления перенаправления",
                    "delete": "Ошибка удаления перенаправления",
                    "already_exist": "Для этого пути уже существует перенаправление"
                },
                "posts": {
                    "create": "Ошибка создания статьи",
                    "update": "Ошибка обновления статьи",
                    "save": "Ошибка сохранения статьи",
                    "delete": "Ошибка удаления статьи"
                }
            },
            "frontend": {
                "user": {
                    "email_taken": "Этот адрес электронной почты уже используется.",
                    "password_mismatch": "Это не ваш старый пароль.",
                    "delete_account": "Ошибка удаления аккаунта.",
                    "updating_disabled": "Редактирование аккаунта отключено."
                },
                "auth": {
                    "registration_disabled": "Регистрация отключена."
                }
            }
        },
        "forms": {
            "contact": {
                "display_name": "Форма обратной связи"
            }
        },
        "labels": {
            "language": "Язык",
            "actions": "Действия",
            "general": "Основные",
            "no_results": "Нет доступных результатов",
            "search": "Искать",
            "validate": "Применить",
            "choose_file": "Выберите файл",
            "no_file_chosen": "Файл не выбран",
            "are_you_sure": "Вы уверены?",
            "delete_image": "Удалить изображение",
            "yes": "Да",
            "no": "Нет",
            "add_new": "Добавить",
            "export": "Экспорт",
            "more_info": "Больше информации",
            "author": "Автор",
            "author_id": "ID автора",
            "last_access_at": "Последний доступ",
            "published_at": "Опубликовано",
            "created_at": "Создано",
            "updated_at": "Обновлено",
            "deleted_at": "Удалено",
            "no_value": "Нет значения",
            "upload_image": "Загрузить изображение",
            "anonymous": "Аноним",
            "all_rights_reserved": "Все права зарезервированы.",
            "with": "с",
            "by": "",
            "datatables": {
                "no_results": "Нет доступных результатов",
                "no_matched_results": "Не найдено подходящих результатов",
                "show_per_page": "Показать",
                "entries_per_page": "записей на страницу",
                "search": "Искать",
                "infos": "Показаны записи с {offset_start} по {offset_end} из {total}"
            },
            "morphs": {
                "post": "Статья, ID {id}",
                "user": "Пользователь, ID {id}"
            },
            "auth": {
                "disabled": "Ваш аккаунт заблокирован."
            },
            "http": {
                "403": {
                    "title": "Доступ запрещён",
                    "description": "Извините, но у вас нет прав доступа к этой странице."
                },
                "404": {
                    "title": "Ресурс не найден",
                    "description": "Извините, но этого ресурса не существует."
                },
                "500": {
                    "title": "Ошибка сервера",
                    "description": "Извините, но сервер столкнулся с ситуацией, которую он не может обработать. Мы исправим это как можно скорее."
                }
            },
            "localization": {
                "en": "Английский",
                "ru": "Русский",
                "fr": "Французский",
                "es": "Испанский",
                "de": "Немецкий",
                "zh": "Китайский",
                "ar": "Арабский",
                "pt": "Португальский"
            },
            "placeholders": {
                "route": "Выберите правильный внутренний маршрут",
                "tags": "Выберите или создайте метку"
            },
            "cookieconsent": {
                "message": "На этом сайте используются файлы cookie, чтобы вам было комфортнее им пользоваться.",
                "dismiss": "Понятно!"
            },
            "descriptions": {
                "allowed_image_types": "Доступные типы: PNG GIF JPG JPEG."
            },
            "user": {
                "dashboard": "Панель управления",
                "remember": "Запомнить",
                "login": "Вход",
                "logout": "Выход",
                "password_forgot": "Забыли пароль?",
                "send_password_link": "Отправить ссылку сброса пароля",
                "password_reset": "Сброс пароля",
                "register": "Регистрация",
                "space": "Моё пространство",
                "settings": "Настройки",
                "account": "Мой аккаунт",
                "profile": "Мой профиль",
                "avatar": "Аватар",
                "online": "В&nbsp;сети",
                "edit_profile": "Изменить мой профиль",
                "change_password": "Изменить мой пароль",
                "delete": "Удалить мой аккаунт",
                "administration": "Администрирование",
                "member_since": "Участник с {date}",
                "profile_updated": "Профиль успешно изменён.",
                "password_updated": "Пароль успешно изменён.",
                "super_admin": "Супер-администратор",
                "account_delete": "<p>Это действие полностью удалит вашу учетную запись с этого сайта, а также все связанные данные.<\/p>",
                "account_deleted": "Аккаунт успешно удалён",
                "titles": {
                    "space": "Моё пространство",
                    "account": "Мой аккаунт"
                }
            },
            "alerts": {
                "login_as": "Вы вошли как <strong>{name}<\/strong>, вы можете обратно войти как <a href=\"{route}\" data-turbolinks=\"false\">{admin}<\/a>."
            },
            "backend": {
                "dashboard": {
                    "new_posts": "Новые статьи",
                    "pending_posts": "Ожидающие одобрения статьи",
                    "published_posts": "Опубликованные статьи",
                    "active_users": "Активные пользователи",
                    "form_submissions": "Заполненные формы",
                    "last_posts": "Последние статьи",
                    "last_published_posts": "Последние публикации",
                    "last_pending_posts": "Последние ожидающие статьи",
                    "last_new_posts": "Последние новые статьи",
                    "all_posts": "Все статьи"
                },
                "new_menu": {
                    "post": "Новая статья",
                    "form_setting": "Новая форма",
                    "user": "Новый пользователь",
                    "role": "Новая роль",
                    "meta": "Новые метаданные",
                    "redirection": "Новое перенаправление"
                },
                "sidebar": {
                    "content": "Управление содержимым",
                    "forms": "Управление формами",
                    "access": "Управление доступом",
                    "seo": "Настройки SEO"
                },
                "titles": {
                    "dashboard": "Панель управления"
                },
                "users": {
                    "titles": {
                        "main": "Пользователи",
                        "index": "Список пользователей",
                        "create": "Создание пользователя",
                        "edit": "Изменение пользователя"
                    },
                    "actions": {
                        "destroy": "Удалить выбранных пользователей",
                        "enable": "Активировать выбранных пользователей",
                        "disable": "Отключить выбранных пользователей"
                    }
                },
                "roles": {
                    "titles": {
                        "main": "Роли",
                        "index": "Список ролей",
                        "create": "Создание роли",
                        "edit": "Изменение роли"
                    }
                },
                "metas": {
                    "titles": {
                        "main": "Метаданные",
                        "index": "Список метаданных",
                        "create": "Создание метаданных",
                        "edit": "Изменение метаданных"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные метаданные"
                    }
                },
                "form_submissions": {
                    "titles": {
                        "main": "Заполнения",
                        "index": "Список заполнений форм",
                        "show": "Детали заполнения формы"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные заполнения"
                    }
                },
                "form_settings": {
                    "titles": {
                        "main": "Формы",
                        "index": "Список форм",
                        "create": "Создание формы",
                        "edit": "Изменение формы"
                    },
                    "descriptions": {
                        "recipients": "Пример: 'webmaster@example.com' или 'sales@example.com,support@example.com'. Для указания нескольких получателей перечислите адреса через запятую.",
                        "message": "Сообщение для показа пользователю после отправки формы. Оставьте пустым, если ничего не надо показывать."
                    }
                },
                "redirections": {
                    "titles": {
                        "main": "Перенаправления",
                        "index": "Список перенаправлений",
                        "create": "Создание перенаправления",
                        "edit": "Изменение перенаправления"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные перенаправления",
                        "enable": "Активировать выбранные перенаправления",
                        "disable": "Отключить выбранные перенаправления"
                    },
                    "types": {
                        "permanent": "Постоянное перенаправление (301)",
                        "temporary": "Временное перенаправление (302)"
                    },
                    "import": {
                        "title": "Импорт CSV-файла",
                        "label": "Выберите CSV-файл для импорта",
                        "description": "Файл должен содержать две колонки с заголовками «source» (исходный) и «target» (целевой), перенаправления будут постоянные по-умолчанию."
                    }
                },
                "posts": {
                    "statuses": {
                        "draft": "Черновик",
                        "pending": "Ожидающее",
                        "published": "Опубликованное"
                    },
                    "titles": {
                        "main": "Статьи",
                        "index": "Список статей",
                        "create": "Создать статью",
                        "edit": "Редактировать статью",
                        "publication": "Параметры публикации"
                    },
                    "descriptions": {
                        "meta_title": "Если оставить пустым, по-умолчанию будет заголовком статьи.",
                        "meta_description": "Если оставить пустым, по умолчанию будет отображаться резюме статьи."
                    },
                    "placeholders": {
                        "body": "Напишите своё содержимое...",
                        "meta_title": "Заголовок статьи",
                        "meta_description": "Резюме статьи"
                    },
                    "actions": {
                        "destroy": "Удалить выбранные статьи",
                        "publish": "Опубликовать выбранные статьи",
                        "pin": "Закрепить выбранные статьи",
                        "promote": "Выделить выбранные статьи"
                    }
                }
            },
            "frontend": {
                "titles": {
                    "home": "Начало",
                    "about": "О нас",
                    "contact": "Контакты",
                    "blog": "Блог",
                    "message_sent": "Сообщение отправлено",
                    "legal_mentions": "Юридическая информация",
                    "administration": "Администрирование"
                },
                "submissions": {
                    "message_sent": "<p>Ваше сообщение успешно отправлено.<\/p>"
                },
                "placeholders": {
                    "locale": "Выберите свой язык",
                    "timezone": "Выберите свой часовой пояс"
                },
                "blog": {
                    "published_at": "Опубликовано {date}",
                    "published_at_with_owner_linkable": "Опубликовано <a href=\"{link}\">{name}<\/a>, {date}",
                    "tags": "Метки"
                }
            }
        },
        "logs": {
            "backend": {
                "users": {
                    "created": "Пользователь ID {user} создан",
                    "updated": "Пользователь ID {user} обновлён",
                    "deleted": "Пользователь ID {user} удалён"
                },
                "form_submissions": {
                    "created": "Заполнение формы ID {form_submission} создано"
                }
            },
            "frontend": []
        },
        "mails": {
            "layout": {
                "hello": "Здравствуйте!",
                "regards": "С уважением",
                "trouble": "Если у вас не получается воспользоваться кнопкой {action}, скопируйте URL ниже и откройте его в удобном вам браузере:",
                "all_rights_reserved": "Все права зарезервированы."
            },
            "password_reset": {
                "subject": "Сброс пароля",
                "intro": "Вам отправлено это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.",
                "action": "Сбросить пароль",
                "outro": "Если вы не запрашивали сброс пароля, просто проигнорируйте это письмо."
            },
            "contact": {
                "subject": "Новое сообщение с сайта",
                "new_contact": "Получено новое сообщение с сайта:"
            },
            "alert": {
                "subject": "[{app_name}] Ошибка приложения",
                "message": "На сервере произошёл сбой со следующим сообщением об ошибке: {message}",
                "trace": "Детали трассировки:"
            }
        },
        "pagination": {
            "previous": "&laquo;&nbsp;Назад",
            "next": "Вперёд&nbsp;&raquo;"
        },
        "passwords": {
            "password": "Пароль должен быть как минимум 6 символов длиной и совпадать с подтверждением.",
            "reset": "Ваш пароль изменён!",
            "sent": "Мы отправили вам на почту ссылку для сброса пароля!",
            "token": "Неверный токен сброса пароля.",
            "user": "У нас нет пользователя с таким адресом электронной почты."
        },
        "permissions": {
            "categories": {
                "blog": "Блог",
                "form": "Формы",
                "access": "Доступ",
                "seo": "SEO"
            },
            "access": {
                "backend": {
                    "display_name": "Доступ к бэк-офису",
                    "description": "Доступ к страницам администрирования."
                }
            },
            "view": {
                "form_settings": {
                    "display_name": "Просмотр настроек формы",
                    "description": "Можно просматривать настройки формы."
                },
                "form_submissions": {
                    "display_name": "Просмотр заполнений форм",
                    "description": "Пожно просматривать данные заполнения форм."
                },
                "users": {
                    "display_name": "Просмотр пользователей",
                    "description": "Можно видеть список пользователей."
                },
                "roles": {
                    "display_name": "Просмотр ролей",
                    "description": "Можно видеть список ролей."
                },
                "metas": {
                    "display_name": "Просмотр метаданных",
                    "description": "Можно видеть метаданные."
                },
                "redirections": {
                    "display_name": "Просмотр перенаправлений",
                    "description": "Можно видеть список перенаправлений."
                },
                "posts": {
                    "display_name": "Просмотр всех статей",
                    "description": "Можно видеть все статьи."
                },
                "own": {
                    "posts": {
                        "display_name": "Просмотр своих статей",
                        "description": "Можно видеть свои статьи."
                    }
                }
            },
            "create": {
                "form_settings": {
                    "display_name": "Создание форм",
                    "description": "Можно создавать новые формы."
                },
                "users": {
                    "display_name": "Создание пользователей",
                    "description": "Можно создавать новых пользователей."
                },
                "roles": {
                    "display_name": "Создание ролей",
                    "description": "Можно создавать новые роли."
                },
                "metas": {
                    "display_name": "Создание метаданных",
                    "description": "Можно создавать новые метаданные."
                },
                "redirections": {
                    "display_name": "Создание перенеправлений",
                    "description": "Можно создавать новые перенаправления."
                },
                "posts": {
                    "display_name": "Создание статей",
                    "description": "Можно создавать новые статьи."
                }
            },
            "edit": {
                "form_settings": {
                    "display_name": "Правка форм",
                    "description": "Можно изменять данные форм."
                },
                "users": {
                    "display_name": "Правка пользователей",
                    "description": "Можно изменять данные пользователей."
                },
                "roles": {
                    "display_name": "Правка ролей",
                    "description": "Можно изменять данные ролей."
                },
                "metas": {
                    "display_name": "Правка метаданных",
                    "description": "Можно изменять данные метаданных."
                },
                "redirections": {
                    "display_name": "Правка перенаправлений",
                    "description": "Можно изменять данные перенаправлений."
                },
                "posts": {
                    "display_name": "Правка всех статей",
                    "description": "Можно изменять данные всех статей."
                },
                "own": {
                    "posts": {
                        "display_name": "Правка своих статей",
                        "description": "Можно изменять данные своих статей."
                    }
                }
            },
            "delete": {
                "form_settings": {
                    "display_name": "Удаление форм",
                    "description": "Можно удалять формы."
                },
                "form_submissions": {
                    "display_name": "Удаление заполнений форм",
                    "description": "Можно удалять данные заполнения форм."
                },
                "users": {
                    "display_name": "Удаление пользователей",
                    "description": "Можно удалять пользователей."
                },
                "roles": {
                    "display_name": "Удаление ролей",
                    "description": "Можно удалять роли."
                },
                "metas": {
                    "display_name": "Удаление метаданных",
                    "description": "Можно удалять метаданные."
                },
                "redirections": {
                    "display_name": "Удаление перенаправлений",
                    "description": "Можно удалять перенаправления."
                },
                "posts": {
                    "display_name": "Удаление всех статьи",
                    "description": "Можно удалять все статьи."
                },
                "own": {
                    "posts": {
                        "display_name": "Удаление своих статей",
                        "description": "Можно удалять свои статьи."
                    }
                }
            },
            "publish": {
                "posts": {
                    "display_name": "Публикация статей",
                    "description": "Можно управлять публикацией статей."
                }
            },
            "impersonate": {
                "display_name": "Войти под видом пользователя",
                "description": "Можно войти под видом другого пользователя. Полезно для тестирования."
            }
        },
        "routes": {
            "home": "home",
            "about": "about",
            "contact": "contact",
            "contact-sent": "contact-sent",
            "legal-mentions": "legal-mentions",
            "redactors": "blog\/redactors\/{user}"
        },
        "validation": {
            "accepted": "{attribute} должен быть принят.",
            "active_url": "{attribute} является некорректным URL.",
            "after": "{attribute} должен быть датой после {date}.",
            "after_or_equal": "{attribute} должен быть датой после или равной {date}.",
            "alpha": "{attribute} может содержать только буквы.",
            "alpha_dash": "{attribute} может содержать только буквы, цифры и дефисы.",
            "alpha_num": "{attribute} может содержать только буквы и цифры.",
            "array": "{attribute} должен быть списком.",
            "before": "{attribute} должен быть датой до {date}.",
            "before_or_equal": "{attribute} должен быть датой до или равной {date}.",
            "between": {
                "numeric": "{attribute} должен быть между {min} и {max}.",
                "file": "{attribute} должен быть между {min} и {max} kilobytes.",
                "string": "{attribute} должен быть между {min} и {max} characters.",
                "array": "{attribute} должен содержать от {min} до {max} элементов."
            },
            "boolean": "{attribute} должен быть «истина» или «ложь».",
            "confirmed": "{attribute} подтверждение не совпадает.",
            "date": "{attribute} не является корректной датой.",
            "date_format": "{attribute} не совпадает с форматом {format}.",
            "different": "{attribute} и {other} должны различаться.",
            "digits": "{attribute} должен содержать {digits} цифр.",
            "digits_between": "{attribute} должен быть от {min} до {max} цифр.",
            "dimensions": "{attribute} содержит неверные размеры изображения.",
            "distinct": "{attribute} содержит дублирующее значение.",
            "email": "{attribute} должен быть корректным почтовым адресом.",
            "exists": "выбранный {attribute} неверен.",
            "file": "{attribute} должен быть файлом.",
            "filled": "{attribute} должен быть заполнен.",
            "image": "{attribute} должен быть изображением.",
            "in": "выбранный {attribute} неверен.",
            "in_array": "{attribute} отсутствует в {other}.",
            "integer": "{attribute} должен быть целым.",
            "ip": "{attribute} должен быть корректным IP-адресом.",
            "ipv4": "{attribute} должен быть корректным IPv4-адресом.",
            "ipv6": "{attribute} должен быть корректным IPv6-адресом.",
            "json": "{attribute} должен быть корректной JSON-строкой.",
            "max": {
                "numeric": "{attribute} не может быть более чем {max}.",
                "file": "{attribute} не может быть более чем {max} Кб.",
                "string": "{attribute} не может быть более чем {max} символов.",
                "array": "{attribute} не может содержать более чем {max} значений."
            },
            "mimes": "{attribute} должен быть файлом типа {values}.",
            "mimetypes": "{attribute} должен быть файлом типа {values}.",
            "min": {
                "numeric": "{attribute} должен быть не менее чем {min}.",
                "file": "{attribute} должен быть не менее чем {min} Кб.",
                "string": "{attribute} должен содержать не менее чем {min} символов.",
                "array": "{attribute} должен содержать не менее чем {min} значений."
            },
            "not_in": "выбранный {attribute} неверен.",
            "not_regex": "формат {attribute} неверен.",
            "numeric": "{attribute} должен быть числом.",
            "present": "поле {attribute} должно присутствовать.",
            "regex": "формат {attribute} неверен.",
            "required": "поле {attribute} обязательно.",
            "required_if": "поле {attribute} обязательно, когда {other} равно {value}.",
            "required_unless": "поле {attribute} обязательно, если {other} в {values}.",
            "required_with": "поле {attribute} обязательно, если присутствуют {values}.",
            "required_with_all": "поле {attribute} обязательно, если присутствуют {values}.",
            "required_without": "поле {attribute} обязательно, если отсутствуют {values}.",
            "required_without_all": "поле {attribute} обязательно, если нет ничего из {values}.",
            "same": "{attribute} и {other} должны совпадать.",
            "size": {
                "numeric": "{attribute} должно быть {size}.",
                "file": "{attribute} должно быть {size} Кб.",
                "string": "{attribute} должно быть {size} символов.",
                "array": "{attribute} должно содержать {size} элементов."
            },
            "string": "{attribute} должно быть строкой.",
            "timezone": "{attribute} должно быть корректным часовым поясом.",
            "unique": "{attribute} уже есть в базе.",
            "uploaded": "{attribute} не получилось загрузить.",
            "url": "{attribute} имеет неверный формат.",
            "custom": {
                "attribute-name": {
                    "rule-name": "custom-message"
                }
            },
            "attributes": {
                "name": "Имя",
                "display_name": "Отображаемое имя",
                "username": "Псевдоним",
                "email": "E-mail",
                "first_name": "Имя",
                "last_name": "Фамилия",
                "password": "Пароль",
                "password_confirmation": "Подтверждение пароля",
                "old_password": "Старый пароль",
                "new_password": "Новый пароль",
                "new_password_confirmation": "Подтверждение нового пароля",
                "postal_code": "Почтовы индекс",
                "city": "Город",
                "country": "Страна",
                "address": "Адрес",
                "phone": "Телефон",
                "mobile": "Мобильный",
                "age": "Возраст",
                "sex": "Пол",
                "gender": "Пол",
                "day": "День",
                "month": "Месяц",
                "year": "Год",
                "hour": "Час",
                "minute": "Минута",
                "second": "Секунда",
                "title": "Заголовок",
                "content": "Содержание",
                "description": "Описание",
                "summary": "Резюме",
                "excerpt": "Отрывок",
                "date": "Дата",
                "time": "Время",
                "available": "Доступный",
                "size": "Размер",
                "roles": "Роли",
                "permissions": "Права",
                "active": "Активный",
                "message": "Сообщение",
                "g-recaptcha-response": "Защитный код",
                "locale": "Локализация",
                "route": "Маршрут",
                "url": "URL",
                "form_type": "Тип формы",
                "form_data": "Данные формы",
                "recipients": "Получатели",
                "source_path": "Исходный путь",
                "target_path": "Целевой путь",
                "redirect_type": "Тип переадресации",
                "timezone": "Часовой пояс",
                "order": "Порядок показа",
                "image": "Изображение",
                "status": "Статус",
                "pinned": "Закреплено",
                "promoted": "Выделено",
                "body": "Основная часть",
                "tags": "Метки",
                "published_at": "Опубликовано",
                "unpublished_at": "Снято с публикации",
                "metable_type": "Сущность"
            }
        }
    }
}
