<template>
  <h1 class="text-3xl ease-in duration-300">{{ text }}</h1>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      required: true,
    },
  },
};
</script>