<template>
  <PageContainer>
    <Header slot="header" :tool-name="'資産運用シミュレーター'" :tool-path="'/ams'" :is-top-page="false"/>
    <main slot="main" class="container content">
      <ToolDescription description="毎年の投資額と利回りを元に20年運用した場合の資産額を計算するツールです。"/>
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
                  <option value="5">その他</option>
                </select>
                <label>対象資産</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="number" v-model="yieldYear">
                <label>利回り(%)</label>
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
                <button type="button" class="waves-effect waves-light btn" @click="add">追加</button>
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
                <td>{{ `${Number(asset.amount).toLocaleString('ja-JP')}円` }}</td>
                <td>
                  <button type="button" class="btn red" @click="destroy(i)">
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
          <button type="button" class="waves-effect waves-light btn" @click="calc">計算</button>
        </div>
      </div>
      <div class="row" v-if="isLoading">
        <div class="col s12 center-align">
          <Loader/>
        </div>
      </div>
      <div class="row" v-if="chartData !== ''">
        <div class="col s12">
          <h2>結果</h2>
          <LineChart :height="400" :chartdata="chartData.transition"
                     :options="getLineChartOptions()"/>
          <DoughnutChart style="margin-top: 3rem" :height="400" :chartdata="chartData.balance"
                         :options="getDoughnutChartOptions()"/>
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
        5: 'J-REIT',
        6: 'その他',
      },
      type: '',
      yieldYear: '',
      amount: '',
      errors: [],
      assets: [
        {
          type: '1',
          yield: '0.001',
          amount: '100000',
        },
        {
          type: '2',
          yield: '3',
          amount: '100000',
        },
        {
          type: '3',
          yield: '3.5',
          amount: '100000',
        },
        {
          type: '4',
          yield: '5',
          amount: '100000',
        },
        {
          type: '5',
          yield: '4',
          amount: '100000',
        },
        {
          type: '6',
          yield: '1',
          amount: '100000',
        },
      ],
      chartData: '',
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
      // グラフ初期化
      this.chartData = '';

      this.isLoading = true;
      axios.post('/api/ams/calc', {
        assets: this.createCalcParam(),
      }).then((res) => {
        this.setChartData(res.data);
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
    setChartData(calculated) {
      // 資産推移
      const transitionLabel = [];
      const transitionAmount = [];
      Object.keys(calculated.transition_history).forEach((k) => {
        transitionLabel.push(`${k}年`);
        transitionAmount.push(calculated.transition_history[k]);
      });

      // 資産内訳
      const balanceLabel = [];
      const balanceAmount = [];
      Object.keys(calculated.balance).forEach((k) => {
        balanceLabel.push(this.assetMaster[k]);
        balanceAmount.push(calculated.balance[k]);
      });

      this.chartData = {
        transition: {
          labels: transitionLabel,
          datasets: [{
            label: '資産推移',
            data: transitionAmount,
            borderColor: 'rgb(75, 192, 192)',
            fill: false,
          }],
        },
        balance: {
          labels: balanceLabel,
          datasets: [{
            data: balanceAmount,
            backgroundColor: [
              '#ff6384',
              '#36a2eb',
              '#ffcd56',
              '#ff9205',
              '#05ff16',
              '#d458f9',
            ],
          }],
        },
      };
    },
    getLineChartOptions() {
      return {
        scales: {
          xAxes: [
            {
              ticks: {},
            },
          ],
          yAxes: [
            {
              ticks: {
                callback: (label) => `${label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')}円`,
              },
            },
          ],
        },
        tooltips: {
          callbacks: {
            label(tooltipItem) {
              return `${tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')}円`;
            },
          },
        },
      };
    },
    getDoughnutChartOptions() {
      return {
        title: {
          display: true,
          text: '資産内訳',
        },
        tooltips: {
          callbacks: {
            label(tooltipItem, data) {
              // tooltipItemに入ってないのでデータ全体から取る
              const label = data.labels[tooltipItem.index];
              const amount = data.datasets[0].data[tooltipItem.index];
              const formattedAmount = `${amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')} 円`;

              return `${label}：${formattedAmount}`;
            },
          },
        },
      };
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
</style>
