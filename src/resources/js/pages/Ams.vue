<template>
  <PageContainer>
    <Header slot="header" :tool-name="'資産運用シミュレーター'" :tool-path="'/ams'" :is-top-page="false"/>
    <main slot="main" class="container content">
      <!-- // TODO description-->
      <ToolDescription description="資産運用シミュレーターのディスクリプション"/>
      <!-- フォーム -->
      <div class="row form">
        <form class="col s12">
          <div v-if="errors.length > 0">
            <ul>
              <li v-for="(error, i) in errors" :key="i">
                {{ error }}
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <select v-model="type">
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
              <input type="number" v-model="yieldYear">
              <label>利回り</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input type="number" v-model="amount">
              <label>投資金額(年間)</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 center">
              <a class="waves-effect waves-light btn" @click="add">追加</a>
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
                <tr v-for="(asset, i) in assets" :key="i">
                  <td>{{ assetMaster[asset.type] }}</td>
                  <td>{{ `${asset.yield}%` }}</td>
                  <td>{{ asset.amount.toLocaleString() }}</td>
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
  data() {
    return {
      assetMaster: {
        1: '銀行',
        2: '株',
        3: '投資信託',
        4: 'ETF',
        5: '債券',
      },
      type: '',
      yieldYear: '',
      amount: '',
      errors: [],
      assets: [
        {
          type: 1,
          yield: '0.002',
          amount: '300000',
        },
        {
          type: 2,
          yield: '3',
          amount: '300000',
        },
      ],
    };
  },
  methods: {
    add() {
      if (!this.validate()) {
        return;
      }
      this.assets.push({
        type: this.type,
        yield: this.yieldYear,
        amount: this.amount,
      });
    },
    validate() {
      this.errors = [];

      if (this.type === '') {
        this.errors.push('対象資産を入力してください');
      }
      if (this.yieldYear === '') {
        this.errors.push('利回りを入力してください');
      }
      if (this.amount === '') {
        this.errors.push('投資金額を入力してください');
      }
      return this.errors.length <= 0;
    },
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
