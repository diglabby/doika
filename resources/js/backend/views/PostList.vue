<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.backend.campaigns.titles.index') }}</h3>
        <div class="card-options" v-if="this.$app.user.can('create posts')">
          <b-button to="/posts/create" variant="success" size="sm">
            <i class="fe fe-plus-circle"></i> {{ $t('buttons.campaigns.create') }}
          </b-button>
        </div>
      </template>
      <b-datatable ref="datasource"
                   @context-changed="onContextChanged"
                  
      >
        <b-table ref="datatable"
                 striped
                 bordered
                 show-empty
                 stacked="md"
                 no-local-sorting
                 :empty-text="$t('labels.datatables.no_results')"
                 :empty-filtered-text="$t('labels.datatables.no_matched_results')"
                 :fields="fields"
                 :items="dataLoadProvider"
                 sort-by="campaigns.created_at"
                 :sort-desc="true"
        >
          <template slot="HEAD_checkbox" slot-scope="data"></template>
          <template slot="checkbox" slot-scope="row">
            <b-form-checkbox :value="row.item.id" v-model="selected"></b-form-checkbox>
          </template>
          <template slot="title" slot-scope="row">
            <router-link v-if="row.item.can_edit" :to="`/posts/${row.item.id}/edit`" v-text="row.value"></router-link>
            <span v-else v-text="row.value"></span>
          </template>
          <template slot="status" slot-scope="row">
            <b-badge :variant="row.item.state">{{ $t(row.item.status_label) }}</b-badge>
          </template>
          <template slot="backers" slot-scope="row">
            <c-switch v-if="row.item.can_edit" :checked="row.value" @change="onPinToggle(row.item.id)"></c-switch>
          </template>
          <template slot="recurrent" slot-scope="row">
            <c-switch v-if="row.item.can_edit" :checked="row.value" @change="onPromoteToggle(row.item.id)"></c-switch>
          </template>
          <template slot="average" slot-scope="row">
            <span v-if="row.item.owner">{{ row.item.owner.name }}</span>
            <span v-else>{{ $t('labels.anonymous') }}</span>
          </template>
          <template slot="received" slot-scope="row">
            <span v-if="row.item.owner">{{ row.item.owner.name }}</span>
            <span v-else>{{ $t('labels.anonymous') }}</span>
          </template>
          <template slot="goal" slot-scope="row">
            <span v-if="row.item.owner">{{ row.item.owner.name }}</span>
            <span v-else>{{ $t('labels.anonymous') }}</span>
          </template>
          <template slot="days" slot-scope="row">
            <span v-if="row.item.owner">{{ row.item.owner.name }}</span>
            <span v-else>{{ $t('labels.anonymous') }}</span>
          </template>
          <template slot="campaigns.created_at" slot-scope="row">
            {{ row.item.created_at }}
          </template>
          <template slot="campaigns.updated_at" slot-scope="row">
            {{ row.item.updated_at }}
          </template>
          <template slot="actions" slot-scope="row">
            <b-button size="sm" variant="success" :href="$app.route('blog.show', { post: row.item.slug})" target="_blank" v-b-tooltip.hover :title="$t('buttons.preview')" class="mr-1">
              <i class="fe fe-eye"></i>
            </b-button>
            <b-button v-if="row.item.can_edit" size="sm" variant="primary" :to="`/posts/${row.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.edit')" class="mr-1">
              <i class="fe fe-edit"></i>
            </b-button>
            <b-button v-if="row.item.can_delete" size="sm" variant="danger" v-b-tooltip.hover :title="$t('buttons.delete')" @click.stop="onDelete(row.item.id)">
              <i class="fe fe-trash"></i>
            </b-button>
          </template>
        </b-table>
      </b-datatable>
    </b-card>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'CampaignList',
  data() {
    return {
      selected: [],
      fields: [
        { key: 'checkbox' },
        {
          key: 'title',
          label: this.$t('validation.attributes.title'),
          sortable: true
        },
        {
          key: 'status',
          label: this.$t('validation.attributes.status'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'backers',
          label: this.$t('validation.attributes.backers'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'recurrent',
          label: this.$t('validation.attributes.recurrent'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'average',
          label: this.$t('validation.attributes.average'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'recieved',
          label: this.$t('validation.attributes.recieved'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'goal',
          label: this.$t('validation.attributes.goal'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'days',
          label: this.$t('validation.attributes.days'),
          class: 'text-center',
          sortable: true
        },
        { key: 'actions', label: this.$t('labels.actions'), class: 'nowrap' }
      ],
      actions: {
        destroy: this.$t('labels.backend.campaigns.actions.destroy'),
        publish: this.$t('labels.backend.campaigns.actions.publish'),
        pin: this.$t('labels.backend.campaigns.actions.pin'),
        promote: this.$t('labels.backend.campaigns.actions.promote')
      }
    }
  },
  methods: {
    dataLoadProvider(ctx) {
      return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
    },
    onContextChanged() {
      return this.$refs.datatable.refresh()
    },
    onDelete(id) {
      this.$refs.datasource.deleteRow({ post: id })
    },
    onPinToggle(id) {
      axios
        .post(this.$app.route('admin.posts.pinned', { post: id }))
        .catch(error => {
          this.$app.error(error)
        })
    },
    onPromoteToggle(id) {
      axios
        .post(this.$app.route('admin.campaigns.promoted', { post: id }))
        .catch(error => {
          this.$app.error(error)
        })
    }
  }
}
</script>
