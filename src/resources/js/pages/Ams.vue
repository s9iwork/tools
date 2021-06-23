<template>
  <PageContainer>
    <Header slot="header" :tool-name="'資産運用シミュレーター'" :tool-path="'/ams'" :is-top-page="false"/>
    <main slot="main" class="container content">
      <!-- // TODO description-->
      <ToolDescription description="資産運用シミュレーターのディスクリプション"/>
      <!-- フォーム -->
      <div class="row form">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <select>
                <option selected>選択してください</option>
                <option value="1">銀行</option>
                <option value="2">株</option>
                <option value="3">投資信託</option>
                <option value="4">ETF</option>
                <option value="5">債券</option>
              </select>
              <label>対象資産</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input type="number">
              <label>利回り</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input type="number">
              <label>投資金額(年間)</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 center">
              <a class="waves-effect waves-light btn">追加</a>
            </div>
          </div>
        </form>
        <!-- テーブル -->
        <div class="row">
          <div class="col s12">
            <table class="responsive-table highlight">
              <thead>
                <tr>
                  <th>対象資産</th>
                  <th>利回り</th>
                  <th>投資金額(年間)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>銀行</td>
                  <td>0.004%</td>
                  <td>300,000</td>
                </tr>
                <tr>
                  <td>投資信託</td>
                  <td>3%</td>
                  <td>300,000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col s12 center">
            <a class="waves-effect waves-light btn">計算</a>
          </div>
        </div>
      </div>
    </main>
    <Footer slot="footer"/>
  </PageContainer>
</template>

<script>
import M from 'materialize-css';
import PageContainer from '../components/PageContainer';
import ToolDescription from '../components/ToolDescription';
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
  name: 'Ams',
  components: {
    PageContainer,
    ToolDescription,
    Header,
    Footer,
  },
  mounted() {
    const elems = document.querySelectorAll('select');
    M.FormSelect.init(elems, {});
  },
};
</script>

<style scoped>
.content {
  flex: 1 0 auto
}

.form {
  margin-top: 4rem;
}
</style>
