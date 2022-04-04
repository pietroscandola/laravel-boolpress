<template>
  <div class="container mt-5">
    <Loader v-if="isLoading" />
    <div v-else>
      <h1 class="text-center mb-5">Posts</h1>
      <div v-if="posts.length">
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
      </div>
      <h3 class="text-center" v-else>Non sono presenti post</h3>
    </div>
  </div>
</template>

<script>
import Loader from "../Loader.vue";
import PostCard from "./PostCard.vue";
export default {
  name: "PostsList",
  components: {
    Loader,
    PostCard,
  },
  data() {
    return {
      posts: [],
      isLoading: false,
    };
  },
  methods: {
    getPosts() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/posts")
        .then((res) => {
          this.posts = res.data;
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
          console.log("chiamata terminata");
        });
    },
  },
  mounted() {
    this.getPosts();
  },
};
</script>

<style>
</style>