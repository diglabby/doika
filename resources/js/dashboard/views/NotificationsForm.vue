<template>
  <form @submit.prevent="handleSubmit">
    <div class="form-group">
      <label for="notification-title">{{
        $t('labels.admin.notifications.name')
      }}</label>
      <b-form-input
        v-model="notification.title"
        name="notification-title"
        placeholder="Увядзіце назву паведамлення для атрымальнікаў"
        :class="errorClass('title')"
      ></b-form-input>
      <div v-if="errors['title'][0]" class="invalid-feedback">
        <strong>
          {{ errors['title'][0] }}
        </strong>
      </div>
    </div>
    <div class="form-group">
      <label for="notification-body">{{
        $t('labels.admin.notifications.text')
      }}</label>
      <b-form-textarea
        id="textarea"
        v-model="notification.body"
        placeholder="Смела ўводзьве тэкст..."
        rows="5"
        name="notification-body"
        max-rows="6"
      ></b-form-textarea>
      <div v-if="errors['body'][0]" class="invalid-feedback">
        <strong>
          {{ errors['body'][0] }}
        </strong>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-outline-primary btn-lg">
        {{ buttonText }}
      </button>
    </div>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    notification: {
      type: Object,
      required: true
    },

    isEdit: {
      type: Boolean,
      default: false
    }
  },

  data() {
    return {
      body: '',
      title: '',
      errors: {
        title: [],
        body: []
      }
    };
  },

  computed: {
    buttonText() {
      return this.$t('buttons.admin.notifications.change');
    }
  },

  mounted() {
    //  EventBus.$on('error', errors => this.errors = errors);

    if (this.isEdit) {
      this.fetchQuestion();
    }
  },

  methods: {
    handleSubmit() {
      this.$emit('submitted', {
        title: this.notification.title,
        body: this.notification.body,
        id: this.notification.id
      });
    },

    errorClass(column) {
      return [
        'form-control',
        this.errors[column] && this.errors[column][0] ? 'is-invalid' : ''
      ];
    },

    fetchQuestion() {
      axios
        .get(`/questions/${this.$route.params.id}`)
        .then(({ data }) => {
          this.title = data.title;
          this.body = data.body;
        })
        .catch(error => {
          console.log('123');
          console.log(error.response);
        });
    }
  }
};
</script>
