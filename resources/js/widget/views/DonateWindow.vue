<template>
  <div>
    <div
      v-if="isBusy"
      class="d-flex justify-content-center mb-3 spinner-wrapper"
    >
      <b-spinner label="Loading..."></b-spinner>
    </div>
    <div class="container">
      <div class="module-donate__donateWindow">
        <div class="module-donate__card">
          <div id="paymentForm"></div>
        </div>
        <div class="donateWindow__footer">
          <b-button
            :to="'/campaigns/' + campaignId"
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

/** recursive function checking the server status and redirect to partical status page
 *
 *  num - current number of attempts
 *  tokenOp - current payment token
 *  fail - fail link for redirection in case the checking process timeout
 */

function delay(num, tokenOp, fail) {
  const limit = 3; // attempts to check server status of the payments
  const postpone = 3000; // interval of checkin the server

  // in the current attempt less the limit
  if (num < limit) {
    // set interval for repeating the checking porocess
    setTimeout(function() {
      axios({
        method: 'post',
        url: '/doika/widget/api/bepaid/check-payment-status', // TBD - need to move to some variables...
        data: {
          token: tokenOp
        }
      }).then(({ data }) => {
        num++;

        // if success when redirect to success status page
        if (data.checkout.status === 'successful') {
          window.location.href = data.checkout.settings.success_url;
        }

        // else save the redirect link to the fail status page
        fail = data.checkout.settings.fail_url;

        // on more circle
        delay(num, tokenOp, fail);
      });
    }, postpone);
  } else {
    window.location.href = fail;
  }
}

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
      isBusy: false,
      campaign: [],
      checkoutUrl: null,
      placeholder: this.$t('buttons.widget.email'),
      model: {
        email: 'test@mail.com',
        amount: sessionStorage.getItem('amount'),
        currency_code: 'BYN'
      }
    };
  },

  async created() {
    let formData = this.$app.objectToFormData(this.model);
    formData.append('_method', 'POST');
    let action = this.$app.route('widget.campaigns.payment-intends.store', {
      campaign: this.campaignId,
      paymentGateway: 1
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

  methods: {
    delay
  }
};
</script>
