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
          <template v-slot:cell(title)="data">
            <router-link :to="`/campaigns/${data.item.id}/edit`" v-text="data.item.name"></router-link>
          </template>

          <template v-slot:cell(status)="data">
            <c-switch :checked="data.item.active_status" @change="onActiveToggle(data.item.id)"></c-switch>
          </template>

          <template v-slot:cell(backers)="data">
            <span v-text="data.item.transactions_count"></span>
          </template>

          <template v-slot:cell(recurrent)="data">
            <span v-text="data.value"></span>
          </template>

          <template v-slot:cell(average)="data">
            <span v-text="average(data.item.transactions_count, data.item.amount_collected)"></span>
          </template>

          <template v-slot:cell(received)="data">
            <span v-text="`${(data.item.amount_collected/100).toFixed(2)}/${(data.item.target_amount/100).toFixed(2)}`"></span>
          </template>

          <template v-slot:cell(days)="data">
            <span v-text="(moment(data.item.finish_at).fromNow())"></span>
          </template>

          <template v-slot:cell(actions)="data">
            <b-button size="sm" variant="primary" :to="`/campaigns/${data.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.admin.common.edit')" class="mr-1">
              <i class="fe fe-edit"></i>
            </b-button>
            <b-button size="sm" variant="secondary" v-b-tooltip.hover :title="$t('buttons.admin.common.delete')" @click.stop="onDelete(data.item.id)">
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
        {
          key: 'title',
          label: this.$t('labels.admin.campaigns.name'),
          class: 'text-left'
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
          key: 'received',
          label: this.$t('labels.admin.campaigns.received'),
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
  computed: {

  },
  methods: {
    dataLoadProvider(ctx) {
      let data = this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
      return data
    },

    average(count, summ) {
        let result = (summ / count / 100).toFixed(2);
        if(!isNaN(result)) return result;
        else return 0;
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
