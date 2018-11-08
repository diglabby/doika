import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'

// Views
import Search from '../views/Search'
import Campaigns from '../views/Campaigns'
import CampaignForm from '../views/CampaignForm'
import Payments from '../views/Payments'
import PaymentForm from '../views/PaymentForm'
import Help from '../views/Help'
import Feedback from '../views/Feedback'
import Settings from '../views/Settings'
import UserForm from '../views/UserForm'
import UserList from '../views/UserList'

Vue.use(Router)

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
              label: i18n.t('labels.common.search')
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
            name: 'campaigns',
            component: {
              render(c) {
                return c('router-view')
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
            path: 'payments',
            name: 'payments',
            component: Payments,
            meta: {
              label: i18n.t('labels.admin.payments.title')
            }
          },
          {
            path: 'payments',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.admin.payments.title')
            },
            children: [
              {
                path: ':id/edit',
                name: 'payments_edit',
                component: PaymentForm,
                props: true,
                meta: {
                  label: i18n.t('labels.admin.payments.show.title')
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
            path: 'users',
            component: {
              render(c) {
                return c('router-view')
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
            path: 'roles',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.roles.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'roles',
                component: RoleList,
                meta: {
                  label: i18n.t('labels.backend.roles.titles.index')
                }
              },
              {
                path: 'create',
                name: 'roles_create',
                component: RoleForm,
                meta: {
                  label: i18n.t('labels.backend.roles.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'roles_edit',
                component: RoleForm,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.roles.titles.edit')
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
          },
          {
            path: 'redirections',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.redirections.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'redirections',
                component: RedirectionList,
                meta: {
                  label: i18n.t('labels.backend.redirections.titles.index')
                }
              },
              {
                path: 'create',
                name: 'redirections_create',
                component: RedirectionForm,
                meta: {
                  label: i18n.t('labels.backend.redirections.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'redirections_edit',
                component: RedirectionForm,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.redirections.titles.edit')
                }
              }
            ]
          }
        ]
      }
    ]
  })
}
