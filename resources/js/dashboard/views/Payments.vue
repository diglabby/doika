<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.admin.payments.title') }}</h3>
      </template>
      <b-datatable ref="datasource"
                   @context-changed="onContextChanged"
                   search-route="dashboard.transactions.index"
                   :selected.sync="selected"
      >
        <b-table ref="datatable"
                 striped
                 bordered
                 show-empty
                 stacked="md"
                 no-local-sorting
                 :empty-text="$t('alerts.dashboard.common.search.noResult')"
                 :empty-filtered-text="$t('alerts.dashboard.common.search.noMatchResult')"
                 :fields="fields"
                 :items="dataLoadProvider"
        >

          <template slot="campaign" slot-scope="row">
            <router-link :to="`/transactions/${row.item.id}/edit`" v-text="row.item.campaign_id"></router-link>
          </template>
          <template slot="status" slot-scope="row">
            <span v-text="row.item.status"></span>
          </template>
          <template slot="donator" slot-scope="row">
            <span v-text="row.item.donator"></span>
          </template>
          <template slot="amount" slot-scope="row">
            <span v-text="row.item.amount"></span>
          </template>
          <template slot="currency" slot-scope="row">
            <span v-text="row.item.currency"></span>
          </template>
          <template slot="created_at" slot-scope="row">
            <span v-text="row.item.created_at"></span>
          </template>
        </b-table>
      </b-datatable>
    </b-card>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'PaymentsList',
  data() {
    return {
      selected: [],
      fields: [
        {
          key: 'campaign',
          label: this.$t('labels.admin.payments.campaign'),
          sortable: true
        },
        {
          key: 'status',
          label: this.$t('labels.admin.payments.status'),
          sortable: true
        },
        {
          key: 'donator',
          label: this.$t('labels.admin.payments.backer'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'amount',
          label: this.$t('labels.admin.payments.amount'),
          class: 'text-center'
        },
        {
          key: 'currency',
          label: this.$t('labels.admin.payments.currency'),
          class: 'text-center'
        },
        {
          key: 'created_at',
          label: this.$t('labels.admin.payments.created_at'),
          class: 'text-center',
          sortable: true
        }
      ]
    }
  },
  methods: {
    dataLoadProvider(ctx) {
        console.log(this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc))
      return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
    },
    onContextChanged() {
      return this.$refs.datatable.refresh()
    }
  }
}
</script>
