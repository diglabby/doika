<template>
  <div>
    <div class="module-donate__donateWindow">
      <div class="module-donate__card">
        <img class="card__placeholder" src="/doika/public/images/card.png">
      </div>
      <input type="email" id="email" class="donate__email module-donate__text-input" :placeholder="placeholder">
      <div class="donateWindow__footer">
        <b-button to="/doika/campaign/1" class="module-donate__button-select confirm back">{{ $t('buttons.client.back') }}</b-button>
        <b-button to="/doika/campaign/1/donate/status" class="module-donate__button-select confirm">{{ $t('buttons.client.proceed') }}</b-button>
      </div>
      <p class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'DonateWindow',
  data() {
    return {
      campaign: [],
      placeholder: 'Email for thanks'
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
