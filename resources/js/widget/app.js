import './load-client-scripts';

// Vue & axios
import Vue from 'vue';
import '../vendor/axios-config';

import 'babel-polyfill';
import BootstrapVue from 'bootstrap-vue';
import Vuelidate from 'vuelidate';

// Vendor plugins components
import '../vendor/coreui/components';
import DataTable from './components/Plugins/DataTable';
import DateTimePicker from './components/Plugins/DateTimePicker';
import Switch from './components/Plugins/Switch';
import vSelect from './components/Plugins/Select';

import { createRouter } from './router';
import { createStore } from './store';
import { createLocales } from '../vendor/vue-i18n-config';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.min.css';
import 'vue-material/dist/theme/default-dark.css';
import App from './App.vue';
import Noty from 'noty';

// Bootstrap Vue

Vue.use(VueMaterial);
Vue.use(BootstrapVue);
// vue-select
Vue.component('v-select', vSelect);

//vuelidate
Vue.use(Vuelidate);

// Custom components
Vue.component('c-switch', Switch);
Vue.component('p-datetimepicker', DateTimePicker);
Vue.component('b-datatable', DataTable);

export function createApp() {
  // Init router and store
  const i18n = createLocales(window.settings.locale);
  let basePath = window.settings.widgetBasePath;
  const router = createRouter(basePath, i18n);
  const store = createStore(window.route);

  /**
   * Server-side settings
   */
  Vue.prototype.$app = window.settings;

  /**
   * Server-side named routes function router
   */
  Vue.prototype.$app.route = window.route;

  /**
   * Client-side permissions
   */
  if (Vue.prototype.$app.user) {
    Vue.prototype.$app.user.can = permission => {
      if (Vue.prototype.$app.user.id === 1) {
        return true;
      }
      return Vue.prototype.$app.permissions.includes(permission);
    };
  }

  /**
   * Object to FormData converter
   */
  let objectToFormData = (obj, form, namespace) => {
    let fd = form || new FormData();

    for (let property in obj) {
      if (!obj.hasOwnProperty(property)) {
        continue;
      }

      let formKey = namespace ? `${namespace}[${property}]` : property;

      if (obj[property] === null) {
        fd.append(formKey, '');
        continue;
      }
      if (typeof obj[property] === 'boolean') {
        fd.append(formKey, obj[property] ? '1' : '0');
        continue;
      }
      if (obj[property] instanceof Date) {
        fd.append(formKey, obj[property].toISOString());
        continue;
      }
      if (
        typeof obj[property] === 'object' &&
        !(obj[property] instanceof File)
      ) {
        objectToFormData(obj[property], fd, formKey);
        continue;
      }
      fd.append(formKey, obj[property]);
    }

    return fd;
  };

  Vue.prototype.$app.objectToFormData = objectToFormData;

  /**
   * Notifications
   */
  let noty = (type, text) => {
    new Noty({
      layout: 'topRight',
      theme: 'bootstrap-v4',
      timeout: 2000,
      text,
      type
    }).show();
  };

  Vue.prototype.$app.noty = {
    alert: text => {
      noty('alert', text);
    },
    success: text => {
      noty('success', text);
    },
    error: text => {
      noty('error', text);
    },
    warning: text => {
      noty('warning', text);
    },
    info: text => {
      noty('info', text);
    }
  };

  Vue.prototype.$app.error = error => {
    if (error instanceof String) {
      noty('error', error);
      return;
    }

    if (error.response) {
      // Not allowed error
      if (error.response.status === 403) {
        noty('error', i18n.t('exceptions.unauthorized'));
        return;
      }

      // Domain error
      if (error.response.data.error !== undefined) {
        noty('error', error.response.data.message);
        return;
      }
    }

    // Generic error
    noty('error', i18n.t('exceptions.general'));
  };

  router.beforeEach((to, from, next) => {
    document.title = `${to.meta.label} | ${window.settings.appName}`;
    next();
  });

  const app = new Vue({
    router,
    store,
    i18n,
    render: h => h(App)
  });

  return { app, router, store };
}

// Init App
if (document.getElementById('doikaWidget') !== null) {
  const { app } = createApp();
  app.$mount('#doikaWidget');
}
