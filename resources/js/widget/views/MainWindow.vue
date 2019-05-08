<template>
  <div class="container">
    <p class="module-donate__title">{{ model.name }}</p>
    <div class="module-donate__wrapper">
      <div class="module-donate__info">
        <div class="module-donate__image">
          <img :src="model.picture_url" class="mainImage" alt="doika image">
          <div class="blurredImage"></div>
        </div>
        <div class="module-donate__description-wrapper">
          <p class="module-donate__description">
            {{ model.description }}
          </p>
        </div>
      </div>

      <div class="module-donate__main-panel">
        <div class="module-donate__input">
          <b-button v-for="button in model.button_values" @click="provide(button)" :class="{clicked: contains(buttons, button)}" class="module-donate__button-select" :key="button">{{ button }} {{ model.currency }}</b-button>
          <input type="number" class="module-donate__text-input" :placeholder="$t('labels.client.input')">
          <b-button class="module-donate__button-select payment" @click="recurrent = '/donate'" :class="{clicked: (recurrent=='/donate')}">One time</b-button>
          <b-button class="module-donate__button-select payment" @click="recurrent = '/recurrent'" :class="{clicked: (recurrent=='/recurrent')}">Recurrent</b-button>
          <b-button :to="'/campaigns/' + model.id + recurrent" class="module-donate__button-select confirm">{{ $t('buttons.client.confirm') }}</b-button>
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
    <b-progress :value="model.amount_collected" :max="model.target_amount" class="progress__bar"></b-progress>
    <div class="module-donate__footer">
      <p class="result__description">{{ $t('labels.client.recieved') }}: <span class="summ__highlight">{{ model.amount_collected }} {{ model.currency }}</span></p>
      <p class="result__recieved">{{ $t('labels.client.needed') }}: <span class="summ__highlight">{{ model.target_amount }} {{ model.currency }}</span></p>
      <p class="module-donate__version">powered by <a href="#" target="_blank">Doika</a></p>
    </div>


  </div>
</template>


<script>
import axios from 'axios'
import form from '../mixins/form'

export default {
  name: 'MainWindow',
    mixins: [form],
  data() {
    return {
      showModal: false,
      campaign: [],
      buttons: [],
      recurrent: '/donate',
      recurrentFlag: false,
        resourceRoute: 'campaigns',
        modelName: 'campaign',
        model: {
          id: null,
            name: null,
            description: null,
            picture_url: null,
            active_status: null,
            target_amount: null,
            amount_collected: null,
            startAt: null,
            finishAt: null,
            currency: null,
            has_picture_url: false,
            button_values: [2, 4, 6, 8]
        }
    }
  },
  methods: {
    provide: function(item) {
      this.buttons = []
      this.buttons.push(item)
    },
    contains: function(arr, item) {
      return arr.indexOf(item) != -1
    }
  }
}
</script>
