<template>
  <div>
    <b-row>      
      <b-col xl="12" v-if="this.$app.user.can('view own posts')">
        <b-card>
          <h3 class="card-title" slot="header">{{ $t('labels.backend.dashboard.last_posts') }}</h3>
          <b-table striped bordered hover show-empty :fields="post_fields" :items="posts"
                   :empty-text="$t('labels.no_results')"
          >
            <template slot="title" slot-scope="row">
              <router-link :to="`/posts/${row.item.id}/edit`">
                {{ row.value }}
              </router-link>
            </template>
            <template slot="status" slot-scope="row">
              <b-badge :variant="row.item.state">{{ $t(row.item.status_label) }}</b-badge>
            </template>
            <template slot="pinned" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
          </b-table>
          <b-button to="/posts" variant="primary" class="float-right">
            {{ $t('labels.backend.dashboard.all_posts') }}
          </b-button>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Dashboard',
  data() {
    return {
      post_fields: {
        title: { label: this.$t('validation.attributes.title') },
        status: { label: this.$t('validation.attributes.status') },
        pinned: { label: this.$t('validation.attributes.pinned') },
        summary: { label: this.$t('validation.attributes.summary') },
        published_at: {
          label: this.$t('validation.attributes.published_at'),
          class: 'text-center'
        }
      },
      posts: []
    }
  },
  async created() {
    if (this.$app.user.can('view own posts')) {
      let { data } = await axios.get(this.$app.route('admin.posts.latest'))
      this.posts = data
    }
  }
}
</script>
