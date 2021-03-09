require('./bootstrap');
import 'alpinejs';

window.Vue = require('vue');
import Vue from 'vue';
import VueAutosuggest from "vue-autosuggest";
import FlashMessage from '@smartweb/vue-flash-message';


Vue.use(VueAutosuggest).component("chamber-of-commerce-input-field", () => import("./Components/ChamberOfCommerceInputField"));
Vue.use(FlashMessage).component("shop-categories", () => import("./Components/ShopCategories"));
Vue.component('link-tree', () => import("./Components/SelectTree"));

const app = new Vue({
    el: '#app',
});
