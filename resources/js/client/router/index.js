import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'

// Views

import MainWindow from '../views/MainWindow'
import DonateWindow from '../views/DonateWindow'

Vue.use(Router)

export function createRouter(base, i18n) {
  return new Router({
    mode: 'history',
    base: base,
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
      {
        path: '/campaign/',
        name: 'campaign',
        component: Full,
        meta: {
          label: i18n.t('labels.admin.title')
        },
        children: [
          {
            path: ':id',
            name: 'id',
            component: MainWindow,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          },
          {
            path: ':id/donate',
            name: 'donate',
            component: DonateWindow,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          }
        ]
      }
    ]
  })
}
