<template>
  <div>
    <div class="card mb-4">
      <!-- <img :src="post.image" class="card-img-top" :alt="post.title" /> -->
      <div class="card-header">{{ updatedAt }}</div>
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <p class="card-text">
          {{ post.content }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
  computed: {
    updatedAt() {
      const postDate = new Date(this.post.updated_at);
      const day = postDate.getDate();
      const month = postDate.getMonth() + 1;
      const year = postDate.getFullYear();

      const hour = postDate.getHours();
      const minute = postDate.getMinutes();
      const second = postDate.getSeconds();

      /* if (day < 10) {
        day = "0" + day;
      }
      if (month < 10) {
        month = "0" + month;
      } */

      return `${day}/${month}/${year} ${hour}:${minute}:${second}`;
    },
  },
};
</script>

<style>
</style>