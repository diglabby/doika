import axios from 'axios';

export default {
  props: {
    id: {
      type: String,
      default: null
    }
  },

  data() {
    return {
      validation: {},
      isLoading: true
    };
  },

  methods: {
    async fetchData() {
      this.isLoading = true;
      let { data } = await axios.get(
        this.$app.route(`widget.${this.resourceRoute}.show`, {
          [this.modelName]: this.$route.params.id
        })
      );

      Object.keys(data.data).forEach(key => {
        if (key in this.model) {
          this.model[key] = data.data[key];
        }
      });
      this.onModelChanged();
      this.isBusy = false;
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
        ? this.$app.route(`admin.${this.resourceRoute}.store`)
        : this.$app.route(`admin.${this.resourceRoute}.update`, {
            [this.modelName]: this.id
          });

      let formData = this.$app.objectToFormData(this.model);

      if (!this.isNew) {
        formData.append('_method', 'PATCH');
      }

      try {
        let { data } = await axios.post(action, formData);
        this.isBusy = false;

        this.$app.noty[data.status](data.message);
        if (this.listPath) {
          router.push(this.listPath);
        }
      } catch (e) {
        this.isBusy = false;

        // Validation errors
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
