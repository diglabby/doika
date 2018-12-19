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
              <b-collapse id="layout" role="tabpanel">
                <b-card-body>
                </b-card-body>
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
  name: 'Layout',
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
