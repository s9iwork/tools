<template>
  <div>
    <Header :is-top-page="true"/>
    <main class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-image">
                <img src="/img/ddg/main.svg">
                <span class="card-title tool-title">ダミーデータ作る君</span>
              </div>
              <div class="card-content">
                <p>名前や住所などのダミーデータを生成するツールです。</p>
              </div>
              <div class="card-action">
                <a href="/ddg">View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <Footer/>
  </div>
</template>
<script>
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
  components: { Footer, Header },
};
</script>

<style scoped>
.container {
  margin-top: 3rem;
}
</style>
