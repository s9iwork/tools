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

// 略語一覧(大文字にする単語)
const abbreviationList = [
  'id',
];

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
      let newValue = '// Xxx .\n';
      newValue += 'type xxx struct {\n';

      const list = value.split('\n');
      // １行ずつ処理
      list.forEach((val) => {
        if (val === '') {
          return;
        }
        const splited = val.split(',');
        if (splited.length !== 3) {
          return;
        }

        const columnName = splited[0];
        newValue += `    ${this.convertFieldName(columnName)} ${splited[1]} \`gorm:"column:${columnName}" json:"${columnName}"\`  // ${splited[2]}\n`;
      });
      newValue += '}\n';

      this.result = newValue;

      // リサイズ
      M.textareaAutoResize(document.getElementById('result'));
    },
  },
  methods: {
    // カラム名を構造体のフィールド名に変換する
    convertFieldName(columnName) {
      let fieldName = '';

      // アンダースコアで分割
      columnName.split('_').forEach((val) => {
        if (abbreviationList.includes(val)) {
          // 省略ワードであれば大文字にする
          fieldName += val.toUpperCase();
        } else {
          // キャメルケースにする
          val.split('').forEach((letter, i) => {
            if (i === 0) {
              fieldName += letter.toUpperCase();
            } else {
              fieldName += letter;
            }
          });
        }
      });

      return fieldName;
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
