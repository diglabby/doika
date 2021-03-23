import axios from 'axios';

export default {
  props: ['id'],
  data() {
    return {
      validation: {},
      isLoading: false
    };
  },
  computed: {
    isNew() {
      return this.id === undefined;
    }
  },
  methods: {
    async fetchData() {
      this.isLoading = true;

      if (!this.isNew) {
        this.modelName = 'id';
        let { data } = await axios.get(
          this.$app.route(`dashboard.${this.resourceRoute}.show`, {
            [this.modelName]: this.id
          })
        );

        Object.keys(data.data).forEach(key => {
          if (key in this.model) {
            this.model[key] = data.data[key];
          }
        });

        this.onModelChanged();
      }
    },
    onModelChanged() {},
    feedback(name) {
      if (this.state(name)) {
        return this.validation.errors[name][0];
      }
    },
    state(name) {
      return this.validation.errors !== undefined &&
        this.validation.errors.hasOwnProperty(name)
        ? 'invalid'
        : null;
    },
    async onSubmit() {
      this.isLoading = true;
      let router = this.$router;
      let action = this.isNew
        ? this.$app.route(`dashboard.${this.resourceRoute}.store`)
        : this.$app.route(`dashboard.${this.resourceRoute}.update`, {
            [this.modelName]: this.id
          });

      let formData = this.$app.objectToFormData(this.model);

      if (!this.isNew) {
        formData.append('_method', 'PUT');
      }

      try {
        let { data } = await axios.post(action, formData);
        this.isLoading = false;

	      window.swal(this.$t('alerts.admin.forms.success'), this.$t('alerts.admin.forms.data_written'), 'success', {
          timer: 2000,
          buttons: false
        });

        //this.$app.noty[data.status](data.message)
        if (this.listPath) {
          router.push(this.listPath);
        }
      } catch (e) {
        this.isLoading = false;

        if (e.response.status === 422) {
          this.validation = e.response.data;
          return;
        }

        this.$app.error(e);
      }
    }
  },
  created() {
    this.fetchData();
  }
};
