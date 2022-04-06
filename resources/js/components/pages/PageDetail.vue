<template>
  <div>
    <h1>Dettaglio Post</h1>
    <Loader v-if="isLoading && !post" />
    <div v-else>
      <PostCard v-if="post" :post="post" hide-link="true" />
      <Alert
        v-if="isError && !isLoading"
        type="danger"
        message="si è verificato un errore"
        @on-close="isError = false"
        dismissable="true"
      />
    </div>
  </div>
</template>

<script>
import PostCard from "../posts/PostCard.vue";
import Loader from "../Loader.vue";
import Alert from "../Alert.vue";

export default {
  name: "PageDetail",
  components: {
    PostCard,
    Loader,
    Alert,
  },
  data() {
    return {
      post: null,
      isLoading: false,
      isError: false,
    };
  },
  methods: {
    getPost() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/posts/" + this.$route.params.id)
        .then((res) => {
          this.post = res.data;
        })
        .catch((err) => {
          console.error(err);
          this.isError = true;
        })
        .then(() => {
          this.isLoading = false;
          console.log("chiamata terminata");
        });
    },
  },
  mounted() {
    this.getPost();
  },
};
</script>

<style>
</style>