<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row>
        <b-col xl="12">
          <b-card>
            <b-card no-body class="mb-0">
              <b-card-header header-tag="header" role="tab">
                <h5 class="card-title">
                  <a href="#" v-b-toggle.layout>
                    {{ $t('labels.admin.settings.layout.header') }}
                  </a>
                </h5>
              </b-card-header>
              <b-collapse id="layout" aria-expanded="true" visible role="tabpanel" >
                <b-card-body>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-6">
                      <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                          <div class="form-group">

                            <div class="col-sm-8">
                              <colorpicker :section_name="$t('labels.admin.layout.font')"
                                      :color="model.settings.fontColor"
                                      v-model="model.settings.fontColor"  />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                          <div class="form-group">
                            <div class="col-sm-8">
                              <colorpicker :section_name="$t('labels.admin.layout.background')"
                                      :color="model.settings.widgetBackground"
                                      v-model="model.settings.widgetBackground" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                          <div class="form-group">
                            <div class="col-sm-8">
                              <colorpicker :section_name="$t('labels.admin.layout.button')"
                                     :color="model.settings.buttonBackground"
                                     v-model="model.settings.buttonBackground" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                          <div class="form-group">
                            <div class="col-sm-8">
                              <colorpicker :section_name="$t('labels.admin.layout.progressBar')"
                                      :color="model.settings.progressBarColor"
                                      v-model="model.settings.progressBarColor" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-md-offset-6">
                      <b-card no-body>
                        <div class="container" :style="{ background: model.settings.widgetBackground }">
                        <p class="module-donate__title" :style="{ color: model.settings.fontColor }" >{{ fakeCampaign.title }}</p>
                        <div class="module-donate__wrapper">
                          <div class="module-donate__info">
                            <div class="module-donate__image">
                              <img :src="fakeCampaign.picture_url" class="mainImage" alt="doika image">
                              <div class="blurredImage"></div>
                            </div>
                            <div class="module-donate__description-wrapper">
                              <p class="module-donate__description" :style="{ color: model.settings.fontColor }">
                                {{ fakeCampaign.description }}
                              </p>
                            </div>
                          </div>

                          <div class="module-donate__main-panel">
                            <div class="module-donate__input">
                              <b-button v-for="button in fakeCampaign.button_values"  class="module-donate__button-select" :key="button" :style="{ background: model.settings.buttonBackground, color: model.settings.fontColor }">{{ button }} {{ fakeCampaign.currency }}</b-button>
                              <input type="number" :style="{ background:  model.settings.buttonBackground, color: model.settings.fontColor }" class="module-donate__text-input" :placeholder="$t('labels.widget.input')" >
                              <b-button class="module-donate__button-select payment" :style="{ background:  model.settings.buttonBackground, color: model.settings.fontColor }">{{ $t('buttons.widget.oneTime') }}</b-button>
                              <b-button class="module-donate__button-select payment" :style="{ background:  model.settings.buttonBackground, color: model.settings.fontColor }">{{ $t('buttons.widget.subscribe') }}</b-button>
                              <b-button id="button__confirm" :disabled="false" class="module-donate__button-select confirm" :style="{ color: model.settings.fontColor }">{{ $t('buttons.widget.confirm') }}</b-button>
                              <p class="module-donate__warning"></p>
                            </div>
                          </div>
                        </div>
                        <b-progress  :style="{ background: model.settings.progressBarColor}" :value="fakeCampaign.amount_collected" :max="fakeCampaign.target_amount" class="progress__bar"></b-progress>
                        <div class="module-donate__footer">
                          <p class="result__description" :style="{ color: model.settings.fontColor }">{{ $t('labels.widget.received') }}: <span class="summ__highlight">{{ fakeCampaign.amount_collected }} {{ fakeCampaign.currency }}</span></p>
                          <p class="result__received" :style="{ color: model.settings.fontColor }">{{ $t('labels.widget.needed') }}: <span class="summ__highlight">{{ fakeCampaign.target_amount }} {{ fakeCampaign.currency }}</span></p>
                          <p class="module-donate__version" :style="{ color: model.settings.fontColor }">powered by <a href="https://doika.falanster.by/" target="_blank">Doika</a></p>
                        </div>
                      </div>
                      </b-card>
                    </div>
                  </div>
                </b-card-body>
              </b-collapse>
            </b-card>
            <b-row slot="footer">
              <b-col md>
              </b-col>
              <b-col md>
                <input name="status" type="hidden" value="publish">

                <b-button right split class="float-right" variant="success" @click="onSubmit()">
                  {{ $t('buttons.admin.common.apply') }}
                </b-button>
              </b-col>
            </b-row>
          </b-card>
        </b-col>
      </b-row>
    </form>
  </div>
</template>

<style>
  @import url('https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&subset=cyrillic,cyrillic-ext');
  .module-donate__status {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 430px;
    flex-direction: column;
  }
  .status__title {
    font-family: Ubuntu;
    color:  #31383e;
    font-weight: 700;
    text-align: left;
    font-size: 20px;
    margin: 0;
    padding-bottom: 15px;
  }
  .status__text {
    font-family: Ubuntu;
    color:  #31383e;
    font-weight: 400;
    text-align: left;
    font-size: 14px;
    padding-top: 15px;
    margin: 0;
  }
  .module-donate__donateWindow {
    padding: 16px 0 0px 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: center;
    align-items: center;
    max-height: 100%;
    height: 100%;
  }

  .module-donate__card {
    width: auto;
    height: auto;
    overflow:hidden;
    position:relative;
  }

  .container {
    display: flex;
    flex-direction: column;
    align-content: space-between;
    padding: 35px;
  }

  .module-donate__title {
    font-family: 'Ubuntu', sans-serif;
    font-weight: 500;
    font-size: 20px;
    color: #191919;
    overflow: hidden;
    white-space: normal;
    text-overflow: ellipsis;
  }

  .module-donate__wrapper {
    padding: 16px 0 0px 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    min-height: 300px;
  }

  .module-donate__info {
    max-width: 360px;
  }

  .module-donate__main-panel {
    height: auto;
    width: auto;
    max-width: 265px;
  }

  .module-donate__image {
    height: 195px;
    width: 100%;
    overflow: hidden;
    position: relative;
  }

  .module-donate__image > img {
    width: 100%;
    height: 100%;
    position: relative;
  }

  .module-donate__image .blurredImage {
    position: absolute;
    top: 0;
    height: 100%;
    width: 100%;
    border: 10px solid rgba(255, 255, 255, 0.5);
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    left: 0;
  }

  .module-donate__input {
    width: 100%;
    height: 100%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: space-between;
  }

  input[type=number]::-webkit-outer-spin-button,
  input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  input[type=number] {
    -moz-appearance:textfield;
  }

  a {
    text-decoration: none !important;
  }

  .module-donate__button-select {
    font-family: Ubuntu, sans-serif;
    width: 75px;
    height: 50px;
    margin-bottom:20px;
    border: none;
    padding: 0;
    background-color: #FAFAFA;
    color: #303030;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    white-space: nowrap;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease 0s;
    display: flex;
    align-items: center;
    justify-content: center;
    -webkit-font-smoothing: antialiased;
  }

  .module-donate__button-nonselect {
    font-family: Ubuntu, sans-serif;
    width: 75px;
    height: 50px;
    margin-bottom:20px;
    border: none;
    padding: 0;
    background-color: #FFFFFF;
    color: #303030;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    white-space: nowrap;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease 0s;
    display: flex;
    align-items: center;
    justify-content: center;
    -webkit-font-smoothing: antialiased;
  }
  #button__confirm.disabled {
    background-color: #cccccc !important;
  }
  .module-donate__button-select.clicked {
    outline: none !important;
    background-color: #383838 !important;
    color: #FF80B4;
    transition: all 0.3s ease 0s;
    -webkit-font-smoothing: antialiased;
  }

  .module-donate__button-select.payment {
    width:50%;
  }

  .module-donate__button-select:focus {
    outline: none !important;
    background-color: #383838 !important;
    color: #FF80B4;
  }

  .module-donate__button-select:hover {
    color: #FF80B4;
    -webkit-transform: perspective(1px) scale(1.1);
    -ms-transform: perspective(1px) scale(1.1);
    transform: perspective(1px) scale(1.1);
    transition: all 0.3s ease 0s;
    -webkit-font-smoothing: antialiased;
  }

  .module-donate__button-select.confirm {
    margin-left: auto;
    height: 50px;
    width: 165px;
    overflow: hidden;
    background-color: #FF80B4;
    margin-bottom: 10px;
    margin-top: 15px;
  }

  .module-donate__button-nonselect.confirm {
    margin-left: auto;
    height: 50px;
    width: 165px;
    overflow: hidden;
    background-color: #FFFFFF;
    margin-bottom: 10px;
    margin-top: 15px;
  }

  .module-donate__button-select.confirm:hover {
    background-color: #FF80B4;
    color: #303030;
  }
  .md-field label {
    font-family: Ubuntu;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 16px;
    color: #3B3B3B !important;
  }
  .md-input {
    border-color: #000000 !important;
  }

  .module-donate__button-confirm {
    font-family: Ubuntu, sans-serif;
    width: 160px;
    height: 55px;
    margin: 5px 0px 0px 10px;
    border: none;
    color: #FF80B4 !important;
    font-size: 18px;
    font-weight: 500;
    background-color: #94c840;
    transition: all 0.3s ease 0s;
    cursor: pointer;
  }

  .module-donate__button-confirm:hover {
    color: #31383e;
    -webkit-transform: perspective(1px) scale(1.1);
    -ms-transform: perspective(1px) scale(1.1);
    transform: perspective(1px) scale(1.1);
    transition: all 0.3s ease 0s;
  }

  .module-donate__button-confirm:focus {
    color: #31383e;
    transition: all 0.3s ease 0s;
    outline: none;
  }

  .module-donate__button-confirm.warning-open {
    margin-top: -20px;
  }

  .donate__checkbox .custom-control-label {
    font-family: Ubuntu;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 12px;
    color: #000000 !important;

    padding-bottom: 45px;
  }

  .donateWindow__footer {
    margin-top: 50px;
    font-size: 0;
    width: 400px;
    text-align: left;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .donateWindow__footer .back {
    margin-left: 0;
  }

  .donate__email {
    width: 250px !important;
  }
  .module-donate__text-input {
    font-family: Ubuntu, sans-serif;
    font-size: 18px;
    font-weight: 500;
    text-align: left;
    width: 170px;
    height: 50px;
    color: #191919;
    border: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0px 5px 0px 15px;
    color: #31383e;
    -moz-appearance:textfield;
    -webkit-appearance: none;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease 0s;
  }

  .module-donate__text-input.recurrent {
    margin-bottom: 30px;
    width: 400px;
  }

  .module-donate__title.recurrent {
    margin-bottom: 25px;
  }
  .module-donate__text-input::-webkit-outer-spin-button,
  .module-donate__text-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
  }

  .module-donate__text-input:focus{
    border: none;
    border-radius: 2px;
    outline: none;
  }

  .module-donate__text-input:hover{
    -webkit-transform: perspective(1px) scale(1.1);
    -ms-transform: perspective(1px) scale(1.1);
    transform: perspective(1px) scale(1.1);
    transition: all 0.3s ease 0s;
  }

  .module-donate__text-input::-webkit-input-placeholder {
    font-family: Ubuntu, sans-serif;
    color:  #191919;
    font-weight: 500;
  }

  .module-donate__text-input:-ms-input-placeholder {
    font-family: Ubuntu, sans-serif;
    color:  #191919;
    font-weight: 500;
  }

  .module-donate__text-input::-ms-input-placeholder {
    font-family: Ubuntu, sans-serif;
    color:  #191919;
    font-weight: 500;
  }

  .module-donate__text-input::placeholder {
    font-family: Ubuntu, sans-serif;
    color:  #303030;
    font-weight: 400;
  }

  .module-donate__text-input.warning-open {
    margin-top: -20px;
  }


  .module-donate__warning {
    width: 100%;
    text-align: center;
    font-size: 13px;
    font-family: Ubuntu, sans-serif;
    margin: -10px;
    color: red;
    max-height: 0;
    overflow: hidden;
    -webkit-transition: max-height 0.3s;
    -o-transition: max-height 0.3s;
    transition: max-height 0.3s;
  }
  .module-donate__warning.opened {
    max-height: 35px;
    -webkit-transition: max-height 0.3s;
    -o-transition: max-height 0.3s;
    transition: max-height 0.3s;
  }

  .module-donate__description-wrapper {
    width: auto;
  }

  .module-donate__description {
    padding: 20px 0 0 0;
    width: 100%;
    height: auto;
    font-family: Ubuntu, sans-serif;
    color:  #191919;
    font-size: 12px;
    font-weight: 500;
    line-height: 16px;
    text-align: left;
    clear: both;
    margin: 0;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
    overflow: hidden;
  }

  .module-donate__progress-bar {
    background-color:  #f5f9fc;
    width: 100%;
    height: 20px;
    font-size: 0;
    margin-top: 25px;
    overflow: hidden;
  }

  .progress__bar {
    border-radius: 10px;
    background-color: #DDDDDD;
    margin-top: 30px;
    height: 15px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07), 0 3px 6px rgba(0, 0, 0, 0.08);
  }

  .progress-bar {
    background-color: #FF80B4;
    border-radius: 10px;
    height: 15px;
  }

  .module-donate__progress-bar .progress-bar__track {
    background-color:  #5899d0;
    width: 0px;
    height: 100%;
    position: relative;
    display: inline-block;
    z-index: 1;
    overflow:hidden;
  }

  .module-donate__progress-bar .progress-bar__track::after {
    content: "";
    position: absolute;
    right: 10px;
    bottom: 0;
    width: 0;
    height: 0;
    border-left: 10px solid #5899d0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    -webkit-box-sizing: unset;
    box-sizing: unset;
  }

  .module-donate__progress-bar .progress-bar__track::before {
    content: "";
    position: absolute;
    right: 0;
    bottom: 0;
    width: 10px;
    height: 0;
    background: #7faed6;
    border-left: 10px solid #7faed6;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    -webkit-box-sizing: unset;
    box-sizing: unset;
  }

  .progress-bar__pointer {
    width: 20px;
    height: 100%;
    position: relative;
    background: #b0c7da;
    display: inline-block;
  }
  .progress-bar__pointer:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 0;
    border-left: 10px solid #7faed6;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
  }
  .progress-bar__pointer:before {
    content: "";
    position: absolute;
    right: -10px;
    bottom: 0;
    width: 0;
    height: 0;
    border-left: 10px solid #b0c7da;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
  }

  .app .module-donate__footer {
    font-size: 0;
    text-align: left;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 14px;
  }

  .payment__description {
    font-family: Ubuntu, sans-serif;
    color:  #94989c;
    font-size: 13px;
    font-weight: 400;
    text-align: left;
    text-decoration: underline !important;
    cursor: pointer;
    vertical-align: text-bottom;
    margin-top: -2px;
  }
  .module-donate__version.donateWindow {
    margin-top: 55px;
  }

  .module-donate__version {
    font-family: Ubuntu, sans-serif;
    color:  #94989c;
    font-size: 12px;
    font-weight: 400;
    text-align: right;
    width: 100%;
    text-decoration: none;
    float: right;
    margin: 0;
    padding: 20px 0 0 0;
  }
  .module-donate__version a {
    text-decoration: none;
    color:  #94989c;
  }

  .result__description {
    font-family: Ubuntu, sans-serif;
    color:  #191919;
    font-size: 18px;
    font-weight: 500;
    display: inline-block;
    padding: 0;
    margin: 0;
    min-width: 33%;
    white-space: nowrap;
  }

  .result__received {
    font-family: Ubuntu, sans-serif;
    color:  #191919;
    font-size: 18px;
    font-weight: 500;
    text-align: right;
    display: inline-block;
    padding: 0;
    margin: 0;
    min-width: 33%;
    white-space: nowrap;
  }

  .donate-bePaid__form {
    overflow: auto;
    height: 100%;
    width: 100%;
  }

  .donate-bePaid__form iframe {
    height: 100%;
    width: 100%;
  }

  .summ__highlight {
    font-family: Ubuntu, sans-serif;
    color:  #FF80B4;
    font-size: 18px;
    font-weight: 500;
  }

  @media all and (max-width: 740px) {

    .app {
      overflow: hidden;
      padding: 15px 40px 15px 40px;
    }
    .module-donate__main-panel {
      height: auto;
      width: 50%;
    }

    .module-donate__image {
      height: 230px;
      width: 50%;
      overflow: hidden;
      position: relative;
    }

    .module-donate__description {
      text-align: justify;
    }

  }
  @media all and (max-width: 700px) {

    .app {
      overflow: hidden;
      height: 100%;
      padding: 15px 40px 0px 40px;
    }

    .module-donate__title {
      text-align: center;
    }

    .module-donate__wrapper {
      padding: 25px 0 0px 0;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
    }

    .module-donate__main-panel {
      max-width: 355px;
      width: 80%;
      height: auto;
      margin-top: 20px;

    }

    .module-donate__image {
      width: 80%;
      max-width: 355px;
      overflow: hidden;
      position: relative;
      height: auto;
    }

    .module-donate__image > img {
      width: 100%;
      height: auto;
      position: relative;
    }

    .module-donate__input {
      width: 100%;
      height: 100%;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
      -ms-flex-direction: row;
      flex-direction: row;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -ms-flex-pack: distribute;
      justify-content: space-around;
      align-content: flex-start;
    }

    .module-donate__button-select {
      margin: 0px 0px 30px 0px;
    }

    .app .module-donate__footer {
      font-size: 0;
      text-align: center;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      margin-top: 15px;
    }

    .payment__description {
      width: auto;
    }
    .module-donate__version {
      padding-top: 10px;
      width: auto;
    }
    .result__description {
      padding-top: 10px;
    }
  }

  @media all and (max-width: 450px) {

    .module-donate__text-input.warning-open, .module-donate__button-confirm.warning-open {
      margin-top: 0;
    }
    .module-donate__warning {
      margin: 0;
    }

    .module-donate__button-select {
      margin: 0px 0px 15px 0px;
    }

    .module-donate__input > * {
      margin-left: auto;
      margin-right: auto;
    }

    .module-donate__main-panel {
      max-width: 100%;
      width: 80%;
      height: auto;
      margin-top: 20px;
      min-width: 100px;
    }

    .app {
      overflow: hidden;
      height: 100%;
      padding: 10px 10px 0px 10px;
    }

    .module-donate__description {
      line-height: 20px;
    }

    .result__description {
      padding-top: 10px;
      padding-bottom: 0;
      font-size: 16px;
    }
    .result__description > span {
      font-size: 16px;
    }
  }

  .checkbox-agreement {
    width: 100%;
    text-align: right;
    display: inline-flex;
    height: 18px;
    justify-content: flex-end;
  }

  .modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
  }

  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
    min-height: 10vh;
    width: 35vw;
  }

  .modal-container {
    width: 600px;
    margin: 0px auto;
    padding: 20px 30px;
    background-color: #000;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
    font-family: Ubuntu, sans-serif;
    font-weight: 500;
    color: #333;
  }

  .modal-header h3 {
    margin-top: 0;
    color: #42b983;
  }
  .modal-container #modal-cross {
    text-align: right;
    width: 100%;
    float: right;
    cursor: pointer;

  }
  .modal-header{
    text-align: center;
    font-size: 20px;
    font-weight: 700;
  }
  .modal-body {
    margin: 20px 0;
    text-align: justify;
    max-height: 80vh;
    overflow-y: auto;
    padding-right: 15px;
  }
</style>

<script>
import axios from 'axios'
import form from '../mixins/form'

export default {
  name: 'Layout',
  mixins: [form],
  data() {
    return {

        fakeCampaign: {
          title: 'Прыклад кампаніі',
          description: 'Тэкст кампаніі',
          button_values: [
              2, 4, 6, 8
          ],
          currency: 'BYN',
          target_amount: 1000,
          amount_collected: 10,
          picture_url: '/doika/public/images/logo_campaign.png',
        },

        modelName: 'settings',
        resourceRoute: 'settings',
        listPath: '/layout',
        model: {
          settings: {
              widgetBackground: '#ccc',
              buttonBackground: '#ccc',
              donateButtonBackground: '',
              progressBarColor: '#000',
              fontColor: '#000',
          }
        }
    }
  },

  mounted: function() {
      this.getColors()
  },
  methods: {
    async getColors() {
      let { data } = await axios.get(
          this.$app.route('dashboard.settings.index'),
          {
              params:
              {
                  keys:
                      ['widgetBackground', 'buttonBackground', 'progressBarColor', 'fontColor']
              }
          })
      this.model.settings = data.settings
        console.log(data)
    }
  }
}
</script>
