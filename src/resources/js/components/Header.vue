<template>
  <header class="header">
    <nav>
      <div class="container">
        <h1 v-if="isTopPage">
          <router-link to="/" class="appName brand-logo">Webツール</router-link>
        </h1>
        <router-link :to="toolPath" class="toolName brand-logo" v-else>{{ toolName }}</router-link>

        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <div>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li v-if="!isTopPage">
              <router-link to="/">ツール一覧</router-link>
            </li>
            <li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
      <li>
        <a href="#" v-if="!isTopPage" v-on:click.prevent="toTop">ツール一覧</a>
      </li>
      <li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
    </ul>
  </header>
</template>

<script>

import M from 'materialize-css';

export default {
  mounted() {
    M.Sidenav.init(document.querySelector('.sidenav'), {});
  },
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
  methods: {
    toTop() {
      const instance = M.Sidenav.getInstance(document.querySelector('.sidenav'));
      instance.close();
      this.$router.push('/');
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

@media only screen and (max-width: 600px) {
  h1, .toolName, .appName {
    font-size: 1.1rem;
  }
}
</style>
