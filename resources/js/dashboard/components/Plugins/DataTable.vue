<template>
  <div>
    <slot></slot>
    <b-row>
      <b-col md="12">
        <b-pagination
          :total-rows="totalRows"
          :per-page="perPage"
          v-model="currentPage"
          v-if="paging && totalRows > perPage"
          class="justify-content-center"
          @input="onContextChanged"
        ></b-pagination>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import axios from 'axios';
import _ from 'lodash';

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
      busy: false,
      currentPage: 1,
      perPage: 10,
      totalRows: 0,
      pageOptions: [5, 10, 15, 25, 50],
      searchQuery: null,
      action: null,
      isBusy: false
    };
  },
  watch: {
    actions: {
      handler() {
        if (this.actions) {
          this.action = Object.keys(this.actions)[0];
        }
      },
      immediate: true
    }
  },
  methods: {
    debounceInput: _.debounce(function() {
      this.onContextChanged();
    }, 200),
    onContextChanged() {
      this.$emit('context-changed');
    },
    async loadData() {
      try {
        this.isBusy = true;

        let { data } = await axios.get(this.$app.route(this.searchRoute), {
          params: {
            page: this.currentPage,
            perPage: this.perPage
          }
        });

        this.busy = false;
        this.totalRows = data.meta.total;
        this.perPage = data.meta.per_page;

        return data.data;
      } catch (e) {
        console.log(e);
        this.$app.error(e);
        return [];
      }
    },
    onExportData() {
      window.location = this.$app.route(this.searchRoute, {
        search: this.searchQuery,
        exportData: true
      });
    },
    async deleteRow(params) {
      window
        .swal({
          title: this.$t('labels.admin.common.confirmation'),
          text: this.$t('labels.admin.notifications.caution'),
          icon: 'warning',
          buttons: [
            this.$t('buttons.admin.common.cancellation'),
            this.$t('buttons.admin.campaigns.delete')
          ]
        })
        .then(test => {
          //  console.log(this.$app.route(this.deleteRoute));
          axios
            .delete(`/doika/doika/dashboard/api/campaigns/${params}`)
            .then(({ data }) => {
              this.onContextChanged();
            })
            .catch(e => {
              this.$app.error(e);
            });
        });
    },

    async onBulkAction() {
      let result = await window.swal({
        title: this.$t('labels.are_you_sure'),
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: this.$t('buttons.cancel'),
        confirmButtonColor: '#f66d9b',
        confirmButtonText: this.$t('buttons.confirm')
      });

      if (result.value) {
        try {
          let { data } = await axios.post(this.$app.route(this.actionRoute), {
            action: this.action,
            ids: this.selected
          });

          this.onContextChanged();
          this.$emit('update:selected', []);
          this.$app.noty[data.status](data.message);
        } catch (e) {
          this.$app.error(e);
        }
      }
    }
  }
};
</script>
