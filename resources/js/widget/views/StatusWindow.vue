<template>
  <div>
    <div class="module-donate__status">
      <p class="status__title">{{ $t('labels.client.thanks') }}</p>
      <div class="module-donate__icon">
        <img src="/doika/public/images/smile.png">
      </div>
    </div>
    <div class="module-donate__footer">
      <p class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'StatusWindow',
  data() {
    return {
      campaign: [],
      placeholder: 'Email'
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
