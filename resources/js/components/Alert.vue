<template>
  <div :class="`alert alert-${type || 'info'}`" role="alert">
    <slot></slot>
    <div class="d-flex justify-content-end align-items-center">
      <span>{{ message }}</span>
      <span role="button" @click="$emit('on-close')">&times;</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Alert",
  props: ["message", "type", "dismissable"],
};
</script>

<style>
</style>