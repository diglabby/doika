<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row>
        <b-col xl="8">
          <b-card>
            <h3>
              <b-row>
                <b-col lg="5">
                  <h3 class="card-title" slot="header">{{ isNew ? $t('labels.admin.campaigns.create.title') : $t('labels.admin.campaigns.edit.title') }}</h3>
                </b-col>
                <b-col offset-lg="2" lg="5">
                  <b-form-input
                    id="title"
                    name="shortcode"
                    required
                    :placeholder="$t('labels.admin.campaigns.placeholder.shortcode')"
                    v-model="model.shortcode"
                    :state="state('Shortcode')"
                  ></b-form-input>
                </b-col>
              </b-row>
            </h3>
            <b-form-group
              :label="$t('labels.admin.campaigns.name')"
              label-for="title"
              horizontal
              :label-cols="2"
              :feedback="feedback('title')"
            >
              <b-form-input
                id="title"
                name="title"
                required
                :placeholder="$t('labels.admin.campaigns.placeholder.name')"
                v-model="model.title"
                :state="state('title')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.campaigns.description')"
              label-for="body"
              horizontal
              :label-cols="2"
            >
              <p-richtexteditor
                name="body"
                v-model="model.body"
              ></p-richtexteditor>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.campaigns.image')"
              label-for="featured_image"
              horizontal
              :label-cols="2"
              :feedback="feedback('featured_image')"
            >
              <div class="media">
                <img class="mr-2" v-if="model.thumbnail_image_path" :src="model.thumbnail_image_path" alt="">

                <div class="media-body">
                  <h6>{{ $t('buttons.admin.campaigns.uploadImage') }}</h6>
                  <b-form-file
                    id="featured_image"
                    name="featured_image"
                    ref="featuredImageInput"
                    :placeholder="$t('labels.admin.campaigns.placeholder.image')"
                    v-model="model.featured_image"
                    :state="state('featured_image')"
                    v-b-tooltip.hover
                    :title="$t('labels.admin.campaigns.allowedImageTypes')"
                  ></b-form-file>
                  <a href="#" class="d-block mt-1" v-if="model.has_featured_image || model.featured_image" @click.prevent="deleteFeaturedImage">{{ $t('buttons.campaign.deleteImage') }}</a>
                </div>
              </div>
            </b-form-group>
            <b-row>
              <b-col lg="5" offset-lg="1">
                <b-form-group
                  :label="$t('labels.admin.languageMenu.header')"
                  :label-for="$t('labels.admin.languageMenu.header')"
                  horizontal
                  :label-cols="4"
                >
                  <div class="form-group">
                    <b-dropdown text="Language" class="m-md-2" variant="primary">
                      <b-dropdown-item to="/">
                        {{ $t('labels.admin.languageMenu.en') }}
                      </b-dropdown-item>
                      <b-dropdown-item to="/">
                        {{ $t('labels.admin.languageMenu.ru') }}
                      </b-dropdown-item>
                      <b-dropdown-item to="/">
                        {{ $t('labels.admin.languageMenu.be') }}
                      </b-dropdown-item>
                    </b-dropdown>
                  </div>
                </b-form-group>
              </b-col>

              <b-col lg="5">
                <b-form-group
                  :label="$t('labels.admin.campaigns.paymentSystem')"
                  :label-for="$t('labels.admin.campaigns.paymentSystem')"
                  horizontal
                  :label-cols="4"
                >
                  <div class="form-group">
                    <b-dropdown text="Payment system" class="m-md-2" variant="primary">
                      <b-dropdown-item to="/">
                        {{ $t('labels.admin.payments.system.bepaid') }}
                      </b-dropdown-item>
                      <b-dropdown-item to="/">
                        {{ $t('labels.admin.payments.system.visa') }}
                      </b-dropdown-item>
                    </b-dropdown>
                  </div>
                </b-form-group>
              </b-col>
            </b-row>
            <b-card no-body class="mb-0">
              <b-card-header header-tag="header" role="tab">
                <h5 class="card-title">
                  <a href="#" v-b-toggle.collapseOne>
                    {{ $t('labels.admin.campaigns.options') }}
                  </a>
                </h5>
              </b-card-header>
              <b-collapse id="collapseOne" visible accordion="campaign-accordion" role="tabpanel">
                <b-card-body>
                  <b-form-group
                    v-if="this.$app.user.can('publish campaigns')"
                    :label="$t('labels.admin.campaigns.startAt')"
                    label-for="start_at"
                    horizontal
                    :label-cols="3"
                  >
                    <b-input-group>
                      <p-datetimepicker
                        id="start_at"
                        name="start_at"
                        :config="config"
                        v-model="model.startAt"
                      ></p-datetimepicker>
                      <b-input-group-append>
                        <b-input-group-text data-toggle>
                          <i class="fe fe-calendar"></i>
                        </b-input-group-text>
                        <b-input-group-text data-clear>
                          <i class="fe fe-x-circle"></i>
                        </b-input-group-text>
                      </b-input-group-append>
                    </b-input-group>
                  </b-form-group>

                  <b-form-group
                    v-if="this.$app.user.can('publish campaigns')"
                    :label="$t('labels.admin.campaigns.finishAt')"
                    label-for="finishAt"
                    horizontal
                    :label-cols="3"
                  >
                    <b-input-group>
                      <p-datetimepicker
                        id="finishAt"
                        name="finishAt"
                        :config="config"
                        v-model="model.finishedAt"
                      ></p-datetimepicker>
                      <b-input-group-append>
                        <b-input-group-text data-toggle>
                          <i class="fe fe-calendar"></i>
                        </b-input-group-text>
                        <b-input-group-text data-clear>
                          <i class="fe fe-x-circle"></i>
                        </b-input-group-text>
                      </b-input-group-append>
                    </b-input-group>
                  </b-form-group>

                  <div class="form-group">
                    <b-row class="mb-4 mt-4">
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="pinned"
                          v-model="model.active"
                          :description="$t('labels.admin.campaigns.active')"
                        ></c-switch>
                      </b-col>
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="recurrent"
                          v-model="model.reccurent"
                          :description="$t('labels.admin.campaigns.recurrent')"
                        ></c-switch>
                      </b-col>
                    </b-row>
                    <b-row>
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="topBanner"
                          v-model="model.topBanner"
                          :description="$t('labels.admin.campaigns.topBanner')"
                        ></c-switch>
                      </b-col>
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="progressBar"
                          v-model="model.progressBar"
                          :description="$t('labels.admin.campaigns.progressBar')"
                        ></c-switch>
                      </b-col>
                    </b-row>
                  </div>
                </b-card-body>
              </b-collapse>
              <b-card no-body class="mb-0">
                <b-card-header header-tag="header" role="tab">
                  <h5 class="card-title">
                    <a href="#" v-b-toggle.recurrent>
                      {{ $t('labels.admin.campaigns.recurrent') }}
                    </a>
                  </h5>
                </b-card-header>
                <b-collapse id="recurrent" visible role="tabpanel">
                  <b-card-body>
                    <div style = "min-height:250px">
                    </div>
                  </b-card-body>
                </b-collapse>
              </b-card>
            </b-card>

            <b-row slot="footer">
              <b-col md>
                <b-button to="/campaigns" exact variant="danger" size="sm">
                  {{ $t('buttons.admin.common.back') }}
                </b-button>
              </b-col>
              <b-col md>
                <input name="status" type="hidden" value="publish">

                <b-button right split class="float-right" variant="success" @click="model.status = 'publish'; onSubmit()" :disabled="pending">
                  {{ $t('buttons.admin.common.save') }}
                </b-button>
              </b-col>
            </b-row>
          </b-card>
        </b-col>
        <b-col xl="4">
          <b-card no-body class="mb-0">
            <b-card-header header-tag="header" role="tab">
              <h5 class="card-title">
                <a href="#" v-b-toggle.colors>
                  {{ $t('labels.admin.campaigns.colors') }}
                </a>
              </h5>
            </b-card-header>
            <b-collapse id="colors" visible role="tabpanel">
              <b-card-body>
                <div style = "min-height:250px">
                </div>
              </b-card-body>
            </b-collapse>
          </b-card>
          <b-card no-body class="mb-0 mt-4">
            <b-card-header header-tag="header" role="tab">
              <h5 class="card-title">
                <a href="#" v-b-toggle.preview>
                  {{ $t('labels.admin.campaigns.preview') }}
                </a>
              </h5>
            </b-card-header>
            <b-collapse id="preview" visible role="tabpanel">
              <b-card-body>
                <div style = "min-height:250px">
                </div>
              </b-card-body>
            </b-collapse>
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
  name: 'CampaignForm',
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
