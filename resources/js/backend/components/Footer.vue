<template>
  <Footer>
    <strong>Powered by <a href="/" target="_blank">{{ name }}</a>.
    </strong>&nbsp;{{ $t('labels.supporters') }}
    <span class="ml-auto">
      <template v-if="editorName !== ''">
        <template v-if="editorSiteUrl !== ''">
          {{ $t('labels.with') }} <i class="fe fe-heart"></i> {{ $t('labels.by') }}
          <a :href="editorSiteUrl" target="_blank"><strong>{{ editorName }}</strong></a>
        </template>
        <template v-else>
          <i class="fe fe-code"></i> {{ $t('labels.with') }} <i class="fe fe-heart"></i> {{ $t('labels.by') }} <strong>{{ editorName }}</strong>
        </template>
      </template>
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
