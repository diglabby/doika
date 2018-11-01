export default (app, i18n, newPostsCount, pendingPostsCount) => {
  return [
    {
      name: i18n.t('labels.backend.titles.campaigns'),
      url: '/campaigns',
      icon: 'fe fe-list',
      access: true
    },
    {
      name: i18n.t('labels.backend.titles.payments'),
      url: '/payments',
      icon: 'fe fe-dollar-sign',
      access: true
    },
    {
      divider: true,
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.backend.sidebar.content'),
      access: app.blogEnabled && app.user.can('view own posts')
    },
    {
      name: i18n.t('labels.backend.campaigns.titles.main'),
      url: '/posts',
      icon: 'fe fe-book',
      access: app.blogEnabled && app.user.can('view own posts')
    },
    {
      divider: true,
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.backend.sidebar.configuration'),
      access:
        app.user.can('view form_submissions') ||
        app.user.can('view form_settings')
    },
    {
      name: i18n.t('labels.backend.titles.paymentConfig'),
      url: '/form-submissions',
      icon: 'fe fe-credit-card',
      access: app.user.can('view form_submissions')
    },
    {
      name: i18n.t('labels.backend.titles.layoutConfig'),
      url: '/form-submissions',
      icon: 'fe fe-layout',
      access: app.user.can('view form_submissions')
    },
    {
      name: i18n.t('labels.backend.titles.notificationsConfig'),
      url: '/form-submissions',
      icon: 'fe fe-bell',
      access: app.user.can('view form_submissions')
    },
    {
      divider: true,
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.backend.sidebar.access'),
      access: app.user.can('view users') || app.user.can('view roles')
    },
    {
      name: i18n.t('labels.backend.users.titles.main'),
      url: '/users',
      icon: 'fe fe-users',
      access: app.user.can('view users')
    },
    {
      name: i18n.t('labels.backend.roles.titles.main'),
      url: '/roles',
      icon: 'fe fe-shield',
      access: app.user.can('view roles')
    },
    {
      divider: true,
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.backend.sidebar.guides'),
      access: app.user.can('view metas') || app.user.can('view redirections')
    },
    {
      name: i18n.t('labels.backend.titles.howTo'),
      url: '/form-submissions',
      icon: 'fe fe-help-circle',
      access: app.user.can('view form_submissions')
    },
    {
      title: true,
      name: i18n.t('labels.backend.sidebar.feedback'),
      access: app.user.can('view metas') || app.user.can('view redirections')
    },
    {
      name: i18n.t('labels.backend.titles.sendFeedback'),
      url: '/metas',
      icon: 'fe fe-tag',
      access: app.user.can('view metas')
    }
  ]
}
