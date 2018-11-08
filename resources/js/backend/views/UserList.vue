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
                   search-route="admin.users.search"
                   delete-route="admin.users.destroy"
                   action-route="admin.users.batch_action" :actions="actions"
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
            <router-link v-if="row.item.can_edit" :to="`/users/${row.item.id}/edit`" v-text="row.value"></router-link>
            <span v-else v-text="row.value"></span>
          </template>
          <template slot="active" slot-scope="row">
            <c-switch v-if="row.item.can_edit" :checked="row.value" @change="onActiveToggle(row.item.id)"></c-switch>
          </template>
          <template slot="actions" slot-scope="row">
            <b-button v-if="row.item.can_edit" size="sm" variant="primary" :to="`/users/${row.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.admin.common.edit')" class="mr-1">
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
  name: 'UserList',
  data() {
    return {
      selected: [],
      fields: [
        { key: 'checkbox' },
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
          key: 'updated_at',
          label: this.$t('labels.admin.users.updatedAt'),
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
    },
    formatRoles(roles) {
      return roles
        .map(key => {
          return key.display_name
        })
        .join(', ')
    }
  }
}
</script>
