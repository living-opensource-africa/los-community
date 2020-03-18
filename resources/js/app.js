/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

// window.Vue = require('vue');
import Vue from 'vue'

import VueRouter from 'vue-router'

import appRoutes from './routes'

import NProgress from 'nprogress'

import '../../node_modules/nprogress/nprogress.css'

window.Vue = Vue

Vue.use(VueRouter)

const routes = appRoutes

const router = new VueRouter({
	routes,
	mode: 'history'
})

router.beforeResolve((to, from, next) => {
  // If this isn't an initial page load.
  if (to.name) {
    // Start the route projectgress bar.
    NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  // Complete the animation of the route progress bar.
  NProgress.done()
})

const app = new Vue({
    el: '#app',
    router
})
