<template>
  <router-view></router-view>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style lang="scss">
.description-shadow {
  & .ql-snow.ql-toolbar {
    border: none;
    border-bottom: 1px solid rgba(0, 40, 100, 0.12);
  }
  & .ql-container.ql-snow {
    border: none;
  }
}
</style>