require('./bootstrap');
import 'bootstrap/dist/css/bootstrap.min.css'

import Vue from 'vue'
import accounting from 'accounting'
import pluralize from 'pluralize'
import Shop from './components/shop/Shop'
import store from './store'

Vue.config.productionTip = false

Vue.filter('formatMoney', accounting.formatMoney)
Vue.filter('pluralize', pluralize)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/PropertyCategories.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


new Vue({
  store,
  render: h => h(Shop)
}).$mount('#app')
