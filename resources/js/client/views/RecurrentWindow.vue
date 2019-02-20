<template>
  <div class="module-donate__donateWindow">
    <p class="module-donate__title recurrent">User credentials page</p>
    <b-container fluid>
      <b-row class="my-1" v-for="type in types" :key="type">
        <b-col sm="6"><b-form-input :id="`type-${type}`" :placeholder="type" class="module-donate__text-input recurrent"></b-form-input></b-col>
      </b-row>
      <b-form-checkbox id="checkbox1"
                       v-model="status"
                       value="accepted"
                       unchecked-value="not_accepted"
                       class="donate__checkbox"
      >
        I accept the terms and use
      </b-form-checkbox>
    </b-container>
    <div class="donateWindow__footer">
      <b-button to="/doika/campaign/1" class="module-donate__button-select confirm back">{{ $t('buttons.client.back') }}</b-button>
      <b-button to="/doika/campaign/1/recurrent/donate" class="module-donate__button-select confirm">{{ $t('buttons.client.proceed') }}</b-button>
    </div>
    <p class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></p>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'RecurrentWindow',
  data() {
    return {
      campaign: [],
      placeholder: 'Email',
      types: ['Name', 'Mail', 'Phone']
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
