<template>
  <div>
    <b-row class="justify-content-center">
      <b-col xl="6">
        <b-card>
          <h3 class="card-title" slot="header">
            {{ $t('labels.admin.feedback.header') }}
          </h3>
          <ContactForm></ContactForm>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import axios from 'axios';
import ContactForm from './ContactForm';
export default {
  name: 'Feedback',
  components: {
    ContactForm
  },
  props: {
    id: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      submission: null
    };
  },
  async created() {
    // let { data } = await axios.get(
    //   this.$app.route('admin.feedback.show', {
    //     form_submission: this.id
    //   })
    // )
    // this.submission = data
  }
};
</script>
