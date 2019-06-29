<template>
  <Footer>
    <div class="module-donate__footer">
      <a class="payment__description"></a>
      <p class="result__description"></p>
      <div class="module-donate__version">powered by <a href="https://doika.falanster.by/" target="_blank">Doika</a></div>
    </div>
  </Footer>
</template>
<script>
export default {
  name: 'AppFooter',
  props: {
    name: {
      type: String,
      default: ''
    },
    editorName: {
      type: String,
      default: ''
    },
    editorSiteUrl: {
      type: String,
      default: ''
    }
  }
}
</script>
