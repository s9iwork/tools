<template>
  <div class="pageContainer">
    <Header :is-top-page="true"/>
    <main class="container content">
      <div class="row">
        <!-- ダミーデータジェネレーター -->
        <div class="col s12 m6">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-image">
                <img src="/img/ddg/main.svg" alt="ダミーデータジェネレーター">
                <span class="card-title toolTitle">ダミーデータジェネレーター</span>
              </div>
              <div class="card-content">
                <p>名前や住所などのダミーデータを生成するツールです。</p>
              </div>
              <div class="card-action">
                <router-link to="/ddg">View</router-link>
              </div>
            </div>
          </div>
        </div>
        <!-- 資産運用シミュレーター-->
        <div class="col s12 m6">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-image">
                <img src="/img/ams/main.svg" alt="資産運用シミュレーター">
                <span class="card-title toolTitle">資産運用シミュレーター</span>
              </div>
              <div class="card-content">
                <p>毎年の投資額と利回りを元に20年運用した場合の資産額を計算するツールです。</p>
              </div>
              <div class="card-action">
                <router-link to="/ams">View</router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- TODO cmc-->
        <div class="col s12 m6">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-image">
                <img src="/img/cmc/main.svg" alt="カラムモデルコンバーター">
                <span class="card-title toolTitle">カラムモデルコンバーター</span>
              </div>
              <div class="card-content">
                <p>カラムモデルコンバーター。</p>
              </div>
              <div class="card-action">
                <router-link to="/cmc">View</router-link>
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
  justify-content: center;
  max-width: 400px;
}

@media only screen and (max-width: 600px) {
  .toolTitle {
    font-size: 1.1rem !important;
  }
}

</style>
