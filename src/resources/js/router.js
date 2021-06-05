import Vue from 'vue'
import VueRouter from "vue-router";

import Top from './pages/Top'
import Ddg from './pages/ddg/Ddg'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		component: Top
	},
	{
		path: '/ddg',
		component: Ddg
	},
]

const router = new VueRouter({
	mode: 'history',
	routes
})

export default router
