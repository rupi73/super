/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueBootstrapTypeahead = require('vue-bootstrap-typeahead');
window.BootstrapVue = require('bootstrap-vue');
window.Vue.use(window.BootstrapVue);
//window.VueBadgerAccordion = require('vue-badger-accordion');
//window.Vue.use(window.VueBadgerAccordion);
//window.VueMultiSelect = require('vue-multi-select');
//window.Vue.use(window.VueMultiSelect);
window.VueTreeSelect = require('@riophae/vue-treeselect');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Global registration
Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead);
Vue.component('treeselect', VueTreeSelect.Treeselect);
//Vue.component('BadgerAccordion', VueBadgerAccordion.BadgerAccordion);
//Vue.component('BadgerAccordionItem', VueBadgerAccordion.BadgerAccordionItem);
const app = new Vue({
    el: '#app'
});