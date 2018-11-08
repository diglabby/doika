<template>
  <div>
    <p class="module-donate__title">{{ campaign.content.title }}</p>
    <div class="module-donate__wrapper">
      <div class="module-donate__image">
        <img :src="'/images/' + campaign.content.image" class="mainImage" alt="doika image">
        <div class="blurredImage"></div>
      </div>
      <div class="module-donate__main-panel">
        <div class="module-donate__input">
          <button v-for="button in campaign.content.button_values" class="module-donate__button-select" :key="button">{{ button }} {{ campaign.content.currency }}</button>
          <!--<button class="module-donate__button-select" data-sum="10">10 руб.</button>
          <button class="module-donate__button-select" data-sum="15">15 руб.</button>
          <button class="module-donate__button-select" data-sum="20">20 руб.</button>
          <button class="module-donate__button-select" data-sum="50">50 руб.</button>
          <button class="module-donate__button-select" data-sum="100">100 руб.</button>-->
          <input type="number" class="module-donate__text-input" :placeholder="$t('content.input')">
          <b-button to="/campaign/1/donate" class="module-donate__button-confirm">{{ $t('buttons.confirm') }}</b-button>
          <p class="module-donate__warning"></p>
        </div>
      </div>
      <div class="module-donate__description-wrapper">
        <p class="module-donate__description">
          {{ campaign.content.description }}
        </p>
      </div>
    </div>
    <div class="module-donate__progress-bar">
      <div class="progress-bar__track">
      </div>
      <div class="progress-bar__pointer">
      </div>
    </div>

    <div class="module-donate__footer">
      <a class="payment__description">{{ $t('content.paymentInfo') }}</a>
      <p class="result__description">{{ $t('content.received') }} <span class="summ__highlight">{{ campaign.funded.current }}</span> {{ $t('content.from') }} <span class="summ__highlight">{{ campaign.funded.goal }}</span> </p>
      <div class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'MainWindow',
  data() {
    return {
      campaign: []
    }
  },
  async created() {
    let { data } = await axios.get(this.$app.route('campaign.get'))
    this.campaign = data
    console.log(this.campaign)
    //this.campaign = data
  }
}
</script>
