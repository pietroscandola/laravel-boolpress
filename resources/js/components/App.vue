<template>
  <div>
    <header>
      <Header :title="title" />
    </header>
    <main class="container mt-5">
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
import Header from "./Header.vue";
import PostsList from "./posts/PostsList.vue";

export default {
  name: "App",
  components: {
    Header,
    PostsList,
  },
  data() {
    return {
      title: "Boolpress",
    };
  },
};
</script>
