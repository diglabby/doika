<template>
  <div>
    <div class="module-donate__donateWindow">
      <div class="module-donate__card">
        <img class="card__placeholder" src="/doika/public/images/card.png">
      </div>
      <div class="donateWindow__footer">
        <b-button to="/campaign/1/recurrent" class="module-donate__button-select confirm back">{{ $t('buttons.client.back') }}</b-button>
        <b-button to="/campaign/1/recurrent/status" class="module-donate__button-select confirm">{{ $t('buttons.client.proceed') }}</b-button>
      </div>
      <p class="module-donate__version donateWindow">powered by <a href="#" target="_blank">Doika</a></p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'RecurrentDonateWindow',
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
