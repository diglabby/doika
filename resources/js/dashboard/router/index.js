import Vue from 'vue';
import Router from 'vue-router';

// Containers
import Full from '../containers/Full';

// Views
import Search from '../views/Search';
import Campaigns from '../views/Campaigns';
import CampaignForm from '../views/CampaignForm';
import Payments from '../views/Payments';
import PaymentForm from '../views/PaymentForm';
import Help from '../views/Help';
import Feedback from '../views/Feedback';
import Settings from '../views/Settings';
import UserForm from '../views/UserForm';
import UserList from '../views/UserList';
import Notifications from '../views/Notifications';
import NotificationsForm from '../views/NotificationsForm';
import PaymentSystems from '../views/PaymentSystems';
import Layout from '../views/Layout';

Vue.use(Router);

export function createRouter(base, i18n) {
  return new Router({
    mode: 'history',
    base: base,
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
      {
        path: '/',
        redirect: '/campaigns',
        name: 'home',
        component: Full,
        meta: {
          label: i18n.t('labels.admin.title')
        },
        children: [
          {
            path: 'search',
            name: 'search',
            component: Search,
            meta: {
              label: i18n.t('labels.admin.common.search')
            }
          },
          {
            path: 'campaigns',
            name: 'campaigns',
            component: Campaigns,
            meta: {
              label: i18n.t('labels.admin.campaigns.breadcrumb')
            }
          },
          {
            path: 'campaigns',
            component: {
              render(c) {
                return c('router-view');
              }
            },
            meta: {
              label: i18n.t('labels.admin.campaigns.title')
            },
            children: [
              {
                path: 'create',
                name: 'campaigns_create',
                component: CampaignForm,
                meta: {
                  label: i18n.t('labels.admin.campaigns.create.title')
                }
              },
              {
                path: ':id/edit',
                name: 'campaigns_edit',
                component: CampaignForm,
                props: true,
                meta: {
                  label: i18n.t('labels.admin.campaigns.edit.title')
                }
              }
            ]
          },
          {
            path: 'transactions',
            name: 'transactions',
            component: Payments,
            meta: {
              label: i18n.t('labels.admin.transactions.title')
            }
          },
          {
            path: 'transactions',
            component: {
              render(c) {
                return c('router-view');
              }
            },
            meta: {
              label: i18n.t('labels.admin.transactions.title')
            },
            children: [
              {
                path: ':id/edit',
                name: 'transactions_edit',
                component: PaymentForm,
                props: true,
                meta: {
                  label: i18n.t('labels.admin.transactions.show.title')
                }
              }
            ]
          },
          {
            path: 'feedback',
            component: Feedback,
            meta: {
              label: i18n.t('labels.admin.feedback.title')
            }
          },
          {
            path: 'settings',
            component: Settings,
            meta: {
              label: i18n.t('labels.admin.settings.title')
            }
          },
          {
            path: 'layout',
            component: Layout,
            meta: {
              label: i18n.t('labels.admin.layout.title')
            }
          },
          {
            path: 'paymentSystems',
            component: PaymentSystems,
            meta: {
              label: i18n.t('labels.admin.paymentSystems.title')
            }
          },
          {
            path: 'notifications',
            component: Notifications,
            props: true,
            meta: {
              label: i18n.t('labels.admin.notifications.title')
            },
            children: [
              {
                path: ':id/edit',
                name: 'notification_edit',
                component: NotificationsForm
              }
            ]
          },
          {
            path: 'users',
            component: {
              render(c) {
                return c('router-view');
              }
            },
            meta: {
              label: i18n.t('labels.admin.users.title')
            },
            children: [
              {
                path: '/',
                name: 'users',
                component: UserList,
                meta: {
                  label: i18n.t('labels.admin.users.breadcrumb')
                }
              },
              {
                path: 'create',
                name: 'users_create',
                component: UserForm,
                meta: {
                  label: i18n.t('labels.admin.users.create.breadcrumb')
                }
              },
              {
                path: ':id/edit',
                name: 'users_edit',
                component: UserForm,
                props: true,
                meta: {
                  label: i18n.t('labels.admin.users.edit.breadcrumb')
                }
              }
            ]
          },
          {
            path: 'help',
            name: 'help',
            component: Help,
            meta: {
              label: i18n.t('labels.admin.help.title')
            }
          }
        ]
      }
    ]
  });
}
