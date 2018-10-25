<template>
  <div>
    <b-row>
      <b-col xl="12" v-if="this.$app.user.can('view own posts')">
        <b-card>
          <h3 class="card-title" slot="header">{{ $t('labels.backend.dashboard.last_posts') }}</h3>
          <b-table striped bordered hover show-empty :fields="post_fields" :items="posts"
                   :empty-text="$t('labels.no_results')"
          >
            <template slot="title" slot-scope="row">
              <router-link :to="`/posts/${row.item.id}/edit`">
                {{ row.value }}
              </router-link>
            </template>
            <template slot="status" slot-scope="row">
              <b-badge :variant="row.item.state">{{ $t(row.item.status_label) }}</b-badge>
            </template>
            <template slot="pinned" slot-scope="row">
              <b-badge :variant="row.value ? 'success' : 'danger'">{{ row.value ? $t('labels.yes') : $t('labels.no') }}
              </b-badge>
            </template>
          </b-table>
          <b-button to="/posts" variant="primary" class="float-right">
            {{ $t('labels.backend.dashboard.all_posts') }}
          </b-button>
        </b-card>
      </b-col>
    </b-row>
    <div class="module-donate__wrapper">
      <div class="module-donate__image">
        <img class="mainImage" src="assets/img/noimage.png" alt="doika image">
        <div class="blurredImage"></div>
      </div>
      <div class="module-donate__main-panel">
        <div class="module-donate__input">
          <button class="module-donate__button-select" data-sum="5">5 руб.</button>
          <button class="module-donate__button-select" data-sum="10">10 руб.</button>
          <button class="module-donate__button-select" data-sum="15">15 руб.</button>
          <button class="module-donate__button-select" data-sum="20">20 руб.</button>
          <button class="module-donate__button-select" data-sum="50">50 руб.</button>
          <button class="module-donate__button-select" data-sum="100">100 руб.</button>
          <input type="number" class="module-donate__text-input" placeholder="">
          <button class="module-donate__button-confirm"></button>
          <p class="module-donate__warning"></p>
        </div>
      </div>
      <div class="module-donate__description-wrapper">
        <p class="module-donate__description">
        </p>
      </div>
    </div>
    <div class="module-donate__progress-bar">
      <div class="progress-bar__track">
      </div>
      <div class="progress-bar__pointer">
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'MainWindow',
  data() {
    return {
      post_fields: {
        title: { label: this.$t('validation.attributes.title') },
        status: { label: this.$t('validation.attributes.status') },
        pinned: { label: this.$t('validation.attributes.pinned') },
        summary: { label: this.$t('validation.attributes.summary') },
        published_at: {
          label: this.$t('validation.attributes.published_at'),
          class: 'text-center'
        }
      },
      posts: []
    }
  },
  async created() {
    if (this.$app.user.can('view own posts')) {
      let { data } = await axios.get(this.$app.route('admin.posts.latest'))
      this.posts = data
    }
  }
}
</script>
