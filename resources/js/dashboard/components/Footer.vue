<template>
  <Footer>
    <strong>{{ $t('labels.admin.common.footer.left') }} <a href="/" target="_blank">{{ name }}</a>.
    </strong>
    <span class="ml-auto">
      <template v-if="editorName !== ''">
        <template v-if="editorSiteUrl !== ''">
          {{ $t('labels.admin.common.footer.with') }} <i class="fe fe-heart"></i> {{ $t('labels.admin.common.footer.by') }}
          <a :href="editorSiteUrl" target="_blank"><strong>{{ editorName }}</strong></a>
        </template>
      </template>
       {{ $t('labels.admin.common.footer.with') }} <i class="fe fe-heart"></i> {{ $t('labels.admin.common.footer.by') }}
          <a href="https://falanster.by/" target="_blank"><strong>Falanster</strong></a>
    </span>
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