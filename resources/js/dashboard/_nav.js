export default (app, i18n, newPostsCount, pendingPostsCount) => {
  return [
    {
      name: i18n.t('labels.admin.campaigns.title'),
      url: '/campaigns',
      icon: 'fe fe-list',
      access: true
    },
    {
      name: i18n.t('labels.admin.transactions.title'),
      url: '/transactions',
      icon: 'fe fe-dollar-sign',
      access: true
    },
    {
      divider: true,
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.admin.rightMenu.divider.configuration'),
      access: true
    },
    {
      name:  i18n.t('labels.admin.paymentSystems.title'),
      url: '/paymentSystems',
      icon: 'fe fe-settings',
      access: true
    },
    {
      divider: true,
      access: true
    },
    {
      name: i18n.t('labels.admin.layout.title'),
      url: '/layout',
      icon: 'fe fe-settings',
      access: true
    },
    {
      divider: true,
      access: true
    },
    {
      name: i18n.t('labels.admin.notifications.title'),
      url: '/notifications',
      icon: 'fe fe-settings',
      access: true
    },
    {
      divider: true,
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.admin.rightMenu.divider.access'),
      access: true
    },
    {
      name: i18n.t('labels.admin.users.title'),
      url: '/users',
      icon: 'fe fe-users',
      access: true
    },
    {
      divider: true,
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.admin.rightMenu.divider.help'),
      access: true
    },
    {
      name: i18n.t('labels.admin.help.title'),
      url: '/help',
      icon: 'fe fe-help-circle',
      access: true
    },
    {
      title: true,
      name: i18n.t('labels.admin.rightMenu.divider.feedback'),
      access: true
    },
    {
      name: i18n.t('labels.admin.feedback.title'),
      url: '/feedback',
      icon: 'fe fe-tag',
      access: true
    }
  ]
}
