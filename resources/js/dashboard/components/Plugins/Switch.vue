<template>
  <label class="custom-switch">
    <input
      type="checkbox"
      :name="name"
      class="custom-switch-input"
      @change="handleChange"
    >
    <span class="custom-switch-indicator"></span>
    <span class="custom-switch-description" v-if="description">{{
      description
    }}</span>
  </label>
</template>

<script>
export default {
  model: {
    event: 'change'
  },
  props: {
    uncheckedValue: {
      type: Boolean,
      default: false
    },
    checked: {
      type: Boolean,
      default: false
    },
    name: {
      type: String,
      default: null
    },
    description: {
      type: String,
      default: null
    }
  },
  computed: {},
  methods: {
    handleChange({ target: { checked } }) {}
  }
};
</script>
