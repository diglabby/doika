<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row>
        <b-col xl="8">
          <b-card>
            <h3>
              <b-row>
                <b-col lg="5">
                  <h3
                    class="card-title"
                    slot="header"
                  >{{ isNew ? $t('labels.admin.campaigns.create.title') : $t('labels.admin.campaigns.edit.title') }}</h3>
                </b-col>
                <b-col offset-lg="2" lg="5">
                  <b-form-input
                    id="title"
                    name="shortcode"
                    v-if="!isNew"
                    required
                    :placeholder="$t('labels.admin.campaigns.placeholder.shortcode')"
                    v-model="shortcode"
                  ></b-form-input>
                </b-col>
              </b-row>
            </h3>

            <b-row>
              <b-col>
                <b-form-group
                  label-for="title"
                  horizontal
                  :label-cols="2"
                  :feedback="feedback('title')"
                >
                  <template v-slot:label>
                    {{ $t('labels.admin.campaigns.name') }}
                    <span class="text-danger">*</span>
                  </template>
                  <b-form-input
                    id="title"
                    name="title"
                    required
                    :placeholder="$t('labels.admin.campaigns.placeholder.name')"
                    v-model="model.name"
                    :state="nameState"
                    trim
                  ></b-form-input>
                  <b-form-invalid-feedback id="title-feedback">Enter at least 3 letters</b-form-invalid-feedback>
                </b-form-group>
              </b-col>
            </b-row>
            <b-form-group label-for="body" horizontal :label-cols="2">
              <template v-slot:label>
                {{ $t('labels.admin.campaigns.description') }}
                <span class="text-danger">*</span>
              </template>
              <vue-editor
                class="description-shadow"
                :class="{'description-shadow_is-valid': this.model.description.length,
                        'description-shadow_is-valid-backlight': editorFocus && this.model.description.length,
                        'description-shadow_is-invalid-backlight': editorFocus && !this.model.description.length}"
                @blur="editorFocus = false"
                @focus="editorFocus = true"
                name="description"
                v-model="model.description"
              ></vue-editor>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.campaigns.image')"
              label-for="picture_url"
              horizontal
              :label-cols="2"
              :feedback="feedback('picture_url')"
            >
              <div class="media">
                <img
                  class="mr-2"
                  v-if="image.thumbnail_image_path"
                  :src="image.thumbnail_image_path"
                  alt
                />

                <div class="media-body">
                  <h6>{{ $t('buttons.admin.campaigns.uploadImage') }}</h6>
                  <b-row>
                    <b-col lg="9">
                      <b-form-file
                        id="picture_url"
                        name="picture_url"
                        ref="featuredImageInput"
                        :placeholder="pictureName ? pictureName: $t('labels.admin.campaigns.placeholder.image')"
                        :state="pictureState"
                        v-b-tooltip.hover
                        :title="$t('labels.admin.campaigns.allowedImageTypes')"
                        @change="previewImage"
                        style="margin-top auto; margin-bottom: auto;"
                      ></b-form-file>
                      <a
                        href="#"
                        class="d-block mt-1"
                        v-if="image.has_picture_url || pictureName"
                        @click.prevent="deleteFeaturedImage"
                      >{{ $t('buttons.admin.campaigns.deleteImage') }}</a>
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
                  <a href="#" v-b-toggle.collapseOne>{{ $t('labels.admin.campaigns.options') }}</a>
                </h5>
              </b-card-header>
              <b-collapse id="collapseOne" visible accordion="campaign-accordion" role="tabpanel">
                <b-card-body>
                  <b-row class="date-field">
                    <b-form-group
                      v-if="this.$app.user.can('publish campaigns')"
                      label-for="start_at"
                      horizontal
                      required
                      :label-cols="4"
                      :state="startAtState"
                    >
                      <template v-slot:label>
                        {{ $t('labels.admin.campaigns.startAt') }}
                        <span class="text-danger">*</span>
                      </template>
                      <b-input-group>
                        <p-datetimepicker
                          id="start_at"
                          name="start_at"
                          v-model="model.start_at"
                          :config="config"
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
                  </b-row>
                  <b-row class="date-field">
                    <b-form-group label-for="finishAt" horizontal :label-cols="4">
                      <template v-slot:label>
                        {{ $t('labels.admin.campaigns.finishAt') }}
                        <span class="text-danger">*</span>
                      </template>
                      <b-input-group>
                        <p-datetimepicker
                          id="finishAt"
                          name="finishAt"
                          required
                          v-model="model.finish_at"
                          :state="finishAtState"
                          :config="config"
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
                  </b-row>
                  <b-row>
                    <b-col lg="5">
                      <b-form-group
                        label-for="amount"
                        horizontal
                        :label-cols="4"
                        :feedback="feedback('amount')"
                      >
                        <template v-slot:label>
                          {{ $t('labels.admin.campaigns.amount') }}
                          <span class="text-danger">*</span>
                        </template>
                        <b-form-input
                          id="amount"
                          name="amount"
                          required
                          :placeholder="
                            $t('labels.admin.campaigns.placeholder.amount')
                          "
                          v-model="model.target_amount"
                          :state="amountState"
                        ></b-form-input>
                        <b-form-invalid-feedback id="amount-feedback">
                          Please
                          enter a number greater than zero
                        </b-form-invalid-feedback>
                      </b-form-group>
                    </b-col>
                    <b-col offset-lg="2" lg="6"></b-col>
                  </b-row>

                  <div class="form-group">
                    <b-row class="mb-4 mt-4">
                      <b-col lg="5" offset-lg="1">
                        <c-switch
                          name="pinned"
                          v-model="model.active_status"
                          :checked="false"
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
                      <!--<b-col lg="5" offset-lg="1">
                        <c-switch
                          name="topBanner"
                          :description="$t('labels.admin.campaigns.topBanner')"
                        ></c-switch>
                      </b-col>-->
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
                <b-button
                  to="/campaigns"
                  exact
                  variant="secondary"
                >{{ $t('buttons.admin.common.back') }}</b-button>
              </b-col>
              <b-col md>
                <input name="status" type="hidden" value="publish" />

                <b-button
                  right
                  split
                  class="float-right"
                  variant="success"
                  @click="onSubmitClick"
                  :disabled="buttonState"
                >{{ $t('buttons.admin.common.save') }}</b-button>
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
        altInput: true,
        altFormat: 'd-m-Y',
        dateFormat: 'Y-m-d',
        onChange: function(selectedDates, dateStr, instance) {
          instance.close()
        }
      },
      editorFocus: false,
      counter: 45,
      max: 100,
      modelName: 'campaign',
      resourceRoute: 'campaigns',
      listPath: '/campaigns',
      imageData: '',
      model: {
        name: 'Lorem', // ""
        description: 'Lorem Ipsum', // ''
        picture_url: '',
        active_status: 1,
        target_amount: 10, // 0
        currency: 'BYN',
        start_at: '2020-06-01', // null
        finish_at: '2020-06-05',
        visual_settings: {
          buttons: [5, 10, 25, 50],
          progressBar: true,
          colors: null
        }
      },
      image: {
        thumbnail_image_path: null,
        has_picture_url: false
      },
      images: {
        image: null,
        imageData: null
      },
      hideModalOnSubmit: false
    }
  },
  computed: {
    shortcode() {
      return (
        "<iframe width='750' height='550' frameborder='0' src='/doika/doika/widget/campaigns/" +
        this.id +
        "'></iframe>"
      )
    },
    nameState() {
      return !this.model.name.length
        ? null
        : this.model.name.length > 2 && this.model.name.length < 255
        ? true
        : false
    },
    pictureState() {
      //      return (this.model.picture_url != "") ? true : false
    },
    buttonState() {
      return !(
        this.nameState &&
        this.amountState &&
        this.startAtState &&
        this.finishAtState &&
        this.descriptionState
      )
    },
    descriptionState() {
      return this.model.description ? true : false
    },
    startAtState() {
      return this.model.start_at != null
    },
    finishAtState() {
      return this.model.finish_at != null
    },
    amountState() {
      return !this.model.target_amount
        ? null
        : this.model.target_amount > 0
        ? true
        : false
    },
    pictureName: function() {
      return this.model.picture_url
        ? this.model.picture_url.replace(/^.*[\\\/]/, '')
        : ''
    }
  },
  mounted() {
    if (localStorage.name) {
      this.model.name = localStorage.name
    }
    if (localStorage.description) {
      this.model.description = localStorage.description
    }
    if (localStorage.start_at) {
      this.model.start_at = localStorage.start_at
    }
    if (localStorage.finish_at) {
      this.model.finish_at = localStorage.finish_at
    }
    if (localStorage.target_amount && localStorage.target_amount !== 0) {
      this.model.target_amount = localStorage.target_amount
    }
  },
  methods: {
    onSubmitClick() {
      this.hideModalOnSubmit = true;
      this.onSubmit()
    },
    async getColors() {
      let { data } = await axios.get(
        this.$app.route('dashboard.settings.index'),
        {
          params: {
            keys: [
              'widgetBackground',
              'buttonBackground',
              'progressBarColor',
              'fontColor',
              'termsOfUse'
            ]
          }
        }
      )
      this.model.visual_settings.colors = data.settings
    },
    deleteFeaturedImage() {
      this.$refs.featuredImageInput.reset()
      this.image.thumbnail_image_path = null
      this.image.has_picture_url = false
      this.model.picture_url = ''
      //this.pictureName = []
    },
    previewImage: async function(event) {
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
      let { data } = await axios.post(action, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
      this.model.picture_url = data
    }
  },
  beforeRouteLeave(from, to, next) {
    if (
      (this.model.name ||
        this.model.description ||
        this.model.start_at ||
        this.model.finish_at ||
        this.model.target_amount) &&
      this.hideModalOnSubmit === false
    ) {
      if (window.confirm('Сохранить введённые данные?')) {
        localStorage.name = this.model.name
        localStorage.description = this.model.description
        localStorage.start_at = this.model.start_at
        localStorage.finish_at = this.model.finish_at
        if (this.model.target_amount != 0) {
          localStorage.target_amount = this.model.target_amount
        } else {
          localStorage.removeItem('target_amount')
        }
        next()
      } else {
        localStorage.removeItem('name')
        localStorage.removeItem('description')
        localStorage.removeItem('start_at')
        localStorage.removeItem('finish_at')
        localStorage.removeItem('target_amount')
        next()
      }
    } else {
      localStorage.removeItem('name')
      localStorage.removeItem('description')
      localStorage.removeItem('start_at')
      localStorage.removeItem('finish_at')
      localStorage.removeItem('target_amount')
      next()
    }
  }
}
</script>

<style lang="scss" scoped>
.form-control.is-invalid {
  background-image: none;
}

.form-control.is-valid {
  background: none;
}

.is-valid {
  border-color: #28a745;
  &:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
  }
}

.description-shadow {
  border: 1px solid rgba(0, 40, 100, 0.12);
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out,
    -webkit-box-shadow 0.15s ease-in-out;
  &_is-valid {
    border-color: #28a745;
  }
  &_is-valid-backlight {
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
  }
  &_is-invalid-backlight {
    box-shadow: 0 0 0 2px rgba(246, 109, 155, 0.25);
  }
}

.date-field > .form-group {
  width: 450px;
}
</style>
