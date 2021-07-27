import { createApp } from 'vue'

import App from './App.vue'


createApp(App).mount('#app')

import Vue from 'vue'
import components from './components/components.vue'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<MyApp></MyApp>',
  components: { components }
})

