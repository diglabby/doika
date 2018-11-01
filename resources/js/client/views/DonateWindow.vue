<template>
  <div>
    <p class="module-donate__title">{{ campaign.content.title }}</p>
    <div class="module-donate__wrapper">
      <div class="module-donate__description-wrapper">
        <p class="module-donate__description">{{ campaign.content.description }}</p>
        <p class="result__description">{{ $t('content.received') }} <span class="summ__highlight">{{ campaign.funded.current }}</span> {{ $t('content.from') }} <span class="summ__highlight">{{ campaign.funded.goal }}</span> </p>
        <b-button to="/campaign/1" class="module-donate__back-button"><img src="/images/back.png">Назад</b-button>
      </div>
      <div class="module-donate__main-panel">
        <div id="donate-bePaid__form" class="donate-bePaid__form"></div>
        <div>
          <div class="module-donate__message">
            <p class="module-donate__message_title"></p>
            <p class="module-donate__message_button"></p>
          </div>
          <a class="payment__description">{{ $t('content.paymentInfo') }}</a>
          <div class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'DonateWindow',
  data() {
    return {
      campaign: []
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
