window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');


import VueRouter from 'vue-router';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import Tooltip from 'vue-directive-tooltip';
import 'vue-directive-tooltip/css/index.css';
import ECharts from 'vue-echarts/components/ECharts.vue';

import App from './components/App';
import router from './routes';
import store from './store/index';
import jwtToken from './helpers/JWT';

// !import not to change....-------------
// Add a request interceptor
axios.interceptors.request.use(
    (config)=> {
        if (jwtToken.getToken()) {
            config.headers['Authorization'] = 'Bearer ' + jwtToken.getToken();
        }
        return config;
    }, (error)=> {
        return Promise.reject(error);
    }
);
// -------------------------------------

// 全局声明
Vue.component('app', App);
Vue.component('chart', ECharts);

Vue.use(VueRouter);
Vue.use(ElementUI);
Vue.use(Tooltip);

const app = new Vue({
    el: '#app',
    router,
    store
});
