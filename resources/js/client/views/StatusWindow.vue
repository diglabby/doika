<template>
  <div>
    <div class="module-donate__status">
      <p class="status__title">Successful payment</p>
      <div class="module-donate__icon">
        <img src="/doika/public/images/approve.png">
      </div>
      <p class="status__text">Successful payment</p>
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
