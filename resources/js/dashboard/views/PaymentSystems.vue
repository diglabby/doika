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
              <b-collapse id="payment" aria-expanded="true" visible role="tabpanel">
                <div>
                  <b-tabs>
                    <b-tab title = "BePaid" active>
                      <b-card-body>
                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.idMarket')"
                              label-for="idMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="idMarket"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.idMarket')"
                                v-model="model.idMarket"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.keyMarket')"
                              label-for="keyMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="keyMarket"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.keyMarket')"
                                v-model="model.keyMarket"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>

                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.minPayment')"
                              label-for="minPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="minPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.minPayment')"
                                v-model="model.minPayment"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.maxPayment')"
                              label-for="maxPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="maxPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.maxPayment')"
                                v-model="model.maxPayment"
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
                          <p-richtexteditor
                            name="body"
                            v-model="model.body"
                          ></p-richtexteditor>
                        </b-form-group>
                      </b-card-body>
                    </b-tab>
                    <b-tab title = "Artpay">
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
                              label-for="artPayminPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="artPayminPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.minPayment')"
                                v-model="model.artPayminPayment"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.maxPayment')"
                              label-for="artPaymaxPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="artPaymaxPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.maxPayment')"
                                v-model="model.artPaymaxPayment"
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
                          <p-richtexteditor
                            name="body"
                            v-model="model.body"
                          ></p-richtexteditor>
                        </b-form-group>
                      </b-card-body>
                    </b-tab>
                  </b-tabs>
                </div>

              </b-collapse>
            </b-card>
            <b-row slot="footer">
              <b-col md>
              </b-col>
              <b-col md>
                <input name="status" type="hidden" value="publish">

                <b-button right split class="float-right" variant="success" @click="model.status = 'publish'; onSubmit()" :disabled="pending">
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
import axios from 'axios'
import form from '../mixins/form'

export default {
  name: 'PaymentSystems',
  mixins: [form],
  data() {
    return {
      config: {
        wrap: true,
        time_24hr: true,
        enableTime: true
      },

      counter: 45,
      max: 100,
      modelName: 'campaign',
      resourceRoute: 'campaigns',
      listPath: '/campaigns',
      tags: [],
      model: {
        title: null,
        idMarket: null,
        keyMarket: null,
        minPayment: null,
        maxPayment: null,
        artPayIdMarket: null,
        artPayKeyMarket: null,
        artPayminPayment: null,
        artPaymaxPayment: null,
        summary: null,
        body: null,
        tags: [],
        featured_image: null,
        thumbnail_image_path: null,
        status: null,
        state: null,
        status_label: null,
        owner: {
          name: null
        },
        startAt: null,
        finishAt: null,
        pinned: false,
        promoted: false,
        meta: {
          title: null,
          description: null
        },
        has_featured_image: false
      }
    }
  },
  methods: {
    async getTags(search) {
      let { data } = await axios.get(this.$app.route('admin.tags.search'), {
        params: {
          q: search
        }
      })

      this.tags = data.items
    },
    deleteFeaturedImage() {
      this.$refs.featuredImageInput.reset()
      this.model.thumbnail_image_path = null
      this.model.has_featured_image = false
    }
  }
}
</script>
