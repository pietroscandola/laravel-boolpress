<template>
  <div class="container mt-5">
    <div v-if="posts.length">
      <div v-for="post in posts" :key="post.id" class="card">
        <!-- <img src="" class="card-img-top" alt="" /> -->
        <div class="card-body">
          <h5 class="card-title">{{ post.title }}</h5>
          <p class="card-text">
            {{ post.content }}
          </p>
        </div>
      </div>
    </div>

    <h3 v-else>Non sono presenti post</h3>
  </div>
</template>

<script>
export default {
  name: "PostsList",
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    getPosts() {
      axios
        .get("http://127.0.0.1:8000/api/posts")
        .then((res) => {
          console.log(res.data);
        })
        .catch((err) => {
          console.error(err);
        })
        .then(console.log("chiamata terminata"));
    },
  },
  mounted() {
    this.getPosts;
  },
};
</script>

<style>
</style>