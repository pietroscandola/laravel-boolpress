<template>
  <div class="container mt-5">
    <Loader v-if="isLoading" />
    <div v-else>
      <h1 class="text-center mb-5">Posts</h1>
      <div v-if="posts.length">
        <Pagination :pagination="pagination" @on-page-change="getPosts" />
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
      </div>
      <h3 class="text-center" v-else>Non sono presenti post</h3>
    </div>
  </div>
</template>

<script>
import Loader from "../Loader.vue";
import Pagination from "../Pagination.vue";
import PostCard from "./PostCard.vue";
export default {
  name: "PostsList",
  components: {
    Loader,
    PostCard,
    Pagination,
  },
  data() {
    return {
      posts: [],
      pagination: {},
      isLoading: false,
    };
  },
  methods: {
    getPosts(page = 1) {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/posts?order=asc&page=" + page)
        .then((res) => {
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.pagination = {
            currentPage: current_page,
            lastPage: last_page,
          };
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