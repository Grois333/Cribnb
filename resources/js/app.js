/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from "vue-router";
import router from "./routes";
import Vuex from 'vuex';
import storeDefinition from "./store";
import Index from "./Index"; //Local Registration
import moment from "moment";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";
import ValidationErrors from "./shared/components/ValidationErrors";
import Success from "./shared/components/Success";
import axios from "axios";

import DatePick from 'vue-date-pick';
import 'vue-date-pick/dist/vueDatePick.css';

window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Global Registration
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('second-component', require('./components/Example2.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Moment filter available globaly
Vue.filter("fromNow", value => moment(value).fromNow());

//Register Star Rating Global Component
Vue.component("star-rating", StarRating);

//Fatal Error Component
Vue.component("fatal-error", FatalError);

//Validation Errors
Vue.component("v-errors", ValidationErrors);

// Success Component
Vue.component("success", Success);


//Register Date Pick component
Vue.component("DatePick", DatePick)


Vue.use(VueRouter); //enable each component to have acces to the router


//Enable Vuex for Global State
Vue.use(Vuex);


// Create a new store instance.
const store = new Vuex.Store(storeDefinition);
// const store = new Vuex.Store({
//     state () {
//       return {
//         count: 0,
//         name: 'john'
//       }
//     },
//     mutations: {
//       increment (state) {
//         console.log(state);
//         state.count++
//         console.log(state);
//       },

//       changeName(state, payload){
//         state.name = payload;
//       }
//     }
//   })
//   //Change the state
//   store.commit('increment')
//   console.log(store.state.count) // -> 1

//   store.commit('changeName', 'Isaac')
//   console.log(store.state.name)

//console.log(store.state)



//Handle authentication if response 401 dispatch logout 
//(if session has expired, no cookies)
window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (401 === error.response.status) {
            store.dispatch("logout");
        }

        return Promise.reject(error);
    }
);


const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        index: Index
    },

    //Load state from local storage after refresh
    async beforeCreate(){
        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadUser");


        // //Test authentication
        // await axios.get('/sanctum/csrf-cookie');
        // await axios.post("/login", {
        //     email: 'lesch.leilani@example.org',
        //     password: 'password'
        // });
        // await axios.get('user');


    },

});
