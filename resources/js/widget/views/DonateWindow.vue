<template>
  <div>
    <div class="container">
      <div class="module-donate__donateWindow">
        <div class="module-donate__card">
          <div id="paymentForm"></div>
        </div>
        <div class="donateWindow__footer">
          <b-button
            :to="backUrl"
            class="module-donate__button-select confirm back"
          >
            {{ $t('buttons.widget.back') }}
          </b-button>
        </div>
        <p class="module-donate__version">
          powered by
          <a href="https://doika.falanster.by/" target="_blank">Doika</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
/* global BeGateway */

import axios from 'axios';
import { styles as cssStylesForBePaidIframe } from './bePaidStyles.js';

export default {
  name: 'DonateWindow',
  props: {
    campaignId: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      checkoutUrl: null,
      placeholder: this.$t('buttons.widget.email'),
      model: {
        email: 'test@mail.com',
        amount: sessionStorage.getItem('amount'),
        currency_code: 'BYN'
      }
    };
  },
  computed: {
    backUrl() {
      return `/campaigns/${this.campaignId}`;
      },
  },

  async created() {
    let formData = this.$app.objectToFormData(this.model);
    let action = this.$app.route('widget.campaigns.payment-intends.store', {
      campaign: this.campaignId,
    });

    await axios
      .post(action, formData)
      .then(({ data }) => {
        this.checkoutUrl = data.redirect_url;
        this.token = data.token;
        return this.token;
      })
      .catch(() => {
        //console.log(error);
      });

    const bePaidOptions = {
      type: 'inline',
      id: 'paymentForm',
      url: this.checkoutUrl,
      style: cssStylesForBePaidIframe,
      size: { width: 450, height: 450 }
    };

    /** @see https://github.com/begateway/begateway-js/blob/master/Readme.md **/
    const pf = new BeGateway(bePaidOptions);
    pf.buildForm();
  },
};
</script>
