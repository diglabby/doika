<template>
  <div class="app">
    <AppHeader></AppHeader>
    <div class="app-body">
      <Sidebar fixed>
        <AppSearch></AppSearch>
        <SidebarNav :nav-items="nav">
        </SidebarNav>
        <b-button class="container-fluid btn btn-success" style="margin-top:auto !important; border: 1px solid white; width: 80%; height: 50px;">
          {{ $t('buttons.admin.support') }}
        </b-button>
        <SidebarFooter>
        </SidebarFooter>
        <SidebarMinimizer>
        </SidebarMinimizer>
      </Sidebar>
      <main class="main">
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
      this.nav = nav(this.$app, this.$i18n)
    },
    async fetchData() {
      this.initNav()
    }
  }
}
</script>
