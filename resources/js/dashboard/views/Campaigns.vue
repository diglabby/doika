<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.admin.campaigns.header') }}</h3>
        <div class="card-options">
          <b-button to="/campaigns/create" variant="success" size="sm">
            <i class="fe fe-plus-circle"></i> {{ $t('buttons.admin.campaigns.create') }}
          </b-button>
        </div>
      </template>
      <b-datatable ref="datasource"
                   @context-changed="onContextChanged"
                   search-route="dashboard.campaigns.index"
                   delete-route="dashboard.campaigns.delete"
                   action-route="admin.campaigns.batch_action" :actions="actions"
                   :selected.sync="selected"
      >
        <b-table ref="datatable"
                 striped
                 bordered
                 show-empty
                 responsive
                 no-local-sorting
                 :empty-text="$t('alerts.admin.common.search.noResult')"
                 :empty-filtered-text="$t('alerts.admin.common.search.noMatchResult')"
                 :fields="fields"
                 :items="dataLoadProvider"
                 sort-by="campaign.created_at"
                 :sort-desc="true"
        >
          <template slot="HEAD_checkbox" slot-scope="data"></template>
          <template slot="checkbox" slot-scope="row">
            <b-form-checkbox :value="row.item.id" v-model="selected"></b-form-checkbox>
          </template>
          <template slot="title" slot-scope="row">
            <router-link :to="`/campaigns/${row.item.id}/edit`" v-text="row.item.name"></router-link>
          </template>
          <template slot="status" slot-scope="row">
            <c-switch :checked="row.item.active_status" @change="onActiveToggle(row.item.id)"></c-switch>
          </template>
          <template slot="backers" slot-scope="row">
            <span v-text="row.item.transactions_count"></span>
          </template>
          <template slot="recurrent" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="average" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="recieved" slot-scope="row">
            <span v-text="row.item.amount_collected"></span>
          </template>
          <template slot="goal" slot-scope="row">
            <span v-text="row.item.target_amount"></span>
          </template>
          <template slot="days" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="actions" slot-scope="row">
            <b-button size="sm" variant="primary" :to="`/campaigns/${row.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.admin.common.edit')" class="mr-1">
              <i class="fe fe-edit"></i>
            </b-button>
            <b-button size="sm" variant="secondary" v-b-tooltip.hover :title="$t('buttons.admin.common.delete')" @click.stop="onDelete(row.item.id)">
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
  name: 'CampaignsList',
  data() {
    return {
      selected: [],
      fields: [
        { key: 'checkbox' },
        {
          key: 'title',
          label: this.$t('labels.admin.campaigns.name'),
          class: 'text-center'
        },
        {
          key: 'status',
          label: this.$t('labels.admin.campaigns.status'),
          class: 'text-center'
        },
        {
          key: 'backers',
          label: this.$t('labels.admin.campaigns.backers'),
          class: 'text-center'
        },
        {
          key: 'recurrent',
          label: this.$t('labels.admin.campaigns.recurrent'),
          class: 'text-center'
        },
        {
          key: 'average',
          label: this.$t('labels.admin.campaigns.average'),
          class: 'text-center'
        },
        {
          key: 'recieved',
          label: this.$t('labels.admin.campaigns.recieved'),
          class: 'text-center'
        },
        {
          key: 'goal',
          label: this.$t('labels.admin.campaigns.goal'),
          class: 'text-center'
        },
        {
          key: 'days',
          label: this.$t('labels.admin.campaigns.days'),
          class: 'text-center'
        },
        {
          key: 'actions',
          label: this.$t('labels.admin.datatables.actions'),
          class: 'nowrap'
        }
      ],
      actions: {
        destroy: this.$t('buttons.admin.common.removeSelected'),
        enable: this.$t('buttons.admin.common.enableSelected'),
        disable: this.$t('buttons.admin.common.disableSelected')
      }
    }
  },
  methods: {
    dataLoadProvider(ctx) {
        console.log(this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc))
      return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
    },
    onContextChanged() {

      return this.$refs.datatable.refresh()
    },
    onDelete(id) {
      this.$refs.datasource.deleteRow({ id: id })
    },
    onActiveToggle(id) {
      // axios
      //   .post(this.$app.route('admin.campaigns.active', { campaign: id }))
      //   .catch(error => {
      //     this.$app.error(error)
      //   })
    }
  }
}
</script>
