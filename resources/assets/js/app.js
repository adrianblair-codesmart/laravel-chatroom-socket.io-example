
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when building
 * robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to the
 * page. Then, you may begin adding components to this application or customize
 * the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
Vue.component('chatrooms-dropdown', require('./components/ChatroomsDropdown.vue'));
Vue.component('app', require('./components/App.vue'));

Vue.config.productionTip = true

/* eslint-disable no-new */
const app = new Vue({
  el: '#app',
  //template: '<App/>',
  //components: { app },
})

