<template>
  <div class="app">
    <AppHeader></AppHeader>
    <div class="app-body">
      <Sidebar fixed>
        <AppSearch></AppSearch>
        <SidebarNav :nav-items="nav">
        </SidebarNav>
        <div class="container-fluid" style="margin-top:auto !important; border: 1px solid white; width: 80%; height: 50px; text-align: center; line-height: 46px;">
          {{ $t('labels.help') }}
        </div>
        <SidebarFooter>
        </SidebarFooter>
        <SidebarMinimizer>
        </SidebarMinimizer>
      </Sidebar>
      <main class="main">
        <b-alert variant="warning" class="alert-top mb-0" :show="$app.isImpersonation">
          <span v-html="$t('labels.alerts.login_as', {'name': $app.user.name, 'route': $app.route('admin.logout'), 'admin': $app.usurperName})"></span>
        </b-alert>
        <breadcrumb :list="$route.matched"></breadcrumb>
        <div class="container-fluid">
          <router-view :key="$route.name"></router-view>
        </div>
      </main>
      <Aside fixed></Aside>
    </div>
    <AppFooter :name="$app.appName" :editor-name="$app.editorName"
               :editor-site-url="$app.editorSiteUrl"
    ></AppFooter>
  </div>
</template>

<script>
import nav from '../_nav'

import AppFooter from '../components/Footer'
import AppHeader from '../components/Header'
import AppSearch from '../components/Search'

export default {
  name: 'Full',
  components: {
    AppHeader,
    AppFooter,
    AppSearch
  },
  data() {
    return {
      nav: []
    }
  },
  watch: {
    $route: 'fetchData'
  },
  created() {
    this.initNav()
    this.fetchData()
  },
  methods: {
    initNav() {
      this.nav = nav(
        this.$app,
        this.$i18n,
        this.$store.state.counters.newPostsCount,
        this.$store.state.counters.pendingPostsCount
      )
    },
    async fetchData() {
      await this.$store.dispatch('LOAD_COUNTERS')
      this.initNav()
    }
  }
}
</script>
