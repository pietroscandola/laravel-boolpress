<template>
  <PostCard v-if="post" :post="post" />
</template>

<script>
import PostCard from "./PostCard.vue";
export default {
  name: "PageDetail",
  components: {
    PostCard,
  },
  data() {
    return {
      post: [],
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/posts/" + this.$route.params.id)
      .then((res) => {
        this.post = res.data;
      })
      .catch((err) => {
        console.error(err);
      })
      .then(() => {
        this.isLoading = false;
        console.log("chiamata terminata");
      });
  },
};
</script>

<style>
</style>