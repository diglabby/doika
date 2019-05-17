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
                    v-if="!isNew"
                    required
                    :placeholder="$t('labels.admin.campaigns.placeholder.shortcode')"
                    v-model="shortcode"
                    :state="state('Shortcode')"
                  ></b-form-input>
                </b-col>
              </b-row>
            </h3>

            <b-row>
              <b-col>
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
                    v-model="model.name"
                    :state="nameState"
                    trim
                  ></b-form-input>
                </b-form-group>
              </b-col>
            </b-row>

            <b-form-group
              :label="$t('labels.admin.campaigns.description')"
              label-for="body"
              horizontal
              :label-cols="2"
            >
              <vue-editor name="description" v-model="model.description"></vue-editor>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.campaigns.image')"
              label-for="picture_url"
              horizontal
              :label-cols="2"
              :feedback="feedback('picture_url')"
            >
              <div class="media">
                <img class="mr-2" v-if="image.thumbnail_image_path" :src="image.thumbnail_image_path" alt="">

                <div class="media-body">
                  <h6>{{ $t('buttons.admin.campaigns.uploadImage') }}</h6>
                  <b-row>
                    <b-col lg="9">
                      <b-form-file
                        id="picture_url"
                        name="picture_url"
                        ref="featuredImageInput"
                        :placeholder="model.picture_url? model.picture_url: $t('labels.admin.campaigns.placeholder.image')"
                        v-model="model.picture_url"
                        :state="pictureState"
                        required
                        v-b-tooltip.hover
                        :title="$t('labels.admin.campaigns.allowedImageTypes')"
                        @change="previewImage"
                        style="margin-top auto; margin-bottom: auto;"
                      ></b-form-file>
                      <a href="#" class="d-block mt-1" v-if="image.has_picture_url || model.picture_url" @click.prevent="deleteFeaturedImage">{{ $t('buttons.admin.campaigns.deleteImage') }}</a>
                    </b-col>
                    <b-col lg="3">
                      <div class="image-preview">
                        <b-img class="preview" :src="model.picture_url"></b-img>
                      </div>
                    </b-col>
                  </b-row>

                </div>
              </div>
            </b-form-group>
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
                  <b-row>
                    <b-col lg="5">
                      <b-form-group
                        v-if="this.$app.user.can('publish campaigns')"
                        :label="$t('labels.admin.campaigns.startAt')"
                        label-for="start_at"
                        horizontal
                        required
                        :label-cols="4"
                        :state="startAtState"
                      >
                        <b-input-group>
                          <p-datetimepicker
                            id="start_at"
                            name="start_at"
                            :config="config"
                            v-model="model.started_at"
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
                    </b-col>
                    <b-col  offset-lg="1" lg="5">
                      <b-form-group
                        :label="$t('labels.admin.campaigns.finishAt')"
                        label-for="finishAt"
                        horizontal
                        :label-cols="4"
                      >
                        <b-input-group>
                          <p-datetimepicker
                            id="finishAt"
                            name="finishAt"
                            required
                            :config="config"
                            v-model="model.finished_at"
                            :state="finishAtState"
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
                    </b-col>
                  </b-row>

                  <b-row>
                    <b-col lg="5">
                      <b-form-group
                        :label="$t('labels.admin.campaigns.amount')"
                        label-for="amount"
                        horizontal
                        :label-cols="4"
                        :feedback="feedback('amount')"
                      >
                        <b-form-input
                          id="amount"
                          name="amount"
                          required
                          :placeholder="$t('labels.admin.campaigns.placeholder.amount')"
                          v-model="model.target_amount"
                          :state="amountState"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                    <b-col offset-lg="2" lg="6">
                    </b-col>
                  </b-row>

                  <div class="form-group">
                    <b-row class="mb-4 mt-4">
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="pinned"
                          v-model="model.active_status ? true : false"
                          :description="$t('labels.admin.campaigns.active')"
                        ></c-switch>
                      </b-col>
                      <!--
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="recurrent"
                          :description="$t('labels.admin.campaigns.recurrent')"
                        ></c-switch>
                      </b-col>-->
                    </b-row>
                    <b-row>
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="topBanner"
                          :description="$t('labels.admin.campaigns.topBanner')"
                        ></c-switch>
                      </b-col>
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="progressBar"
                          v-model="model.visual_settings.progressBar"
                          :description="$t('labels.admin.campaigns.progressBar')"
                        ></c-switch>
                      </b-col>
                    </b-row>
                  </div>
                </b-card-body>
              </b-collapse>
              <!--<b-card no-body class="mb-0">
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
              </b-card>-->
            </b-card>

            <b-row slot="footer">
              <b-col md>
                <b-button to="/campaigns" exact variant="secondary" size="sm">
                  {{ $t('buttons.admin.common.back') }}
                </b-button>
              </b-col>
              <b-col md>
                <input name="status" type="hidden" value="publish">

                <b-button right split class="float-right" variant="success" @click="onSubmit()" :disabled="buttonState">
                  {{ $t('buttons.admin.common.save') }}
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
import { VueEditor } from 'vue2-editor'
export default {
  name: 'CampaignForm',
  mixins: [form],
    components: {
        VueEditor
    },
  data() {
    return {
      config: {
        wrap: true,
        time_24hr: false,
        enableTime: false,
        onChange: function(selectedDates, dateStr, instance) {
          instance.close()
        }
      },
        id: null,
      counter: 45,
      max: 100,
      modelName: 'campaign',
      resourceRoute: 'campaigns',
      listPath: '/campaigns',
      imageData: '',
      model: {
        name: "",
        description: "",
        picture_url: "",
        active_status: 1,
        target_amount: 0,
        currency: 'BYN',
        started_at: null,
        finished_at: null,
        visual_settings: {
            buttons: [
             5, 10, 25, 50,
            ],
            progressBar: true,
            colors: null
          }
      },

      image: {
          thumbnail_image_path: null,
          has_picture_url: false,
      },
      images: {
          image: null,
          imageData: null
      }
    }
  },
    mounted: function(){
      this.getColors()
        console.log(this.model)
    },
    computed: {
        shortcode() {
            return "<iframe width='750' height='550' frameborder='0' src='/doika/doika/widget/campaigns/"+ this.id +"'></iframe>"
        },
        nameState() {
            return ((this.model.name.length > 2) && (this.model.name.length < 255)) ? true : false
        },

        pictureState() {
            return (this.model.picture_url != "") ? true : false
        },
        buttonState() {
            return !(this.nameState && this.pictureState && this.amountState)
        },
        startAtState() {
            return this.model.started_at != null
        },
        finishAtState() {
            return this.model.finished_at != null
        },
        amountState() {
            return (this.model.target_amount > 0) ? true : false
        }
    },
  methods: {
      async getColors() {
          let { data } = await axios.get(
              this.$app.route('dashboard.settings.index'),
              {
                  params:
                      {
                          keys:
                              ['widgetBackground', 'buttonBackground', 'progressBarColor', 'fontColor', 'termsOfUse']
                      }
              })
          this.model.visual_settings.colors = data.settings
          console.log(this.model)
      },
    deleteFeaturedImage() {
      this.$refs.featuredImageInput.reset()
      this.image.thumbnail_image_path = null
      this.image.has_picture_url = false
        this.model.picture_url = ""
    },
    previewImage: async  function(event) {
      // Reference to the DOM input element
      var input = event.target
      // Ensure that you have a file before attempting to read it
      if (input.files && input.files[0]) {
        // create a new FileReader to read this image and convert to base64 format
        var reader = new FileReader()
        // Define a callback function to run, when FileReader finishes its job
        reader.onload = e => {
          // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
          // Read image as base64 and set to imageData
          this.images.imageData = e.target.result

            this.imageData = e.target.result

        }
        // Start the reader job - read file as a data url (base64 format)
        reader.readAsDataURL(input.files[0])

          this.images.image = input.files[0]

      }

        let formData = new FormData()
        formData.append('image', input.files[0], input.files[0].name)

        let action = this.$app.route('dashboard.images.store')
        let { data } = await axios.post(action, formData, {headers: {
            'Content-Type': 'multipart/form-data',
        }})
        this.model.picture_url = data;
    },

  }
}
</script>
