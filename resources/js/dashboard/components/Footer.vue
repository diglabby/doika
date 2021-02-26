<template>
  <Footer>
    <strong>
      {{ $t('labels.admin.common.footer.left') }}
      <a href="http://doika.falanster.by/" target="_blank">{{ name }}</a>
       v{{ appVersion }}
    </strong>
    <span class="ml-auto">
      <template v-if="editorName !== ''">
        <template v-if="editorSiteUrl !== ''">
          {{ $t('labels.admin.common.footer.with') }}
          <FontAwesomeIcon
            class="heart-icon"
            :icon="heartIcon"
          ></FontAwesomeIcon>
          {{ $t('labels.admin.common.footer.by') }}
          <a :href="editorSiteUrl" target="_blank">
            <strong>{{ editorName }}</strong>
          </a>
        </template>
      </template>
      {{ $t('labels.admin.common.footer.with') }}
      <FontAwesomeIcon class="heart-icon" :icon="heartIcon"></FontAwesomeIcon>
      {{ $t('labels.admin.common.footer.by') }}
      <a href="https://falanster.by/" target="_blank"
        ><strong>Falanster</strong></a
      >
    </span>
  </Footer>
</template>
<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faHeart } from '@fortawesome/free-solid-svg-icons';
export default {
  name: 'AppFooter',
  components: { FontAwesomeIcon },
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
    },
    appVersion: {
      type: String,
      required: true
    }
  },
  computed: {
    heartIcon() {
      return faHeart;
    }
  }
};
</script>
<style scoped>
.heart-icon {
  color: #ff0000;
}
</style>
