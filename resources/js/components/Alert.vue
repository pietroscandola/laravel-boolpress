<template>
  <div :class="`alert alert-${type || 'info'}`" role="alert">
    <slot></slot>
    <div class="d-flex justify-content-between align-items-center">
      <div>{{ message }}</div>
      <span v-if="dismissable" role="button" click="$emit('on-close')">
        &times;
      </span>
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