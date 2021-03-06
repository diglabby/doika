const origin = parent.document.location.origin;
const styles = `
html {
    padding: 0;
    margin: 0;
    overflow: hidden;
  }

  #request .submit-button .pure-button:hover {
    color: #FF80B4;
    -webkit-transform: perspective(1px) scale(1.1);
    transform: perspective(1px) scale(1.1);
    -webkit-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    -webkit-font-smoothing: antialiased;
  }

  #request .submit-button .pure-button input:focus {
    border: none;
    outline: none;
  }

  #request .submit-button .pure-button, #request .submit-button .pure-button input {
    margin-left: auto;
    margin-right: 25px;
    height: 50px;
    width: auto;
    overflow: hidden;
    background-color: #FF80B4;
    margin-bottom: 20px;
    margin-top: 15px;
    border: none;
    border-radius: 0;
    box-shadow: none;
    margin-top: 22px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08);
  }

  #request .input input, #request .input select {
    padding-left: 20px;
    margin-left: 0px;
  }

  .test-payment h3 {
    display: none;
  }

  .request_credit_card_number input {
    top: 30px;
    position: absolute;
    left: 30px;
    width: 65% !important;
  }

  #request .verification-value input {
    width: 50px;
    height: 27px;
    position: absolute;
    top: 157px;
    right: 5px;
    padding: 0px 10px;
  }

  .content .payment-methods {
    background: transparent;
  }

  .visa {
    background-image: none !important;
  }

  .payment-page {
    background: transparent !important;
  }

  .request_credit_card_number::before {
    content: "НУМАР КАРТКІ";
    position: absolute;
    top: 15px;
    left: 30px;
    width: auto;
    height: auto;
    font-family: Roboto;
    color: #82888e;
    font-size: 12px;
    font-weight: 400;
    text-align: left;
  }

  .request_credit_card_holder::before {
    content: "ІМЯ УЛАДАЛЬНІКА";
    position: absolute;
    top: 115px;
    left: 30px;
    width: auto;
    height: auto;
    font-family: Roboto;
    color: #82888e;
    font-size: 12px;
    font-weight: 400;
    text-align: left;
  }

  .request_credit_card_holder input {
    top: 130px;
    position: absolute;
    left: 30px;
    width: 65% !important;
  }

  .request_credit_card_exp_date {
    top: 80px;
    position: absolute;
    left: 140px;
  }

  .exp-date label {
    position: absolute;
    top: 60px;
    left: 140px;
    font-family: Roboto;
    color: #82888e;
    font-size: 12px;
    font-weight: 400;
    text-align: left;
  }

  .payment-methods {
    background-color: rgba(231, 238, 244, 0.91);
    border: none;
  }

  .payment-method {
    margin: 0;
  }

  #request input {
    height: 26px;
    border-radius: 0;
  }

  #request input::-webkit-input-placeholder, #request .exp-date input::-webkit-input-placeholder, #request .verification-value input::-webkit-input-placeholder {
    color: #939393;
    font-size: 14px;
  }

  #request input:-ms-input-placeholder, #request .exp-date input:-ms-input-placeholder, #request .verification-value input:-ms-input-placeholder {
    color: #939393;
    font-size: 14px;
  }

  #request input::-ms-input-placeholder, #request .exp-date input::-ms-input-placeholder, #request .verification-value input::-ms-input-placeholder {
    color: #939393;
    font-size: 14px;
  }

  #request input::placeholder, #request .exp-date input::placeholder, #request .verification-value input::placeholder {
    color: #939393;
    font-size: 14px;
  }

  .credit-card-icon, .card-holder-icon {
    width: 25.2px;
    height: 22.4px;
    margin-top: -3px !important;
    display: none;
  }

  .credit-card {
    width: 100%;
    max-width: 365px;
    height: 186px;
    position: relative;
    background: url("${origin}/doika/images/front-card.png"),
    url("${origin}/doika/images/back-card.png");
    background-repeat: no-repeat;
    background-position: left top, right 20px;
  }

  #request .verification-value label {
    display: none;
  }

#request_customer_email {
    width: 250px !important;
    margin: auto !important;
    margin-top: 20px !important;
    pointer-events: auto !important;
    font-family: Ubuntu, sans-serif !important;
    font-size: 18px !important;
    font-weight: 500 !important;
    text-align: left !important;
    width: 250px !important;
    height: 50px !important;
    color: #191919 !important;
    border: none !important;
    -webkit-box-sizing: border-box !important;
    box-sizing: border-box !important;
    padding: 0px 5px 0px 15px !important;
    color: #31383e !important;
    -moz-appearance: textfield !important;
    -webkit-appearance: none !important;
    -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08) !important;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08) !important;
    -webkit-transition: all 0.3s ease 0s !important;
    transition: all 0.3s ease 0s !important;
}

  .email-icon {
      display: none;
  }

  .credentials {
    white-space: nowrap;
  }

  #beGatewayForm #iframe {
    width: 100%;
  }

  #iframe .content {
    margin: 0 !important;
  }

  #request {
    margin: 0;
  }

  #request .submit-button .pure-button input {
    padding: 10px !important;
    height: 50px;
    width: 165px;
    overflow: hidden;
    background-color: #FF80B4;
    margin-bottom: 10px;
  }

  #request > div.submit-button > div.pure-button.pure-button-success.no-padding > input[type=submit] {
    background-color: #94c840;
    margin-top: 0;
    padding: 10px !important;
    background-color: #FF80B4;
    color: #303030;
    height: 100%;
  }

  #request .submit-button .pure-button input, .submit-button .pure-button {
    background-color: #94c840;
    border-radius: 2px;
    padding: 0;
    height: 32px;
    color: rgba(231, 238, 244, 0.91);
    width: 100%;
    height: 30px;
    font-weight: 700;
    font-size: 17px;
    margin-top: 10.5px;
  }

  body#iframe .credentials p {
    vertical-align: bottom;
  }

  body#iframe .credentials img {
    vertical-align: baseline;
  }

  #request .exp-date input {
    width: 90px;
  }

  .content .credit_card .credit-card {
    margin: auto;
  }

  #request .submit-button {
    margin: 0px auto;
    display: flex;
    flex-direction: column;
  }

  .submit-button {
    padding: 0 !important;
  }

  .submit-button .pure-button {
    padding: 0 !important;
    border-radius: 6px;
    box-shadow: 0 1px 5px 0px #000;
  }

  .credit-card {
    padding: 0 0 20px !important;
    border-radius: 6px;
  }

  .credentials {
    margin-top: 5px !important;
    font-size: 12px !important;
  }

  #logos {
    margin-top: -10px !important;
  }

  .pure-form input[type="text"], .pure-form input[type="tel"] {
    padding: 0;
  }

  .submit-button .in-progress {
    margin: 4px 0;
    display: none !important;
  }

  @media screen and (max-width: 321px) {
    .credentials {
      font-size: 10px !important;
    }
  }

  @media screen and (max-width: 250px) {
    .inline-logo img {
      max-height: 40px;
    }

    #logos-container {
        margin-top: 10px;
    }

    .credit-card {
      width: 100% !important;
    }

    .request_credit_card_holder input {
      width: 60% !important;
      left: 20px;
    }

    #request .verification-value input {
      top: 130px;
    }

    .request_credit_card_exp_date {
      left: 135px;
      width: 80px;
    }

    .request_credit_card_number input {
      top: 30px;
      position: absolute;
      left: 25px;
      width: 80% !important;
    }
  }
`;

export { styles };
