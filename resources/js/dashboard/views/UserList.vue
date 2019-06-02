<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.admin.users.header') }}</h3>
        <div class="card-options" v-if="this.$app.user.can('create users')">
          <b-button to="/users/create" variant="success" size="sm">
            <i class="fe fe-plus-circle"></i> {{ $t('buttons.admin.users.create') }}
          </b-button>
        </div>
      </template>
      <b-datatable ref="datasource"
                   @context-changed="onContextChanged"
                   search-route="dashboard.admins.index"
                   delete-route="dashboard.admins.destroy"
                   action-route="dashboard.admins.batch_action" :actions="actions"
                   :selected.sync="selected"
      >
        <b-table ref="datatable"
                 striped
                 bordered
                 show-empty
                 stacked="md"
                 no-local-sorting
                 :empty-text="$t('alerts.admin.common.search.noResult')"
                 :empty-filtered-text="$t('alerts.admin.common.search.noResult')"
                 :fields="fields"
                 :items="dataLoadProvider"
        >
          <template slot="HEAD_checkbox" slot-scope="data"></template>
          <template slot="checkbox" slot-scope="row">
            <b-form-checkbox :value="row.item.id" v-model="selected"></b-form-checkbox>
          </template>
          <template slot="name" slot-scope="row">
            <router-link :to="`/users/${row.item.id}/edit`" v-text="row.value"></router-link>
          </template>
          <template slot="active" slot-scope="row">
            <c-switch :checked="row.value" @change="onActiveToggle(row.item.id)"></c-switch>
          </template>
          <template slot="created_at" slot-scope="row">
            <span v-text="new Date(row.item.created_at * 1000).toLocaleDateString('ru-RU')"></span>
          </template>
          <template slot="actions" slot-scope="row">
            <b-button size="sm" variant="primary" :to="`/users/${row.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.admin.common.edit')" class="mr-1">
              <i class="fe fe-edit"></i>
            </b-button>          
          </template>
          <template slot="table-busy">
            <div class="text-center">
              <b-spinner label="Loading..."></b-spinner>
            </div>
          </template>
        </b-table>
      </b-datatable>
    </b-card>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'UserList',
  data() {
    return {
      selected: [],
      fields: [
        {
          key: 'name',
          label: this.$t('labels.admin.users.name'),
          sortable: true
        },
        {
          key: 'email',
          label: this.$t('labels.admin.users.email'),
          sortable: true
        },
        {
          key: 'active',
          label: this.$t('labels.admin.users.active'),
          class: 'text-center'
        },
        {
          key: 'created_at',
          label: this.$t('labels.admin.users.createdAt'),
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
      return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
    },
    onContextChanged() {
      return this.$refs.datatable.refresh()
    },
    onDelete(id) {
      this.$refs.datasource.deleteRow({ user: id })
    },
    onActiveToggle(id) {
      axios
        .post(this.$app.route('admin.users.active', { user: id }))
        .catch(error => {
          this.$app.error(error)
        })
    }
  }
}
</script>
