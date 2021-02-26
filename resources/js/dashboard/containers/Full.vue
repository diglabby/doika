<style>
.sidebar .nav-link {
  padding: 0.5rem 1rem;
}
</style>
<template>
  <div class="app">
    <AppHeader></AppHeader>
    <div class="app-body">
      <Sidebar fixed>
        <SidebarNav :nav-items="nav">
</SidebarNav>
        <b-button
          class="container-fluid btn btn-success"
          style="margin-top:auto !important; margin-bottom:50px; width: 80%;"
          href="https://t.me/dbai4ua"
        >
          {{ $t('buttons.admin.support') }}
        </b-button>
        <SidebarFooter> </SidebarFooter>
      </Sidebar>
      <main class="main">
        <breadcrumb :list="$route.matched"></breadcrumb>
        <div class="container-fluid">
          <router-view :key="$route.name"></router-view>
        </div>
      </main>
      <Aside fixed></Aside>
    </div>
    <AppFooter
      :name="$app.appName"
      :editor-name="$app.editorName"
      :editor-site-url="$app.editorSiteUrl"
      :app-version="$app.appVersion"
    ></AppFooter>
  </div>
</template>

<script>
import nav from '../_nav';

import AppFooter from '../components/Footer';
import AppHeader from '../components/Header';

export default {
  name: 'Full',
  components: {
    AppHeader,
    AppFooter
  },
  data() {
    return {
      nav: []
    };
  },
  watch: {
    $route: 'fetchData'
  },
  created() {
    this.initNav();
    this.fetchData();
  },
  methods: {
    initNav() {
      this.nav = nav(this.$app, this.$i18n);
    },
    async fetchData() {
      this.initNav();
    }
  }
};
</script>
