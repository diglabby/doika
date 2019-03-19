<template>
  <div class="module-donate__donateWindow">
    <p class="module-donate__title recurrent">{{ $t('labels.client.title') }}</p>
    <b-container fluid>
      <b-row class="my-1" v-for="field in fields" :key="field">
        <b-col sm="6">
          <md-field>
            <label>{{ field }}</label>
            <md-input v-model="type" class="donateWindow__input"></md-input>            
          </md-field>
        </b-col>
      </b-row>
      <b-form-checkbox id="checkbox1"
                       v-model="status"
                       value="accepted"
                       unchecked-value="not_accepted"
                       class="donate__checkbox"
      >
        {{ $t('labels.client.termsOfUse') }}
      </b-form-checkbox>
    </b-container>
    <div class="donateWindow__footer">
      <b-button to="/campaign/1" class="module-donate__button-nonselect confirm back">{{ $t('buttons.client.back') }}</b-button>
      <b-button to="/campaign/1/recurrent/donate" class="module-donate__button-select confirm">{{ $t('buttons.client.proceed') }}</b-button>
    </div>
    <p class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></p>
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
import axios from 'axios'

export default {
  name: 'RecurrentWindow',
  data() {
    return {
      campaign: [],
      fields: [
        this.$t('labels.client.name'),
        this.$t('labels.client.email'),
        this.$t('labels.client.phone')
      ],
      initial: 'Initial Value',
      type: null,
      withLabel: null,
      inline: null,
      number: null,
      textarea: null,
      autogrow: null,
      disabled: null
    }
  },
  async created() {
    let { data } = await axios.get(
      this.$app.route('campaign.get', { campaignId: '1' })
    )
    this.campaign = data
  }
}
</script>
