<template>
  <header>
    <nav>
      <div class="container">
        <h1 class="header__h1" v-if="isTopPage">
          <a href="/" class="brand-logo">Webツール</a>
        </h1>
        <a href="/" class="brand-logo" v-else>Webツール</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
        </ul>
      </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
    </ul>
  </header>
</template>

<script>
export default {
  props: {
    isTopPage: {
      type: Boolean,
      default: true,
    },
  },
};
</script>

<style scoped>
h1 {
  margin: 0;
}

</style>
