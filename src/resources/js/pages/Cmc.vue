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
          <div class="row">
            <div class="input-field col s12">
              <textarea id="text" class="materialize-textarea" v-model="text"></textarea>
              <label for="text" class="active">カラム一覧</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="result" class="materialize-textarea active" v-model="result"></textarea>
              <label for="result" class="active">結果</label>
            </div>
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
      result: '',
    };
  },
  watch: {
    text(value) {
      this.result = 'type xxx struct {\n';
      const list = value.split('\n');
      list.forEach((val) => {
        if (val === '') {
          return;
        }
        const splited = val.split(',');
        if (splited.length !== 3) {
          return;
        }
        this.result += `    ${splited[0]} ${splited[1]} // ${splited[2]}\n`;
      });
      this.result += '}\n';
      M.textareaAutoResize(document.getElementById('result'));
    },
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

.materialize-textarea {
  height: 6rem;
}
</style>
