<template>
  <section class="d-flex justify-content-center align-items-center flex-column">
    <h1 class="text-muted">404 | Not Found</h1>
    <button class="btn btn-primary" @click="$router.back()">Indietro</button>
  </section>
</template>

<script>
export default {
  name: "NotFoundPage",
};
</script>

<style>
</style>