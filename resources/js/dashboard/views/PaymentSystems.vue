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
                              :label="$t('labels.admin.settings.payments.bePaidIdMarket')"
                              label-for="bePaidIdMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidIdMarket"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.bePaidIdMarket')"
                                v-model="model.bePaidIdMarket"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.bePaidKeyMarket')"
                              label-for="bePaidKeyMarket"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidKeyMarket"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.bePaidKeyMarket')"
                                v-model="model.bePaidKeyMarket"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>

                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.minPayment')"
                              label-for="bePaidMinPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidMinPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.minPayment')"
                                v-model="model.bePaidMinPayment"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>

                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.payments.maxPayment')"
                              label-for="bePaidMaxPayment"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="bePaidMaxPayment"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.payments.placeholder.maxPayment')"
                                v-model="model.bePaidMaxPayment"
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
        bePaidIdMarket: null,
        bePaidKeyMarket: null,
        bePaidMinPayment: null,
        bePaidMaxPayment: null,
        artPayIdMarket: null,
        artPayKeyMarket: null,
        artPayMinPayment: null,
        artPayMaxPayment: null,
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
