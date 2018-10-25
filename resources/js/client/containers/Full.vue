<template>
  <div class="app">
    <AppHeader></AppHeader>
  
    <AppFooter :name="$app.appName" :editor-name="$app.editorName"
               :editor-site-url="$app.editorSiteUrl"
    >
      <div class="module-donate__footer">
        <a class="payment__description"></a>
        <p class="result__description"></p>
        <div class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></div>
      </div>
    </AppFooter>
  </div>
</template>

<script>
import nav from '../_nav'

import AppFooter from '../components/Footer'
import AppHeader from '../components/Header'
//import AppBody from '../components/Body'

export default {
  name: 'Full',
  components: {
    AppHeader,
    AppFooter
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
      await this.$store.dispatch('LOAD_COUNTERS')
      this.initNav()
    }
  }
}
</script>
