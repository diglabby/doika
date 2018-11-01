<template>
  <div>
    <b-row>
      <b-col xl="12" v-if="this.$app.user.can('view own posts')">
        <b-card>
          <h3 class="card-title" slot="header">{{ $t('labels.backend.campaigns.list') }}</h3>
          <b-table striped bordered hover show-empty :fields="list_fields" :items="posts"
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
            <template slot="backers" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
            <template slot="recurrent" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
            <template slot="average" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
            <template slot="received" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
            <template slot="goal" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
            <template slot="days" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
          </b-table>

        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Campaigns',
  data() {
    return {
      list_fields: {
        title: { label: this.$t('validation.attributes.title') },
        status: { label: this.$t('validation.attributes.status') },
        backers: { label: this.$t('validation.attributes.backers') },
        recurrent: { label: this.$t('validation.attributes.recurrent') },
        average: { label: this.$t('validation.attributes.average') },
        recieved: { label: this.$t('validation.attributes.recieved') },
        goal: { label: this.$t('validation.attributes.goal') },
        days: { label: this.$t('validation.attributes.days') }
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
