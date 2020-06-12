import Vue from 'vue';
import Router from 'vue-router';

// Containers
import Full from '../containers/Full';

// Views

import MainWindow from '../views/MainWindow';
import DonateWindow from '../views/DonateWindow';
import RecurrentWindow from '../views/RecurrentWindow';
import RecurrentDonateWindow from '../views/RecurrentDonateWindow';
import StatusWindow from '../views/StatusWindow';

Vue.use(Router);

export function createRouter(base, i18n) {
  return new Router({
    mode: 'history',
    base: base,
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
      {
        path: '/campaigns/',
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
            props: true,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          },
          {
            path: ':id/donate/status',
            name: 'donateStatus',
            component: StatusWindow,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          },
          {
            path: ':id/recurrent',
            name: 'recurrent',
            component: RecurrentWindow,
            props: true,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          },
          {
            path: ':id/recurrent/donate',
            name: 'recurrentDonate',
            component: RecurrentDonateWindow,
            props: true,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          },
          {
            path: ':id/recurrent/status',
            name: 'recurrentStatus',
            component: StatusWindow,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          },
          {
            path: ':id/donation-result/:status',
            name: 'status',
            component: StatusWindow,
            props: true,
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            }
          }
        ]
      }
    ]
  });
}
