import Vue from 'vue';
import VueRouter from 'vue-router';

import Top from './pages/Top';
import Ddg from './pages/Ddg';
import Ams from './pages/Ams';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Top,
    meta: {
      title: 'Webツール',
      description: 'Web開発や生活の中で用途がありそうなツールをWebサービス化しています。',
      favicon: './img/favicon.png',
    },
  },
  {
    path: '/ddg',
    component: Ddg,
    meta: {
      title: 'ダミーデータジェネレーター｜Webツール',
      description: '名前や住所などの様々なテストデータ、ダミーデータを作成するツールです。',
      favicon: './img/ddg/favicon.png',
    },
  },
  {
    path: '/ams',
    component: Ams,
    meta: {
      title: '資産運用シミュレーター｜Webツール',
      description: '毎年の投資額と利回りを元に20年運用した場合の資産額を計算するツールです。',
      favicon: './img/ams/favicon.png',
    },
  },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
