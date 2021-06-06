<template>
  <div class="pageContainer">
    <Header :tool-name="'ダミーデータ作る君'" :tool-path="'/ddg'" :is-top-page="false"/>
    <main class="container content">
      <div class="initialLoader" v-if="!isInitialized">
        <Loader/>
      </div>
      <div v-else>
        <div class="row">
          <div class="col s12">
            <h2>
              このツールについて
            </h2>
            <div>
              指定した種別のダミーデータを10件作成します。
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <ul class="tabs z-depth-1">
              <li v-for="category in categories"
                  class="tab col s3" v-on:click="changeTab" :key="'tab' +category.id">
                <a v-bind:href="'#category-' + category.id" v-bind:data-category-id="category.id">
                  {{ category.name }}
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div v-for="category in categories"
               v-bind:id="'category-' + category.id" :key="category.id">
            <div class="col s12 m6">
              <h2>{{ category.name }}</h2>
              <div v-for="type in types[category.id]" :key="type.id + category.id">
                <label>
                  <input class="with-gap type"
                         type="radio"
                         name="type"
                         v-bind:value="type.id"
                         v-model="selectedType"/>
                  <span>{{ type.name }}</span>
                </label>
              </div>
            </div>
            <div class="col s12 m6">
              <h2>
                サンプル
              </h2>
              <div>
                {{ samples[selectedType] }}
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s12 center-align">
            <button class="btn waves-effect waves-light" v-on:click="create">作成</button>
          </div>
        </div>
        <div class="row" v-if="isLoading">
          <div class="col s12 center-align">
            <Loader/>
          </div>
        </div>
        <div class="row" v-if="createdItems.length > 0">
          <div class="col s12">
            <h2 class="content__h2">結果</h2>
            <div class="created-item" v-for="item in createdItems" :key="'result' + item.id">
              {{ item }}
            </div>
          </div>
          <div class="center-align">
            <button class="btn waves-effect waves-light" v-on:click="copy">コピー</button>
          </div>
        </div>
      </div>
    </main>
    <Footer/>
  </div>
</template>

<script>
import axios from 'axios';
import M from 'materialize-css';
import Loader from '../../components/Loader';
import Header from '../../components/Header';
import Footer from '../../components/Footer';

export default {
  components: { Loader, Header, Footer },
  data() {
    return {
      isInitialized: false,
      isTabInitialized: false,
      isLoading: false,
      selectedType: 1,
      categories: [],
      types: [],
      samples: [],
      createdItems: [],
    };
  },
  mounted() {
    this.loadInitialData();
  },
  updated() {
    if (!this.isTabInitialized) {
      M.Tabs.init(document.querySelectorAll('.tabs'), {});
      this.isTabInitialized = true;
    }
  },
  methods: {
    loadInitialData() {
      axios.get('/api/ddg/initial_data', {
        params: {},
      }).then((res) => {
        this.categories = res.data.categories;

        // 種別とサンプルを整形する
        const types = [];
        const samples = {};
        res.data.data_types.forEach((val) => {
          if (types[val.category_id] === undefined) types[val.category_id] = [];
          types[val.category_id].push(val);

          samples[val.id] = val.sample;
        });
        this.types = types;
        this.samples = samples;
        this.isInitialized = true;
      }).catch(() => {
        // TODO エラーきちんと出す
        M.toast({ html: 'エラーが発生しました' });
      });
    },
    create() {
      this.createdItems = [];
      this.isLoading = true;
      axios.get('/api/ddg/create', {
        params: {
          type: this.selectedType,
        },
      }).then((res) => {
        this.createdItems = res.data.items;
      }).catch(() => {
        // TODO エラーきちんと出す
        M.toast({ html: 'エラーが発生しました' });
      }).finally(() => {
        this.isLoading = false;
      });
    },
    changeTab(event) {
      this.createdItems = [];

      const categoryId = event.target.getAttribute('data-category-id');
      const target = document.querySelector(`#category-${categoryId} .type`);
      target.checked = true;
      this.selectedType = target.value;
    },
    copy() {
      let copyString = '';
      const createdItems = document.getElementsByClassName('created-item');
      createdItems.forEach((item) => {
        copyString += (`${item.innerText}\n`);
      });

      // クリップボードにコピー
      const temp = document.createElement('div');
      temp.appendChild(document.createElement('pre')).textContent = copyString;

      // 画面外に固定
      const { style } = temp;
      style.position = 'fixed';
      style.left = '-100%';
      document.body.appendChild(temp);
      document.getSelection().selectAllChildren(temp);

      const result = document.execCommand('copy');
      document.body.removeChild(temp);
      if (result) {
        M.toast({ html: 'コピーしました' });
      } else {
        M.toast({ html: 'コピーに失敗しました。リロードしてお試しください' });
      }
    },
  },
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

.initialLoader {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

h2 {
  font-size: 1.5rem;
  border-left: solid 5px #ee6e73;
  padding-left: 5px;
  color: #ee6e73;
}
</style>
