<template>
  <div>
    <div class="card mb-4">
      <img
        v-if="post.image"
        :src="post.image"
        class="card-img-top"
        :alt="post.title"
      />
      <div
        class="card-header d-flex justify-content-between align-items-center"
      >
        <div>
          {{ updatedAt }}
        </div>
        <div>
          <router-link
            v-if="!hideLink"
            class="btn btn-success"
            :to="{ name: 'post-detail', params: { id: post.id } }"
            >Vedi</router-link
          >
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <p class="card-text">
          {{ post.content }}
        </p>
      </div>
      <div class="card-footer">
        <span :class="`badge badge-pill badge-${post.category.color}`">
          {{ post.category.label }}
        </span>
        <div>
          <span
            v-for="tag in post.tags"
            :key="tag.id"
            class="badge badge-pill"
            :style="`background-color: ${tag.color}`"
          >
            {{ tag.label }}
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post", "hide-link"],
  computed: {
    updatedAt() {
      const postDate = new Date(this.post.updated_at);
      let day = postDate.getDate();
      let month = postDate.getMonth() + 1;
      const year = postDate.getFullYear();

      const hour = postDate.getHours();
      const minute = postDate.getMinutes();
      const second = postDate.getSeconds();

      if (day < 10) {
        day = "0" + day;
      }
      if (month < 10) {
        month = "0" + month;
      }

      return `${day}/${month}/${year} ${hour}:${minute}:${second}`;
    },
  },
};
</script>

<style>
</style>