/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import { library } from '@fortawesome/fontawesome-svg-core'
import { faPen ,faTrashAlt, faBars} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);
library.add(faPen,faTrashAlt,faBars )





Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('dictionary-content', require('./components/DictionaryComponent.vue').default);



const app = new Vue({
    el: '#app',
});
