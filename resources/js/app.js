require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';

Vue.component("shop-categories", () => import("./components/ShopCategories"));
const app = new Vue({
    el: '#app',
});
