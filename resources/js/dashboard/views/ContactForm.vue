<template>
  <form @submit.prevent="submit">
    <div class="form-group">
      <label for="name">{{ $t('labels.admin.feedback.name') }}</label>
      <input
        type="text"
        class="form-control"
        name="name"
        id="name"
        v-model="fields.name"
        :placeholder="$t('labels.admin.feedback.placeholder.name')"
      />
      <div v-if="errors && errors.name" class="text-danger">
        {{ errors.name[0] }}
      </div>
    </div>

    <div class="form-group">
      <label for="email">{{ $t('labels.admin.feedback.email') }}</label>
      <input
        type="email"
        class="form-control"
        name="email"
        id="email"
        v-model="fields.email"
        :placeholder="$t('labels.admin.feedback.placeholder.email')"
      />
      <div v-if="errors && errors.email" class="text-danger">
        {{ errors.email[0] }}
      </div>
    </div>

    <div class="form-group">
      <label for="message">{{ $t('labels.admin.feedback.message') }}</label>
      <textarea
        class="form-control"
        id="message"
        name="message"
        rows="5"
        v-model="fields.message"
        :placeholder="$t('labels.admin.feedback.placeholder.message')"
      ></textarea>
      <div v-if="errors && errors.message" class="text-danger">
        {{ errors.message[0] }}
      </div>
    </div>

    <button type="submit" class="btn btn-primary">
      {{ $t('buttons.admin.feedback.submit') }}
    </button>

    <div v-if="success" class="alert alert-success mt-3">
      {{ $t('alerts.admin.feedback.success') }}
    </div>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ContactForm',
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true
    };
  },
  methods: {
    submit() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios
          .post(this.$app.route('dashboard.feedback.send'), this.fields)
          .then(response => {
            this.fields = {}; //Clear input fields.
            this.loaded = true;
            this.success = true;
            return response;
          })
          .catch(error => {
            this.loaded = true;
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
            }
          });
      }
    }
  }
};
</script>
