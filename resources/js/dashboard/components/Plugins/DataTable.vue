<template>
  <div>
    <slot></slot>    
  </div>
</template>

<script>
import axios from 'axios'
import _ from 'lodash'

export default {
  props: {
    lengthChange: {
      type: Boolean,
      default: true
    },
    paging: {
      type: Boolean,
      default: true
    },
    infos: {
      type: Boolean,
      default: true
    },
    search: {
      type: Boolean,
      default: true
    },
    exportData: {
      type: Boolean,
      default: true
    },
    searchRoute: {
      type: String,
      default: null
    },
    deleteRoute: {
      type: String,
      default: null
    },
    actionRoute: {
      type: String,
      default: null
    },
    actions: {
      type: Object,
      default: () => {}
    },
    selected: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      currentPage: 1,
      perPage: 100,
      totalRows: 0,
      pageOptions: [5, 10, 15, 25, 50],
      searchQuery: null,
      action: null
    }
  },
  watch: {
    actions: {
      handler() {
        if (this.actions) {
          this.action = Object.keys(this.actions)[0]
        }
      },
      immediate: true
    }
  },
  methods: {
    debounceInput: _.debounce(function() {
      this.onContextChanged()
    }, 200),
    onContextChanged() {
      this.$emit('context-changed')
    },
    async loadData(sortBy, sortDesc) {
      try {

        let { data } = await axios.get(this.$app.route(this.searchRoute))
        console.log(data.data)



        return data.data
      } catch (e) {
          console.log(e)
        this.$app.error(e)
        return []
      }
    },
    onExportData() {
      window.location = this.$app.route(this.searchRoute, {
        search: this.searchQuery,
        exportData: true
      })
    },
    async deleteRow(params) {
      let result = await window.swal({
        title: this.$t('labels.admin.common.confirmation'),
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: this.$t('buttons.admin.common.cancel'),
        confirmButtonColor: '#dd4b39',
        confirmButtonText: this.$t('buttons.admin.common.delete')
      })

      if (result.value) {
        try {
          let { data } = await axios.delete(
            this.$app.route(this.deleteRoute, params)
          )
          this.onContextChanged()
          this.$app.noty[data.status](data.message)
        } catch (e) {
          this.$app.error(e)
        }
      }
    },
    async onBulkAction() {
      let result = await window.swal({
        title: this.$t('labels.are_you_sure'),
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: this.$t('buttons.cancel'),
        confirmButtonColor: '#f66d9b',
        confirmButtonText: this.$t('buttons.confirm')
      })

      if (result.value) {
        try {
          let { data } = await axios.post(this.$app.route(this.actionRoute), {
            action: this.action,
            ids: this.selected
          })

          this.onContextChanged()
          this.$emit('update:selected', [])
          this.$app.noty[data.status](data.message)
        } catch (e) {
          this.$app.error(e)
        }
      }
    }
  }
}
</script>
