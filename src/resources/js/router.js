import Vue from 'vue';
import VueRouter from 'vue-router';

import Top from './pages/Top';
import Ddg from './pages/Ddg';
import Cic from './pages/Cic';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Top,
    meta: {
      title: 'Webツール',
      description: 'システムエンジニア、プログラマー向けに様々な自作Webツールを提供しています。',
      favicon: './img/favicon.png',
    },
  },
  {
    path: '/ddg',
    component: Ddg,
    meta: {
      title: 'ダミーデータジェネレーター｜Webツール',
      description: '様々なテストデータ、ダミーデータを作成するツールです。',
      favicon: './img/ddg/favicon.png',
    },
  },
  {
    path: '/cic',
    component: Cic,
    meta: {
      title: 'ダミーデータジェネレーター｜Webツール',
      description: '様々なテストデータ、ダミーデータを作成するツールです。',
      favicon: './img/ddg/favicon.png',
    },
  },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
