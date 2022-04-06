<template>
  <div :class="`alert aler-${type} || 'info'`" role="alert">{{ message }}</div>
</template>

<script>
export default {
  name: "Alert",
  props: ["message", "type"],
};
</script>

<style>
</style>