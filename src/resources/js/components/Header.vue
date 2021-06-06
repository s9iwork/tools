<template>
  <header class="header">
    <nav>
      <div class="container">
        <h1 v-if="isTopPage">
          <a href="/" class="appName brand-logo">Webツール</a>
        </h1>
        <a :href="toolPath" class="toolName brand-logo" v-else>{{ toolName }}</a>

        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <div>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li v-if="!isTopPage"><a href="/">ツール一覧</a></li>
            <li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="/" v-if="!isTopPage">ツール一覧</a></li>
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
    toolName: {
      type: String,
      default: '',
    },
    toolPath: {
      type: String,
      default: '/',
    },
  },
};
</script>

<style scoped>
.header {
  height: 4rem;
}

h1 {
  margin: 0;
  padding: 0;
  line-height: inherit;
}

h1, .toolName, .appName {
  font-size: 2rem;
}
</style>
