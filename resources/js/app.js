/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

//----------------- Toster Message Start ----------------


//----------------- Vee Form start -----------------------

import {ValidationObserver, ValidationProvider,extend} from "vee-validate";
import { required,email,min,confirmed } from 'vee-validate/dist/rules';

extend('email',email);
extend('min',min);
extend('confirmed',confirmed);

extend('min', {
    ...min,
    message: 'Your password must be 8 character'
});
extend('confirmed', {
    ...confirmed,
    message: 'Your password Does not match '
});

extend('required', {
    ...required,
    message: 'This field is required'
});
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'

Vue.use(Toaster, {timeout: 5000})

// Register it golobally
Vue.component('ValidationObserver',ValidationObserver);
Vue.component('ValidationProvider',ValidationProvider);

//---------------- Vee Form End  -----------------------
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('welcome-component', require('./components/WelcomeComponent').default);
Vue.component('navbar-component', require('./components/NavbarComponent').default);
Vue.component('banner-component', require('./components/BannerComponent').default);
Vue.component('footer-component', require('./components/FooterComponent').default);
Vue.component('login-component', require('./components/LoginComponent').default);
Vue.component('register-component', require('./components/RegisterComponent').default);


//Dashboard all Component
Vue.component('dashboard-component', require('./components/DashboardComponent').default);
Vue.component('sidebar-component', require('./components/SidebarComponent').default);
Vue.component('nav-component', require('./components/backend/NavbarComponent').default);
Vue.component('backend-footer-component',require('./components/backend/FooterComponent').default)
Vue.component('profile-component',require('./components/backend/ProfileComponent').default)
Vue.component('user-list-component',require('./components/backend/UsarListComponent').default)

//Link Component
Vue.component('link-component',require('./components/backend/LinkComponent').default)

//Web Settings Component
Vue.component('setting-component',require('./components/backend/SettingComponent').default)

// App Setting
Vue.component('app-setting-component',require('./components/backend/AppSettingComponent').default)

//pagination Component
Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

});
