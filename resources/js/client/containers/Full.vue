<template>
  <div class="app">
    <div class="container-fluid">
      <router-view :key="$route.name"></router-view>
    </div>
  </div>
</template>

<script>
import nav from '../_nav'

export default {
  name: 'Full',
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
