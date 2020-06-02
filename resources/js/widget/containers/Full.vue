<template>
  <div class="app">
    <div class="container-fluid">
      <transition name="fade" mode="out-in">
        <router-view :key="$route.name"></router-view>
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Full',
  data() {
    return {
      transitionName: 'slide-left'
    };
  },
  beforeRouteUpdate(to, from, next) {
    const toDepth = to.path.split('/').length;
    const fromDepth = from.path.split('/').length;
    this.transitionName = toDepth < fromDepth ? 'slide-right' : 'slide-left';
    next();
  }
};
</script>
