<template>
  <div class="pageContainer">
    <Header :is-top-page="true"/>
    <main class="container content">
      <div class="row">
        <div class="col s12 m6">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-image">
                <img src="/img/ddg/main.svg" alt="ダミーデータ作る君">
                <span class="card-title toolTitle">ダミーデータ作る君</span>
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
.pageContainer {
  display: flex;
  flex-direction: column;
  height: 100vh;
}

.content {
  flex: 1 0 auto;
}

.toolTitle {
  font-size: 1.4rem !important;
}

.card-wrapper {
  padding: 2rem;
  display: flex;
  justify-content: center;
}

</style>
