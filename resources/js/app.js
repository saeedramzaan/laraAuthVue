require('./bootstrap');
//window.Vue = require('vue');
import Vue from 'vue'

Vue.component('post-component', require('./components/PostComponent.vue').default);
Vue.component('update-component', require('./components/UpdateComponent.vue').default);
Vue.component('show-component', require('./components/ShowComponent.vue').default);
const app = new Vue({
    el: '#app',
});