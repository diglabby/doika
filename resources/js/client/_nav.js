export default (app, i18n, newPostsCount, pendingPostsCount) => {
  return [
    {
      name: i18n.t('labels.client.titles.main'),
      url: '/campaign/1/donate',
      icon: 'fe fe-trending-up',
      access: true
    }
  ]
}
