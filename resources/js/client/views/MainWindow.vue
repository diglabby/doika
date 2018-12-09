<template>
  <div class="container">
    <p class="module-donate__title">{{ campaign.content.title }}</p>
    <div class="module-donate__wrapper">
      <div class="module-donate__info">
        <div class="module-donate__image">
          <img :src="'/doika/public/images/' + campaign.content.image" class="mainImage" alt="doika image">
          <div class="blurredImage"></div>
        </div>
        <div class="module-donate__description-wrapper">
          <p class="module-donate__description">
            {{ campaign.content.description }}
          </p>
        </div>
      </div>

      <div class="module-donate__main-panel">
        <div class="module-donate__input">
          <b-button v-for="button in campaign.content.button_values" @click="provide(button)" :class="{clicked: contains(buttons, button)}" class="module-donate__button-select" :key="button">{{ button }} {{ campaign.content.currency }}</b-button>
          <input type="number" class="module-donate__text-input" :placeholder="$t('labels.client.input')">
          <b-button class="module-donate__button-select payment" @click="recurrent = '/donate'" :class="{clicked: (recurrent=='/donate')}">One time</b-button>
          <b-button class="module-donate__button-select payment" @click="recurrent = '/recurrent'" :class="{clicked: (recurrent=='/recurrent')}">recurrent</b-button>
          <b-button :to="'/doika/campaign/1' + recurrent" class="module-donate__button-select confirm">{{ $t('buttons.client.confirm') }}</b-button>
          <a class="payment__description">{{ $t('labels.client.paymentInfo') }}</a>
          <p class="module-donate__warning"></p>
        </div>
      </div>
    </div>
    <b-progress :value="value" :max="max" class="progress__bar"></b-progress>
    <div class="module-donate__footer">
      <p class="result__description">{{ $t('labels.client.recieved') }}: <span class="summ__highlight">{{ campaign.funded.current }} {{ campaign.content.currency }}</span></p>
      <p class="result__recieved">{{ $t('labels.client.needed') }}: <span class="summ__highlight">{{ campaign.funded.goal }} {{ campaign.content.currency }}</span></p>
      <p class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'MainWindow',
  data() {
    return {
      campaign: [],
      buttons: [],
      max: 50,
      value: 33,
      recurrent: '/donate',
      recurrentFlag: false
    }
  },
  async created() {
    let { data } = await axios.get(this.$app.route('campaign.get'))
    this.campaign = data
    console.log(this.campaign)
    //this.campaign = data
  },
  methods: {
    provide: function(item) {
      this.buttons = null
      this.buttons.push(item)
    },
    contains: function(arr, item) {
      return arr.indexOf(item) != -1
    }
  }
}
</script>
