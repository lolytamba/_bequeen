require('./bootstrap');
import Buefy from 'buefy';

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
Vue.use(Buefy,{defaultIconPack: 'fa'}, VueRouter, axios);

import AppLayout from './components/applayout.vue';
import HomeLayout from './components/layout/homelayout.vue';
import Register from './components/home/register.vue';
import LogIn from './components/home/login.vue';
import Hair from './components/shop/hair.vue';
import Cosmetic from './components/shop/cosmetic.vue';
import Body from './components/shop/body.vue';
import Book from './components/home/book.vue';
import Feedback from './components/home/feedback.vue';

Vue.config.productionTip = false;

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            name: 'HomeLayout',
            path: '/',
            component: HomeLayout
        },
        {
            name: 'Register',
            path: '/register',
            component: Register
        },
        {
            name: 'LogIn',
            path: '/login',
            component: LogIn
        },
        {
            name: 'Hair',
            path: '/hair',
            component: Hair
        },
        {
            name: 'Cosmetic',
            path: '/cosmetic',
            component: Cosmetic
        },
        {
            name: 'Body',
            path: '/body',
            component: Body
        },
        {
            name: 'Book',
            path: '/book',
            component: Book
        },
        {
            name: 'Feedback',
            path: '/feedback',
            component: Feedback
        }
    ]
})

const app = new Vue({
    el: '#app',
    components: {AppLayout},
    router,
});

//cek