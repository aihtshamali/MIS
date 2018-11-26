
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// Vue Scroll for Auto Scrolling
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
import { Form, HasError, AlertError } from 'vform'
import swal from 'sweetalert2'

window.swal=swal;
window.toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

Vue.use(VueChatScroll)
window.Form=Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
