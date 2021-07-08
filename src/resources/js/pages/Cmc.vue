<template>
  <PageContainer>
    <Header slot="header" :tool-name="'カラムモデルコンバーター'" :tool-path="'/cmc'" :is-top-page="false"/>
    <main slot="main" class="container content">
      <!-- TODO -->
      <ToolDescription description="カラムモデルコンバーター"/>
      <!-- フォーム -->
      <div class="row formContainer">
        <div class="col s12">
          <h2>フォーム</h2>
          <form>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="text" class="materialize-textarea" v-model="text"></textarea>
                <label for="text">カラム一覧</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" v-model="columnName">
                <label>カラム名</label>
              </div>
              <div class="input-field col s6">
                <input type="text" v-model="columnType">
                <label>型</label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
    <Footer slot="footer"/>
  </PageContainer>
</template>

<script>
import PageContainer from '../components/PageContainer';
import ToolDescription from '../components/ToolDescription';
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
  name: 'Cmc',
  components: {
    Header,
    PageContainer,
    ToolDescription,
    Footer,
  },
  data() {
    return {
      text: '',
      columns: '',
    };
  },

};
</script>

<style scoped>
h2 {
  font-size: 1.5rem;
  border-left: solid 5px #ee6e73;
  padding-left: 5px;
  color: #ee6e73;
}

.content {
  flex: 1 0 auto
}

.formContainer {
  margin-top: 2rem;
}
</style>
