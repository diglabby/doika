<template>
  <div class="container">
    <div class="module-donate__status">
      <p class="status__title">{{ message }}</p>
      <div class="module-donate__icon">
        <img :src="image">
      </div>
    </div>
    <b-button :to=" '/campaigns/' + id" class="module-donate__button-select confirm back">{{ $t('buttons.widget.back') }}</b-button>
    <div class="module-donate-status__footer">
      <p class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'StatusWindow',
    props: ['id', 'status'],
  data() {
    return {
      campaign: [],
      placeholder: 'Email',
        image: null,
        message: null
    }
  },
    mounted: function() {

        switch(this.status) {
            case 'successful':
                this.image = "/doika/public/images/smile.png"
                this.message = this.$t('labels.widget.thanks')
                break;

            case 'fail':  // if (x === 'value2')
                this.image = "/doika/public/images/sadsmile.png"
                this.message = 'Транзакция была обработана и отклонена шлюзом'
                break;
            case 'incomplete':  // if (x === 'value2')
                this.image = "/doika/public/images/sadsmile.png"
                this.message = 'Транзакция не завершена, требуется участие торговца'
                break;
            case 'expired':  // if (x === 'value2')
                this.image = "/doika/public/images/sadsmile.png"
                this.message = 'Время обработки транзакции истекло'
                break;
            case 'subscribed':  // if (x === 'value2')
                this.image = "/doika/public/images/smile.png"
                this.message = 'Вы паспяхова падпісаны!'
                break;
            default:
                this.image = "/doika/public/images/sadsmile.png"
                this.message = 'Немагчыма правесці аплату'
                break;
        }
    },
  async created() {
   // let { data } = await axios.get(
   //   this.$app.route('campaign.get', { campaignId: '1' })
    //)
   // this.campaign = data
  }
}
</script>
