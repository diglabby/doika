<template>
  <div>
    <div
      v-if="isBusy"
      class="d-flex justify-content-center mb-3 spinner-wrapper"
    >
      <b-spinner label="Loading..."></b-spinner>
    </div>

    <div v-else class="wrapper" :style="{ background: widgetBackground }">
      <p class="module-donate__title" :style="{ color: fontColor }">
        {{ model.name }}
      </p>

      <div class="module-donate__wrapper">
        <div class="module-donate__info">
          <div class="module-donate__image" v-if="model.picture_url">
            <img :src="model.picture_url" class="mainImage" alt="doika image">
            <div class="blurredImage"></div>
          </div>
          <div class="module-donate__description-wrapper">
            <p
              class="module-donate__description"
              v-html="model.description"
            ></p>
          </div>
        </div>

        <div class="module-donate__main-panel">
          <div class="module-donate__input">
            <b-button
              v-model="donate_amount"
              :style="{ background: buttonBackground, color: fontColor }"
              v-for="button in getButtons"
              @click="provide(button)"
              :class="{ clicked: contains(buttons, button) }"
              class="module-donate__button-select"
              :key="button"
            >
              {{ button }} {{ model.currency }}
            </b-button>
            <div class="form-group">
              <input
                type="number"
                min="0"
                v-model="donate_amount"
                :style="{ background: buttonBackground, color: fontColor }"
                @click="provide()"
                @keypress="getNotMinus"
                @input="$v.sum.$model = donate_amount"
                class="module-donate__text-input form-control"
                :class="{'is-invalid': $v.sum.$error}"
                :placeholder="$t('labels.widget.input')"
              >
              <p class="invalid-feedback">{{ $t('labels.widget.invalidFeedback') }}</p>
            </div>
            <b-button-group size="lg" class="btn-block">
              <b-button :style="{ background:  buttonBackground, color: settings.buttonPaymentFontColor }" class="module-donate__button-select payment" @click="recurrent = '/donate'" :class="{clicked: (recurrent=='/donate')}">{{ $t('buttons.widget.oneTime') }}</b-button>
              <b-button :style="{ background:  buttonBackground, color: settings.buttonPaymentFontColor }" class="module-donate__button-select payment" @click="recurrent = '/recurrent'" :class="{clicked: (recurrent=='/recurrent')}">{{ $t('buttons.widget.subscribe') }}</b-button>
            </b-button-group>
            <b-button
              :style="{ color: fontColor }"
              id="button__confirm"
              :to="'/campaigns/' + model.id + recurrent"
              @click="setAmount"
              :disabled="agreement_status == 'false' || this.$v.sum.$invalid"
              class="module-donate__button-select confirm"
            >
              {{ $t('buttons.widget.confirm') }}
            </b-button>
            <div class="checkbox-agreement">
              <b-form-checkbox
                id="checkbox-agreement"
                v-model="agreement_status"
                name="checkbox-agreement"
                value="true"
                unchecked-value="false"
                button-variant="secondary"
              >
                &nbsp;
              </b-form-checkbox>
              <a
                class="payment__description"
                id="show-modal"
                :style="{ color: fontColor }"
                @click="showModal = true"
              >
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
                    <div class="modal-body" v-html="model.termsOfUse"></div>
                  </div>
                </div>
              </div>
            </transition>
            <p class="module-donate__warning"></p>
          </div>
        </div>
      </div>
      <b-progress
        v-if="showProgress"
        :value="model.amount_collected"
        :max="model.target_amount"
        class="progress__bar"
        :style="{ background: progressBarColor }"
      ></b-progress>
      <div class="module-donate__footer">
        <p class="result__description" :style="{ color: fontColor }">
          {{ $t('labels.widget.received') }}:
          <span class="summ__highlight">{{ model.amount_collected }} {{ model.currency }}</span>
        </p>
        <p class="result__received" :style="{ color: fontColor }">
          {{ $t('labels.widget.needed') }}:
          <span class="summ__highlight">{{ model.target_amount }} {{ model.currency }}</span>
        </p>
        <p class="module-donate__version" :style="{ color: fontColor }">
          powered by
          <a href="https://doika.falanster.by/" target="_blank">Doika</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import form from '../mixins/form';
import required from 'vuelidate/lib/validators/required';

export default {
  name: 'MainWindow',
  mixins: [form],
  data() {
    return {
      sum: '',
      showModal: false,
      campaign: [],
      buttons: [],
      isBusy: true,
      agreement_status: 'false',
      donate_amount: null,
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
        buttonBackground: '#ffffff',
        donateButtonBackground: '',
        progressBarColor: '#000',
        fontColor: '#000',
        termsOfUse: '',
        buttons: [],
        buttonPaymentFontColor: '#ff80b2'
      }
    };
  },
  validations: {
    sum: {
      required
    }
  },
  computed: {
    showProgress() {
      try {
        return this.model.visual_settings.progressBar != '0';
      } catch (e) {
        return false;
      }
    },

    widgetBackground() {
      try {
        if (!this.model.visual_settings.colors.widgetBackground) {
          return this.settings.widgetBackground;
        }
      } catch (e) {
        return this.settings.widgetBackground;
      }
      return this.model.visual_settings.colors.widgetBackground;
    },

    progressBarColor() {
      try {
        if (!this.model.visual_settings.colors.progressBarColor) {
          return this.settings.progressBarColor;
        }
      } catch (e) {
        return this.settings.progressBarColor;
      }
      return this.model.visual_settings.colors.progressBarColor;
    },

    termsOfUse() {
      try {
        if (!this.model.visual_settings.colors.termsOfUse) {
          return this.settings.termsOfUse;
        }
      } catch (e) {
        return this.settings.termsOfUse;
      }
      return this.model.visual_settings.colors.termsOfUse;
    },
    buttonBackground() {
      try {
        if (!this.model.visual_settings.colors.buttonBackground) {
          return this.settings.buttonBackground;
        }
      } catch (e) {
        return this.settings.buttonBackground;
      }
      return this.model.visual_settings.colors.buttonBackground;
    },
    buttonBackground() {
      try {
        if (!this.model.visual_settings.colors.buttonBackground) {
          return this.settings.buttonBackground;
        }
      } catch (e) {
        return this.settings.buttonBackground;
      }
      return this.model.visual_settings.colors.buttonBackground;
    },
    getButtons() {
      try {
        if (!this.model.visual_settings.buttons) {
          return this.settings.buttons;
        }
      } catch (e) {
        return this.settings.buttons;
      }
      return this.model.visual_settings.buttons;
    },
    fontColor() {
      try {
        if (!this.model.visual_settings.colors.fontColor) {
          return this.settings.fontColor;
        }
      } catch (e) {
        return this.settings.fontColor;
      }
      return this.model.visual_settings.colors.fontColor;
    }
  },

  methods: {
    provide: function(item) {
      this.buttons = [];
      this.buttons.push(item);
      this.donate_amount = item;
      this.$v.sum.$model = item;
    },
    contains: function(arr, item) {
      return arr.indexOf(item) != -1;
    },
    setAmount: function() {
      sessionStorage.setItem('amount', this.donate_amount * 100);
    },
    getNotMinus: function(evt) {
      let keyCode = evt.keyCode ? evt.keyCode : evt.which;

      if (keyCode < 48 || keyCode > 57) {
        evt.preventDefault();
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.is-invalid {
  border: 1px solid #dc3545;
  box-shadow: 0 0 0 2px rgba(246, 109, 155, 0.25);
}

.invalid-feedback {
  font-size: 70%;
}
</style>
