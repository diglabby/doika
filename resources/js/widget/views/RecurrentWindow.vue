<template>
  <div>
    <div
      v-if="isBusy"
      class="d-flex justify-content-center mb-3 spinner-wrapper"
    >
      <b-spinner label="Loading..."></b-spinner>
    </div>
    <div class="container">
      <div class="module-donate__donateWindow">
        <p class="module-donate__title recurrent">
          {{ $t('labels.widget.title') }}
        </p>

        <div class="donateReccurentWindow__footer">
          <input
            type="name"
            id="name"
            class="donate__email module-donate__text-input"
            v-model="model.name"
            :placeholder="$t('labels.widget.name')"
          >
          <input
            type="email"
            id="email"
            class="donate__email module-donate__text-input"
            v-model="model.email"
            :placeholder="$t('labels.widget.email')"
          >
          <input
            type="phone"
            id="phone"
            class="donate__email module-donate__text-input"
            v-model="model.phone"
            :placeholder="$t('labels.widget.phone')"
          >
        </div>

        <div class="donateReccurentWindow__footer">
          <b-button
            :to="'/campaigns/' + id"
            class="module-donate__button-select confirm back"
          >
            {{ $t('buttons.widget.back') }}
          </b-button>
          <b-button
            :to="'/campaigns/' + id + '/recurrent/donate'"
            @click="submit"
            class="module-donate__button-select confirm"
          >
            {{ $t('buttons.widget.proceed') }}
          </b-button>
        </div>
        <p class="module-donate__version">
          powered by
          <a href="https://doika.falanster.by/" target="_blank">Doika</a>
        </p>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
@import '~vue-material/dist/theme/engine';

@import '~vue-material/dist/theme/all';
.md-theme-default a:not(.md-button) {
  color: #303030;
}

@include md-register-theme(
  'default',
  (
    primary: #000000,
    accent: #ff69b4
  )
);
</style>

<script>
import axios from 'axios';

export default {
  name: 'RecurrentWindow',
  props: ['id'],
  data() {
    return {
      isBusy: true,
      campaign: [],
      redirect_url: null,
      model: {
        email: '',
        name: '',
        phone: '',
        amount: sessionStorage.getItem('amount'),
        currency_code: 'BYN'
      }
    };
  },
  mounted() {
    this.isBusy = false;
  },
  methods: {
    submit: function() {
      sessionStorage.setItem('email', this.model.email);
      sessionStorage.setItem('name', this.model.name);
      sessionStorage.setItem('phone', this.model.phone);
    }
  }
};
</script>
