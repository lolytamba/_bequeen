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
//Item
import Hair from './components/item/hair.vue';
import Item from './components/item/create.vue';
import Body from './components/item/body.vue';
import BuyItem from './components/item/read.vue';
import EditItem from './components/item/update.vue';
//Profile
import Profile from './components/profile/profile.vue';
import updateProfile from './components/profile/update.vue';
//Book
import Book from './components/book/create.vue';
import ListBook from './components/book/read.vue';
import EditBook from './components/book/update.vue';
//Feedback
import Feedback from './components/feedback/create.vue';
import ViewFeedback from './components/feedback/read.vue';
import EditFeedback from './components/feedback/update.vue';
//Job
import Job from './components/job/create.vue';
import ViewJob from './components/job/read.vue';
import UpdateJob from './components/job/update.vue';

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
            name: 'Item',
            path: '/create',
            component: Item
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
            path: '/profile/:id',
            component: Profile
        },
        {
            name: 'updateProfile',
            path: '/update/:id',
            component: updateProfile
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
        },
        {
            name: 'BuyItem',
            path: '/buy/:index',
            component: BuyItem
        },
        {
            name: 'EditItem',
            path: '/editItem/:id',
            component: EditItem
        },
        {
            name: 'Job',
            path: '/requirements',
            component: Job
        },
        {
            name: 'ViewJob',
            path: '/viewregist',
            component: ViewJob
        },
        {
            name: 'UpdateJob',
            path: '/editJob',
            component: UpdateJob
        }
    ]
})

const app = new Vue({
    el: '#app',
    components: {AppLayout},
    router,
});

