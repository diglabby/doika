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
          <b-button class="module-donate__button-select payment" @click="recurrent = '/recurrent'" :class="{clicked: (recurrent=='/recurrent')}">Recurrent</b-button>
          <b-button :to="'/doika/campaign/1' + recurrent" class="module-donate__button-select confirm">{{ $t('buttons.client.confirm') }}</b-button>
          <a class="payment__description" id="show-modal" @click="showModal = true">{{ $t('labels.client.paymentInfo') }}</a>
          <transition name="modal" v-if="showModal">
            <div class="modal-mask">
              <div class="modal-wrapper">
                <div class="modal-container">
                  <a id="modal-cross" @click="showModal = false">
                    X
                  </a>
                  <div class="modal-header">
                    Terms of use
                  </div>
                  <div class="modal-body">
                    Грошы будуць прымацца як добраахвотныя ахвяраванні на дзейнасць Арганізацыі. Па націсканні кнопкі “Ахвяруй!” для Вас будзе выведзеная адмысловая плацёжная форма працэсінгавай сістэмы bePaid.Для аплаты Вам спатрэбіцца ўвесці дадзеныя сваёй карты і пацвердзіць плацёж кнопкай “Аплаціць N руб.”, дзе N ― вызначаная Вамі сума.Мы прымаем плацяжы з наступных банкаўскіх картаў: MasterCard, Maestro, Visa, Visa Electron, Белкарт.
                    Плацяжы з банкаўскіх картак ажыццяўляюцца праз сістэму электронных плацяжоў bePaid. Плацёжная форма сістэмы адпавядае ўсім патрабаванням бяспекі перадачы звестак (PCI DSS Level 1). Усе канфідэнцыйныя звесткі захоўваюцца ў зашыфраваным выглядзе і максімальна ўстойлівыя да ўзлому. Зварот грашовых сум, калі вы ўжо здзейснілі ахвяраванне, не ажыццяўляецца.
                  </div>
                </div>
              </div>
            </div>
          </transition>
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
      showModal: false,
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
