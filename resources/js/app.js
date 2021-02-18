require('./bootstrap');
import 'alpinejs';

window.Vue = require('vue');
import Vue from 'vue';
import VueAutosuggest from "vue-autosuggest";
Vue.use(VueAutosuggest).component("chamber-of-commerce-input-field", () => import("./Components/ChamberOfCommerceInputField"));
Vue.component("shop-categories", () => import("./components/ShopCategories"));

const app = new Vue({
    el: '#app',
});
