<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.admin.payments.title') }}</h3>
      </template>
      <b-datatable ref="datasource"
                   @context-changed="onContextChanged"
                   search-route="admin.payments.search"
                   delete-route="admin.payments.destroy"
                   :selected.sync="selected"
      >
        <b-table ref="datatable"
                 striped
                 bordered
                 show-empty
                 stacked="md"
                 no-local-sorting
                 :empty-text="$t('alerts.admin.common.search.noResult')"
                 :empty-filtered-text="$t('alerts.admin.common.search.noMatchResult')"
                 :fields="fields"
                 :items="dataLoadProvider"
        >

          <template slot="campaign" slot-scope="row">
            <router-link v-if="row.item.can_edit" :to="`/payments/${row.item.id}/edit`" v-text="row.value"></router-link>
            <span v-else v-text="row.value"></span>
          </template>
          <template slot="status" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="backer" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="amount" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="recurrent" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="datetime" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="actions" slot-scope="row">
            <b-button v-if="row.item.can_edit" size="sm" variant="primary" :to="`/payments/${row.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.admin.common.info')" class="mr-1">
              <i class="fe fe-list"></i>
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
          key: 'backer',
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
          key: 'recurrent',
          label: this.$t('labels.admin.payments.recurrent'),
          class: 'text-center'
        },
        {
          key: 'datetime',
          label: this.$t('labels.admin.payments.date'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'actions',
          label: this.$t('labels.admin.datatables.actions'),
          class: 'nowrap'
        }
      ]
    }
  },
  methods: {
    dataLoadProvider(ctx) {
      //return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
      const rec = [
        {
          id: '1',
          campaign: 'First campaign',
          status: 'success',
          backer: 'xxxxxxxxx4567',
          amount: '45',
          recurrent: 'true',
          datetime: '04.11.2018 18:43:05',
          can_edit: true,
          can_delete: true
        }
      ]
      return rec
    },
    onContextChanged() {
      return this.$refs.datatable.refresh()
    },
    onDelete(id) {
      this.$refs.datasource.deleteRow({ payment: id })
    },
    onActiveToggle(id) {
      // axios
      //   .post(this.$app.route('admin.payments.active', { payment: id }))
      //   .catch(error => {
      //     this.$app.error(error)
      //   })
    }
  }
}
</script>
