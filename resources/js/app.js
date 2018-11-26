require('./bootstrap');
import Buefy from 'buefy';

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
Vue.use(Buefy,{defaultIconPack: 'fa'}, VueRouter, axios);

//Layout
import AppLayout from './components/applayout.vue';
import HomeLayout from './components/layout/homelayout.vue';
import Dashboard from './components/layout/homelayout.vue';
//Home
import Register from './components/home/register.vue';
import LogIn from './components/home/login.vue';
import Contact from './components/home/contact.vue';
//import Modal from './components/book/ProductModal.vue';
//Item
import Hair from './components/item/hair.vue';
import Cosmetic from './components/item/cosmetic.vue';
import Body from './components/item/body.vue';
//Profile
import Profile from './components/profile/profile.vue';
//Book
import Book from './components/book/create.vue';
import ListBook from './components/book/read.vue';
import EditBook from './components/book/update.vue';
//Feedback
import Feedback from './components/feedback/create.vue';
import ViewFeedback from './components/feedback/read.vue';
import EditFeedback from './components/feedback/update.vue';

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
            name: 'Dashboard',
            path: '/dashboard',
            component: Dashboard
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
            name: 'Contact',
            path: '/contact',
            component: Contact
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
        },
        {
            name: 'ViewFeedback',
            path: '/viewFeedback',
            component: ViewFeedback
        },
        {
            name: 'EditFeedback',
            path: '/editFeedback',
            component: EditFeedback
        },
        {
            name: 'Profile',
            path: '/profile',
            component: Profile
        },
        {
            name: 'ListBook',
            path: '/listBook',
            component: ListBook
        },
        {
            name: 'EditBook',
            path: '/edit/:id',
            component: EditBook
        }
        // {
        //     name: 'Moodal',
        //     path: '/ProductModal',
        //     component: Modal
        // }
    ]
})

const app = new Vue({
    el: '#app',
    components: {AppLayout},
    router,
});

