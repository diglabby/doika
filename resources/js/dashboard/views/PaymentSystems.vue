<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row>
        <b-col xl="12">
          <b-card>
            <b-card no-body class="mb-0">
              <b-card-header header-tag="header" role="tab">
                <h5 class="card-title">
                  <a href="#" v-b-toggle.payment>
                    {{ $t('labels.admin.settings.payments.header') }}
                  </a>
                </h5>
              </b-card-header>
              <b-collapse
                id="payment"
                aria-expanded="true"
                visible
                role="tabpanel"
              >
                <div>
                  <b-tabs>
                    <b-tab title="BePaid" active>
                      <b-card-body>
                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="
                                $t(
                                  'labels.admin.settings.payments.bePaidIdMarket'
                                )
                              "
                              label-for="bePaidIdMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidIdMarket"
                                name="title"
                                required
                                :placeholder="
                                  $t(
                                    'labels.admin.settings.payments.placeholder.bePaidIdMarket'
                                  )
                                "
                                v-model="model.settings.gateway_bePaid_idMarket"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="
                                $t(
                                  'labels.admin.settings.payments.bePaidKeyMarket'
                                )
                              "
                              label-for="bePaidKeyMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidKeyMarket"
                                name="title"
                                required
                                :placeholder="
                                  $t(
                                    'labels.admin.settings.payments.placeholder.bePaidKeyMarket'
                                  )
                                "
                                v-model="
                                  model.settings.gateway_bePaid_keyMarket
                                "
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>

                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="
                                $t('labels.admin.settings.payments.minPayment')
                              "
                              label-for="bePaidMinPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidMinPayment"
                                name="title"
                                required
                                :placeholder="
                                  $t(
                                    'labels.admin.settings.payments.placeholder.minPayment'
                                  )
                                "
                                v-model="model.settings.minPayment"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="
                                $t('labels.admin.settings.payments.maxPayment')
                              "
                              label-for="bePaidMaxPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidMaxPayment"
                                name="max"
                                required
                                :placeholder="
                                  $t(
                                    'labels.admin.settings.payments.placeholder.maxPayment'
                                  )
                                "
                                v-model="model.settings.maxPayment"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>
                        <!--<b-row>
                          <b-col md>
                            <b-form-group
                                    :label="$t('labels.admin.settings.payments.paymentInterval')"
                                    label-for="bePaidPaymentInterval"
                                    horizontal
                                    :label-cols="4"
                                    :feedback="feedback('title')"
                            >
                              <b-form-select v-model="model.settings.paymentInterval" class="mb-3">
                                <option :value="P1H">{{ $t('labels.admin.settings.payments.paymentInterval1H') }}</option>
                                <option value="P1D">{{ $t('labels.admin.settings.payments.paymentInterval1D') }}</option>
                                <option value="P1M">{{ $t('labels.admin.settings.payments.paymentInterval1M') }}</option>
                                <option value="P1Y">{{ $t('labels.admin.settings.payments.paymentInterval1Y') }}</option>
                              </b-form-select>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                          </b-col>
                        </b-row>-->
                        <div class="form-group">
                          <b-row class="mb-4 mt-4">
                            <b-col lg="5" offset-lg="2">
                              <c-switch
                                name="test"
                                v-model="liveMode"
                                :description="
                                  $t('labels.admin.settings.payments.test')
                                "
                              ></c-switch>
                            </b-col>
                          </b-row>
                        </div>
                        <b-form-group
                          :label="
                            $t('labels.admin.settings.payments.termsOfUse')
                          "
                          label-for="body"
                          horizontal
                          :label-cols="2"
                        >
                          <vue-editor
                            name="termsOfUse"
                            v-model="model.settings.termsOfUse"
                          ></vue-editor>
                        </b-form-group>
                      </b-card-body>
                    </b-tab>
                    <!-- <b-tab title = "Artpay">
                      <b-card-body>
                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.artPayIdMarket')"
                              label-for="artPayIdMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="artPayIdMarket"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.artPayIdMarket')"
                                v-model="model.artPayIdMarket"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.artPayKeyMarket')"
                              label-for="artPayKeyMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="artPayKeyMarket"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.artPayKeyMarket')"
                                v-model="model.artPayKeyMarket"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>

                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.minPayment')"
                              label-for="artPayMinPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="artPayMinPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.minPayment')"
                                v-model="model.artPayMinPayment"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.maxPayment')"
                              label-for="artPayMaxPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="artPayMaxPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.maxPayment')"
                                v-model="model.artPayMaxPayment"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>
                        <div class="form-group">
                          <b-row class="mb-4 mt-4">
                            <b-col lg="5" offset-lg="2">
                              <c-switch
                                name="test"
                                v-model="model.test"
                                :description="$t('labels.admin.settings.payments.test')"
                              ></c-switch>
                            </b-col>
                          </b-row>
                        </div>
                        <b-form-group
                          :label="$t('labels.admin.settings.payments.termsOfUse')"
                          label-for="body"
                          horizontal
                          :label-cols="2"
                        >
                        </b-form-group>
                      </b-card-body>
                    </b-tab>-->
                  </b-tabs>
                </div>
              </b-collapse>
            </b-card>
            <b-row slot="footer">
              <b-col md>
              </b-col>
              <b-col md>
                <input name="status" type="hidden" value="publish" />

                <b-button
                  right
                  split
                  class="float-right"
                  variant="success"
                  @click="onSubmit()"
                  :disabled="pending"
                >
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

<script>
import axios from 'axios';
import form from '../mixins/form';

export default {
  name: 'PaymentSystems',
  mixins: [form],

  data() {
    return {
      modelName: 'settings',
      resourceRoute: 'settings',
      listPath: '/paymentSystems',

      model: {
        settings: {
          gateway_bePaid_idMarket: null,
          gateway_bePaid_keyMarket: null,
          termsOfUse: null,
          disableLivePayments: false, // "test",
          minPayment: null,
          maxPayment: null,
          paymentInterval: 'P1H'
        }
      }
    };
  },
  computed: {
    liveMode: function() {
      return this.model.settings.disableLivePayments
        ? this.model.settings.disableLivePayments
        : true; //"test";
    },

    //needs to be developed or deleted
    pending() {
      return false;
    }
  },
  mounted: function() {
    this.getCredentials();
  },
  methods: {
    async getCredentials() {
      let { data } = await axios.get(
        this.$app.route('dashboard.settings.index'),
        {
          params: {
            keys: [
              'gateway_bePaid_idMarket',
              'gateway_bePaid_keyMarket',
              'termsOfUse',
              'disableLivePayments',
              'minPayment',
              'maxPayment',
              'paymentInteval'
            ]
          }
        }
      );

      this.model.settings = data.settings;
    }
  }
};
</script>
