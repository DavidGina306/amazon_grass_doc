require('./bootstrap');

import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import { VueMaskDirective } from 'v-mask'
import VueSweetalert2 from 'vue-sweetalert2';
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.css';
import IziToast from 'izitoast';
import Loading from 'vue-loading-overlay';

const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
};

Vue.use(VueSweetalert2, options);
Vue.directive('mask', VueMaskDirective);
Vue.use(IziToast)
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueIziToast);
Vue.use(Loading);
Vue.component('loading', Loading)
Vue.component('navbar-menu', require('./components/Main.vue').default);
Vue.component('page-form', require('./components/PageForm.vue').default);
Vue.component('page-footer', require('./components/FooterPage.vue').default);


const app = new Vue({
    el: '#app'
});