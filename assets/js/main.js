// assets/js/main.js
import 'styles/main.scss';

import Vue from 'vue';
import Main from './Main';
import router from '@/router';

import store from '@/store'

import axios from '@/config/axios'
window.axios = axios


new Vue({
    router,
    store,
    render: h => h(Main),
}).$mount('#app');