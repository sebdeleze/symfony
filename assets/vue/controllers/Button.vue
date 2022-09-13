<template>
  <a
    :href="link"
    :class="'btn btn' + this.outlineClass + '-' + type"
    @click="loading"
    >{{ textValue }}</a
  >
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "primary",
    },
    outline: {
      type: Boolean,
      default: false,
    },
    text: {
      type: String,
      required: true,
    },
    link: {
      type: String,
    },
  },
  data() {
    return {
      textValue: this.text,
    };
  },
  computed: {
    outlineClass() {
      return this.outline ? "-outline" : "";
    },
  },
  methods: {
    loading() {
      this.textValue = "Loading...";
    },
  },
};
</script>