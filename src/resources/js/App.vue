<template>
  <div id="app">
    <RouterView/>
  </div>
</template>

<script>
export default {
  name: 'App',
  mounted() {
    const to = this.$route;
    this.setPageTags(to);
  },
  watch: {
    $route(to) {
      this.setPageTags(to);
    },
  },
  methods: {
    setPageTags(to) {
      document.title = to.meta.title;
      document.querySelector("meta[name='description']").setAttribute('content', to.meta.description);
      const favicons = document.querySelectorAll('.favicon');
      favicons.forEach((favicon) => {
        // eslint-disable-next-line no-param-reassign
        favicon.href = to.meta.favicon;
      });
    },
  },
};
</script>

<style>
</style>
