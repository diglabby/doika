<template>
  <div>
    <div class="container">
      <div class="module-donate__donateWindow">
        <div class="module-donate__card">
          <div id="paymentForm"></div>
        </div>
        <div class="donateWindow__footer">
          <b-button
            :to="'/campaigns/' + id + '/recurrent'"
            class="module-donate__button-select confirm reccurent back"
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
  name: 'ReccurentDonateWindow',
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      campaign: [],
      redirect_url: null,
      placeholder: this.$t('buttons.widget.email'),
      model: {
        amount: sessionStorage.getItem('amount'),
        email: null,
        name: sessionStorage.getItem('name'),
        phone: sessionStorage.getItem('phone'),
        currency_code: 'BYN',
        payment_interval: 'P1M'
      }
    };
  },
  async created() {
    this.model.email = sessionStorage.getItem('email');
    let formData = this.$app.objectToFormData(this.model);
    formData.append('_method', 'POST');
    let action = this.$app.route(
      'widget.campaigns.subscription-intends.store',
      {
        campaign: this.id,
        paymentGateway: 1,
        email: this.model.email,
        payment_interval: 'P1M'
      }
    );
    let { data } = await axios.post(action, formData);
    this.redirect_url = data;

    const bePaidOptions = {
      type: 'inline',
      id: 'paymentForm',
      url: this.redirect_url,
      style: cssStylesForBePaidIframe,
      size: { width: 450, height: 450 }
    };

    /** @see https://github.com/begateway/begateway-js/blob/master/Readme.md **/
    new BeGateway(bePaidOptions);
  }
};
</script>
