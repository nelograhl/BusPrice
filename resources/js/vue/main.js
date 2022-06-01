import { createApp } from "vue"

window.Vue = require('vue');

import App from "./App.vue";

import VueAxios from 'vue-axios';
import axios from 'axios';

import { createRouter,createWebHistory } from 'vue-router'


const Home = () => import('./components/Home.vue')


/* Bus components */
const Buses = () => import('./components/bus/Buses.vue')
const Create = () => import('./components/bus/Create.vue')
const Edit = () => import('./components/bus/Edit.vue')


/* */
const Config = () => import('./components/config/Config.vue')

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'buses',
        path: '/buses',
        component: Buses
    },
    {
        name: 'createBus',
        path: '/buses/create',
        component: Create
    },
    {
        name: 'editBus',
        path: '/buses/Edit',
        component: Edit
    },
    {
        name: 'config',
        path: '/config',
        component: Config
    }
    
];

//Vue.use(VueRouter);
//Vue.use(VueAxios, axios);

const router = createRouter({
    history: createWebHistory(),    
    routes: routes
})

createApp(App)
.use(router)
.use(VueAxios, axios)
.mount('#app')