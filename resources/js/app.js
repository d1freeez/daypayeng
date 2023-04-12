require('./bootstrap');
import router from './routes.js';
import VueRouter from 'vue-router';

window.Vue = require('vue').default;
import VuePageTransition from 'vue-page-transition'
import Antd from 'ant-design-vue/lib'

Vue.use(Antd)
Vue.use(VuePageTransition)
Vue.component('vue-layout', require('./pages/Layout.vue').default);
Vue.component('main-header', require('./components/menu.vue').default);
Vue.component('main-footer', require('./components/footer.vue').default);
Vue.component('cabinet-footer', require('./components/cabinet-footer.vue').default);
Vue.use(VueRouter);
require('vue2-animate/dist/vue2-animate.min.css')

window.Event = new Vue;

const app = new Vue({router}).$mount('#app')
