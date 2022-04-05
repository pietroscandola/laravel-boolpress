<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li
        class="page-item"
        role="button"
        v-if="pagination.currentPage > 1"
        @click="$emit('on-page-change', pagination.currentPage - 1)"
      >
        <span class="page-link">Previous</span>
      </li>
      <li
        v-for="page in pagination.lastPage"
        :key="page"
        role="button"
        class="page-item"
        :class="{ active: page === pagination.currentPage }"
        @click="$emit('on-page-change', page)"
      >
        <a class="page-link" href="#">{{ page }}</a>
      </li>

      <li
        class="page-item"
        role="button"
        v-if="pagination.lastPage > pagination.currentPage"
        @click="$emit('on-page-change', pagination.currentPage + 1)"
      >
        <span class="page-link">Next</span>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "Pagination",
  props: ["pagination"],
  methods: {},
};
</script>

<style>
</style>