﻿<template>
  <div>

    <div v-if="isBusy" class="d-flex justify-content-center mb-3 spinner-wrapper">
      <b-spinner label="Loading..."></b-spinner>
    </div>

    <div v-else class="container" :style="{ background: model.visual_settings.colors.widgetBackground }">
      <p class="module-donate__title" :style="{ color: model.visual_settings.colors.fontColor }">{{ model.name }}</p>
      <div class="module-donate__wrapper">
        <div class="module-donate__info">
          <div class="module-donate__image">
            <img :src="model.picture_url" class="mainImage" alt="doika image">
            <div class="blurredImage"></div>
          </div>
          <div class="module-donate__description-wrapper">
            <p class="module-donate__description" v-html="model.description">
            </p>
          </div>
        </div>

        <div class="module-donate__main-panel">
          <div class="module-donate__input">
            <b-button v-model="donate_amount" :style="{ background: model.visual_settings.colors.buttonBackground, color: model.visual_settings.colors.fontColor }" v-for="button in model.visual_settings.buttons" @click="provide(button)" :class="{clicked: contains(buttons, button)}" class="module-donate__button-select" :key="button">{{ button }} {{ model.currency }}</b-button>
            <input type="number"  :style="{ background:  model.visual_settings.colors.buttonBackground, color: model.visual_settings.colors.fontColor }" class="module-donate__text-input" :placeholder="$t('labels.widget.input')" v-model="donate_amount">
            <b-button :style="{ background:  model.visual_settings.colors.buttonBackground, color: model.visual_settings.colors.fontColor }" class="module-donate__button-select payment" @click="recurrent = '/donate'" :class="{clicked: (recurrent=='/donate')}">{{ $t('buttons.widget.oneTime') }}</b-button>
            <b-button :style="{ background:  model.visual_settings.colors.buttonBackground, color: model.visual_settings.colors.fontColor }" class="module-donate__button-select payment" @click="recurrent = '/recurrent'" :class="{clicked: (recurrent=='/recurrent')}">{{ $t('buttons.widget.subscribe') }}</b-button>
            <b-button :style="{ color: model.visual_settings.colors.fontColor }" id="button__confirm" :to="'/campaigns/' + model.id + recurrent" @click="setAmount" :disabled="agreement_status == false" class="module-donate__button-select confirm" >{{ $t('buttons.widget.confirm') }}</b-button>
            <div class="checkbox-agreement">
              <b-form-checkbox
                      id="checkbox-agreement"
                      v-model="agreement_status"
                      name="checkbox-agreement"
                      value="true"
                      unchecked-value="false"
              >&nbsp;
              </b-form-checkbox>
              <a class="payment__description" id="show-modal" :style="{ color: model.visual_settings.colors.fontColor }" @click="showModal = true">
                {{ $t('labels.widget.paymentInfo') }}
              </a>
            </div>

            <transition name="modal" v-if="showModal">
              <div class="modal-mask">
                <div class="modal-wrapper">
                  <div class="modal-container">
                    <a id="modal-cross" @click="showModal = false">
                      X
                    </a>
                    <div class="modal-header">
                      {{ $t('labels.widget.terms') }}
                    </div>
                    <div class="modal-body" v-html="model.visual_settings.colors.termsOfUse">

                    </div>
                  </div>
                </div>
              </div>
            </transition>
            <p class="module-donate__warning"></p>
          </div>
        </div>
      </div>
      <b-progress v-if="showProgress" :value="model.amount_collected" :max="model.target_amount" class="progress__bar" :style="{ background: model.visual_settings.colors.progressBarColor}"></b-progress>
      <div class="module-donate__footer">
        <p class="result__description" :style="{ color: model.visual_settings.colors.fontColor }">{{ $t('labels.widget.recieved') }}: <span class="summ__highlight">{{ model.amount_collected }} {{ model.currency }}</span></p>
        <p class="result__recieved" :style="{ color: model.visual_settings.colors.fontColor }">{{ $t('labels.widget.needed') }}: <span class="summ__highlight">{{ model.target_amount }} {{ model.currency }}</span></p>
        <p class="module-donate__version" :style="{ color: model.visual_settings.colors.fontColor }">powered by <a href="#" target="_blank">Doika</a></p>
      </div>

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
        isBusy: true,
      agreement_status: false,
      donate_amount: 0,
      recurrent: '/donate',
      recurrentFlag: false,
        resourceRoute: 'campaigns',
        modelName: 'campaign',
        model: {
          id: null,
            name: 'Назва кампаніі',
            description: 'Апісанне кампаніі',
            picture_url: null,
            active_status: null,
            target_amount: 0,
            amount_collected: 0,
            startAt: null,
            finishAt: null,
            currency: 'BYN',
            has_picture_url: false,
            visual_settings: null
        },
        settings: {
            widgetBackground: '#ccc',
            buttonBackground: '#ccc',
            donateButtonBackground: '',
            progressBarColor: '#000',
            fontColor: '#000',
            termsOfUse: ""
        }
    }
  },
    computed: {
      showProgress(){
          return (this.model.visual_settings.progressBar != "0")
      }
    },
    mounted: function () {
      this.isBusy = true;
    },
  methods: {
    provide: function(item) {
      this.buttons = []
      this.buttons.push(item)
      this.donate_amount = item
    },
    contains: function(arr, item) {
      return arr.indexOf(item) != -1
    },
    setAmount: function() {
        sessionStorage.setItem('amount', this.donate_amount * 100)
    },
   }
}
</script>
