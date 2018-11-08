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
                   search-route="admin.campaigns.search"
                   delete-route="admin.campaigns.destroy"
                   action-route="admin.campaigns.batch_action" :actions="actions"
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
          <template slot="HEAD_checkbox" slot-scope="data"></template>
          <template slot="checkbox" slot-scope="row">
            <b-form-checkbox :value="row.item.id" v-model="selected"></b-form-checkbox>
          </template>
          <template slot="title" slot-scope="row">
            <router-link v-if="row.item.can_edit" :to="`/campaigns/${row.item.id}/edit`" v-text="row.value"></router-link>
            <span v-else v-text="row.value"></span>
          </template>
          <template slot="status" slot-scope="row">
            <c-switch v-if="row.item.can_edit" :checked="row.value" @change="onActiveToggle(row.item.id)"></c-switch>
            <span v-else v-text="row.value"></span>
          </template>
          <template slot="backers" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="recurrent" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="average" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="recieved" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="goal" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="days" slot-scope="row">
            <span v-text="row.value"></span>
          </template>
          <template slot="actions" slot-scope="row">
            <b-button v-if="row.item.can_edit" size="sm" variant="primary" :to="`/campaigns/${row.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.admin.common.edit')" class="mr-1">
              <i class="fe fe-edit"></i>
            </b-button>
            <b-button v-if="row.item.can_delete" size="sm" variant="danger" v-b-tooltip.hover :title="$t('buttons.admin.common.delete')" @click.stop="onDelete(row.item.id)">
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
          sortable: true
        },
        {
          key: 'status',
          label: this.$t('labels.admin.campaigns.status'),
          sortable: true
        },
        {
          key: 'backers',
          label: this.$t('labels.admin.campaigns.backers'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'recurrent',
          label: this.$t('labels.admin.campaigns.recurrent'),
          class: 'text-center'
        },
        {
          key: 'average',
          label: this.$t('labels.admin.campaigns.average'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'recieved',
          label: this.$t('labels.admin.campaigns.recieved'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'goal',
          label: this.$t('labels.admin.campaigns.goal'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'days',
          label: this.$t('labels.admin.campaigns.days'),
          class: 'text-center',
          sortable: true
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
      //return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
      const rec = [
        {
          id: '1',
          title: 'First campaign',
          status: true,
          backers: 10,
          recurrent: true,
          average: 15,
          recieved: 15,
          goal: 40,
          days: '12',
          can_edit: true,
          can_delete: true
        },
        {
          id: '2',
          title: 'Second campaign',
          status: false,
          backers: 10,
          recurrent: false,
          average: 15,
          recieved: 15,
          goal: 40,
          days: '12',
          can_edit: true,
          can_delete: true
        },
        {
          id: '3',
          title: 'Third campaign',
          status: true,
          backers: 10,
          recurrent: true,
          average: 15,
          recieved: 15,
          goal: 40,
          days: '12',
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
      this.$refs.datasource.deleteRow({ campaign: id })
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
