<template>
  <PageContainer>
    <Header slot="header" :tool-name="'資産運用シミュレーター'" :tool-path="'/ams'" :is-top-page="false"/>
    <main slot="main" class="container content">
      <!-- // TODO description-->
      <ToolDescription description="資産運用シミュレーターのディスクリプション"/>
      <!-- フォーム -->
      <div class="row formContainer">
        <div class="col s12">
          <h2>フォーム</h2>
          <form>
            <div v-if="errors.length > 0">
              <Error :errors="errors"/>
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
                <button class="waves-effect waves-light btn" @click="add">追加</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- テーブル -->
      <div class="row">
        <div class="col s12">
          <table class="highlight">
            <thead>
              <tr>
                <th>対象資産</th>
                <th>利回り</th>
                <th>投資金額(年間)</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(asset, i) in assets" :key="i">
                <td>{{ assetMaster[asset.type] }}</td>
                <td>{{ `${asset.yield}%` }}</td>
                <td>{{ Number(asset.amount).toLocaleString('ja-JP') }}</td>
                <td>
                  <button class="btn red" @click="destroy(i)">
                    <i class="material-icons">delete</i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col s12 center">
          <button class="waves-effect waves-light btn" @click="calc">計算</button>
        </div>
      </div>
      <div class="row" v-if="isLoading">
        <div class="col s12 center-align">
          <Loader/>
        </div>
      </div>
      <div class="row chart" v-if="lineChartData !== ''">
        <div class="col s12 center">
          <LineChart :chartdata="lineChartData" :options="getLineChartOptions"/>
        </div>
      </div>
      <div class="row chart" v-if="doughnutChartData !== ''">
        <div class="col s12 center">
          <DoughnutChart :chartdata="doughnutChartData" :options="getDoughnutChartOptions()"/>
        </div>
      </div>
    </main>
    <Footer slot="footer"/>
  </PageContainer>
</template>

<script>
import M from 'materialize-css';
import axios from 'axios';
import PageContainer from '../components/PageContainer';
import ToolDescription from '../components/ToolDescription';
import Header from '../components/Header';
import Footer from '../components/Footer';
import { getRequiredErrorMessage } from '../errors/general';
import Error from '../components/Error';
import Loader from '../components/Loader';
import LineChart from '../components/chart/LineChart';
import DoughnutChart from '../components/chart/DoughnutChart';

export default {
  name: 'Ams',
  components: {
    Header,
    PageContainer,
    ToolDescription,
    Error,
    Loader,
    LineChart,
    DoughnutChart,
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
      lineChartData: '',
      doughnutChartData: '',
      isLoading: false,
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
        this.errors.push(getRequiredErrorMessage('対象資産'));
      }
      if (this.yieldYear === '') {
        this.errors.push(getRequiredErrorMessage('利回り'));
      }
      if (this.amount === '') {
        this.errors.push(getRequiredErrorMessage('投資金額'));
      }

      return this.errors.length <= 0;
    },
    calc() {
      if (this.assets.length <= 0) {
        return;
      }

      this.isLoading = true;
      axios.post('/api/ams/calc', {
        assets: this.createCalcParam(),
      }).then((res) => {
        this.setLineChartData(res.data);
        this.setDoughnutChartData(res.data);
      }).catch(() => {
        M.toast({ html: 'エラーが発生しました' });
      }).finally(() => {
        this.isLoading = false;
      });
    },
    createCalcParam() {
      const params = [];
      this.assets.forEach((asset) => {
        params.push({
          type: asset.type,
          yield: asset.yield,
          amount: asset.amount,
        });
      });
      return params;
    },
    setLineChartData(calculated) {
      this.lineChartData = {
        labels: [2021, 2022, 2023, 2024, 2025, 2026],
        datasets: [{
          label: '資産推移',
          data: [100000, 200000, 300000, 400000, 500000, 600000],
        }],
      };
    },
    setDoughnutChartData(calculated) {
      this.doughnutChartData = {
        labels: ['銀行', '投資信託'],
        datasets: [{
          label: '資産内訳',
          data: [100000, 200000],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
          ],
        }],
      };
    },
    getLineChartOptions() {
      return {};
    },
    getDoughnutChartOptions() {
      return {};
    },
    destroy(i) {
      this.assets.splice(i, 1);
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

.chart {
  width: 400px;
  height: 400px;
}
</style>
