require('./bootstrap');
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { BootstrapVue } from 'bootstrap-vue';
import { Form, HasError, AlertError } from 'vform'
import { ModalPlugin } from 'bootstrap-vue';
import ModalFullScreenVue from 'modal-fullscreen-vue';
import fullscreen from 'vue-fullscreen'

Vue.use(ModalFullScreenVue);
Vue.use(fullscreen);

window.Vue = require('vue');
window.Form = Form;

Vue.use(BootstrapVue);
Vue.use(ModalPlugin);
Vue.use(require('vue-resource'));
Vue.use(VueFullscreen.default)

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('App', require('./App.vue').default);

const app = new Vue({
    el: '#app',
});
