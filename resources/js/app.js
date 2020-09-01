require('./bootstrap');

import Vue from 'vue';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
import Main from './components/Main.vue';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);


const app = new Vue({
    el: '#app',
    render: app => app(Main)
});
