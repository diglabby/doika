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
            :to="'/campaigns/' + id"
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
import axios from 'axios';

/** recursive function checking the server status and redirect to partical status page
 *
 *  num - current number of attempts 
 *  tokenOp - current payment token
 *  fail - fail link for redirection in case the checking process timeout 
 */
    
function delay(num, tokenOp, fail) {
    
    const limit = 3; // attempts to check server status of the payments
    const postpone = 3000 // interval of checkin the server
    
    // in the current attepmpt less the limit
    if (num < limit) {

      // set interval for repeating the checking porocess
      setTimeout( function() {       

        axios( {
            method: "post",
            url: '/doika/doika/widget/api/bepaid-check-payment-status', // TBD - need to move to some variables...
            data: {
                token: tokenOp
            }
        }).
        then( ({ data }) => {         
            num++;
            
            // if success when redirect to success status page
            if (data.checkout.status === 'successful') {              
              window.location.href = data.checkout.settings.success_url;            
            }
            
            // else save the redirect link to the fail status page
            fail = data.checkout.settings.fail_url;
            
            // on more circle
            delay(num, tokenOp, fail);

        })            
      }, postpone);

    } else {       
        window.location.href = fail;
    }
}
    
export default {
  name: 'DonateWindow',
  props: ['id'],
  data() {
    return {
      isBusy: false,
      campaign: [],
      redirect_url: null,
      placeholder: this.$t('buttons.widget.email'),
      model: {
        email: 'test@mail.by',
        amount: sessionStorage.getItem('amount'),
        currency_code: 'BYN'
      }
    };
  },
    

    
  methods: {      
    delay
  },     
    
    
  async created() {    
    
    let formData = this.$app.objectToFormData(this.model);
    formData.append('_method', 'POST');
    let action = this.$app.route('widget.campaigns.payment-intends.store', {
      campaign: this.id,
      paymentGateway: 1
    });

    await axios.post(action, formData).
    then(({ data }) => {            
        this.redirect_url = data.redirect_url;
        this.token = data.token;
        return this.token;
    }).
    catch(({error})=> {
        //console.log(error);
    });

  const curToken = this.token;
  //this.isBusy = true;

  // set first interval for calling payments status. it need for putting the card data in the form
  const firstLaunch = 5000;

  setTimeout(function() { delay(1, curToken, ''); }, firstLaunch);
    

  var options = {
      type: 'inline',
      id: 'paymentForm',
      url: this.redirect_url,
      style:
        'html {\
    padding:0;\
    margin:0;\
    overflow: hidden;\
  }\
  #request .submit-button .pure-button:hover {\
  color: #FF80B4;\
          -webkit-transform: perspective(1px) scale(1.1);\
          transform: perspective(1px) scale(1.1);\
          -webkit-transition: all 0.3s ease 0s;\
          transition: all 0.3s ease 0s;\
          -webkit-font-smoothing: antialiased;}\
          \
          #request .submit-button .pure-button input:focus {\
          border:none;\
          outline:none;\
      }\
  #request .submit-button .pure-button, #request .submit-button .pure-button input {\
      margin-left: auto;\
      margin-right: 25px;\
        height: 50px;\
          width: auto;\
          overflow: hidden;\
          background-color: #FF80B4;\
          margin-bottom: 20px;\
          margin-top: 15px;\
          border: none;\
          border-radius: 0;\
          box-shadow: none;\
          margin-top: 22px;\
          box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08);\
            }\
            #request .input input, #request .input select {\
                padding-left: 20px;\
                margin-left: 0px;\
            }\
            .test-payment h3 {\
              display: none;\
            }\
            .request_credit_card_number input {\
              top: 30px;\
              position: absolute;\
              left: 30px;\
              width: 65% !important;\
            }\
            #request .verification-value input {\
              width: 50px;\
              height: 27px;\
              position: absolute;\
              top: 157px;\
              right: 5px;\
              padding: 0px 10px;\
            }\
            .content .payment-methods {\
              background: transparent;\
            }\
            .visa {\
              background-image: none !important;\
            }\
            .payment-page {\
              background: transparent !important;\
            }\
            .request_credit_card_number::before {\
              content: "НУМАР КАРТКІ";\
              position: absolute;\
              top: 15px;\
              left: 30px;\
              width: auto;\
              height: auto;\
              font-family: Roboto;\
              color:  #82888e;\
              font-size: 12px;\
              font-weight: 400;\
              text-align: left;\
            }\
            .request_credit_card_holder::before {\
              content: "ІМЯ УЛАДАЛЬНІКА";\
              position: absolute;\
              top: 115px;\
              left: 30px;\
              width: auto;\
              height: auto;\
              font-family: Roboto;\
              color:  #82888e;\
              font-size: 12px;\
              font-weight: 400;\
              text-align: left;\
            }\
            .request_credit_card_holder input {\
              top: 130px;\
              position: absolute;\
              left: 30px;\
              width: 65% !important;\
            }\
            .request_credit_card_exp_date {\
              top: 80px;\
              position: absolute;\
              left: 140px;\
            }\
            .exp-date label {\
              position: absolute;\
              top: 60px;\
              left: 140px;\
              font-family: Roboto;\
              color:  #82888e;\
              font-size: 12px;\
              font-weight: 400;\
              text-align: left;\
            }\
            .payment-methods {\
                background-color: rgba(231, 238, 244, 0.91);\
                border: none;\
            }\
            .payment-method {\
                margin: 0;\
            }\
            #request input {\
                height: 26px;\
                border-radius: 0;\
            }\
            #request input::-webkit-input-placeholder, #request .exp-date input::-webkit-input-placeholder, #request .verification-value input::-webkit-input-placeholder {\
                color: #939393;\
                font-size: 14px;\
            }\
            #request input:-ms-input-placeholder, #request .exp-date input:-ms-input-placeholder, #request .verification-value input:-ms-input-placeholder {\
                color: #939393;\
                font-size: 14px;\
            }\
            #request input::-ms-input-placeholder, #request .exp-date input::-ms-input-placeholder, #request .verification-value input::-ms-input-placeholder {\
                color: #939393;\
                font-size: 14px;\
            }\
            #request input::placeholder, #request .exp-date input::placeholder, #request .verification-value input::placeholder {\
                color: #939393;\
                font-size: 14px;\
            }\
            .credit-card-icon, .card-holder-icon {\
                width: 25.2px;\
                height: 22.4px;\
                margin-top: -3px!important;\
              display: none;\
            }\
            .credit-card {\
              width: 100%;\
              max-width: 365px;\
              height: 186px;\
              position:relative;\
              background: url("https://' +
        parent.document.location.host +
        '/doika/public/images/front-card.png"),\
    url("https://' +
        parent.document.location.host +
        '/doika/public/images/back-card.png");\
    background-repeat: no-repeat;\
    background-position: left top, right 20px;\
  }\
  #request .verification-value label {\
    display: none;\
  }\
  #request_customer_email {\
          width: 250px !important;\
          margin: auto !important;\
          margin-top: 20px !important;\
          pointer-events: auto !important;\
          font-family: Ubuntu, sans-serif !important;\
          font-size: 18px !important;\
          font-weight: 500 !important;\
          text-align: left !important;\
          width: 250px !important;\
          height: 50px !important;\
          color: #191919 !important;\
          border: none !important;\
          -webkit-box-sizing: border-box !important;\
          box-sizing: border-box !important;\
          padding: 0px 5px 0px 15px !important;\
          color: #31383e !important;\
          -moz-appearance: textfield !important;\
          -webkit-appearance: none !important;\
          -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08) !important;\
          box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08) !important;\
          -webkit-transition: all 0.3s ease 0s !important;\
          transition: all 0.3s ease 0s !important;\
      }\
  .email-icon {\
    display: none;\
  }\
  .credentials {\
    white-space: nowrap;\
  }\
  #beGatewayForm #iframe {\
    width: 100%;\
  }\
  #iframe .content {\
  	margin: 0 !important;\
  }\
  #request {\
  	margin:0;\
  }\
  #request .submit-button .pure-button input {\
      padding: 10px !important;\
      height: 50px;\
      width: 165px;\
      overflow: hidden;\
      background-color: #FF80B4;\
      margin-bottom: 10px;\
  }\
  #request > div.submit-button > div.pure-button.pure-button-success.no-padding > input[type=submit] {\
  background-color:  #94c840\
  margin-top: 0;\
  padding:10px !important;\
  background-color: #FF80B4;\
  color: #303030;\
  height: 100%;\
  }\
  #request .submit-button .pure-button input, .submit-button .pure-button {\
  	background-color:  #94c840;\
  	border-radius: 2px;\
  	padding: 0;\
  	height: 32px;\
  	color: rgba(231, 238, 244, 0.91);\
    width: 100%;\
    height: 30px;\
  	font-weight: 700;\
  	font-size: 17px;\
  	margin-top: 10.5px;\
  	\
  }\
  body#iframe .credentials p {\
      vertical-align: bottom;\
  }\
  body#iframe .credentials img {\
    vertical-align: baseline;\
  }\
  #request .exp-date input {\
  	width: 90px;\
  }\
  .content .credit_card .credit-card {\
    margin: auto;\
  }\
  #request .submit-button {\
      margin: 0px auto;\
      display: flex;\
      flex-direction: column;\
      }\
  .submit-button {\
      padding: 0 !important;\
  }\
  .submit-button .pure-button {\
    padding: 0 !important;\
    border-radius: 6px;\
    box-shadow: 0 1px 5px 0px #000;\
  }\
  .credit-card {\
    padding: 0 0 20px!important;\
    border-radius: 6px;\
  }\
  .credentials {\
  	margin-top: 5px!important;\
  	font-size: 12px!important;\
  }\
  #logos {\
  	margin-top: -10px!important;\
  }\
  .pure-form input[type="text"], .pure-form input[type="tel"] {\
  	padding: 0;\
  }\
  .submit-button .in-progress {\
    margin: 4px 0;\
    display:none !important;\
  }\
  @media screen and (max-width: 321px) {\
    .credentials {\
      font-size: 10px !important;\
    }\
  }\
  @media screen and (max-width: 250px) {\
    .inline-logo img {\
      max-height: 40px;\
    }\
    #logos-container {\
        margin-top: 10px;\
    }\
    .credit-card {\
      width: 100% !important;\
    }\
    .request_credit_card_holder input {\
      width: 60% !important;\
      left: 20px;\
    }\
    #request .verification-value input {\
      top: 130px;\
    }\
    .request_credit_card_exp_date {\
      left: 135px;\
      width: 80px;\
    }\
    .request_credit_card_number input {\
      top: 30px;\
      position: absolute;\
      left: 25px;\
      width: 80% !important;\
    }\
  }\
  ',
      size: { width: 450, height: 450 }
    };

    var pf = new BeGateway(options);
    pf.buildForm();
  }
};
</script>
