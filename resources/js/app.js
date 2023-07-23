import './bootstrap';

Vue.component('welcome-component', require('./components/WelcomeComponent.vue'));

const app = new Vue({
    el: '#app'
});
