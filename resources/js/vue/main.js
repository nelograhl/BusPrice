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

/* Registros components */
const Registros = () => import('./components/registrop/List.vue')
const RegistroCreate = () => import('./components/registrop/Create.vue')
const RegistroEdit = () => import('./components/registrop/Edit.vue')

/* Tipos de Mantenimiento components */
const TipoMant = () => import('./components/tipomant/List.vue')
const TipoMantCreate = () => import('./components/tipomant/Create.vue')
const TipoMantEdit = () => import('./components/tipomant/Edit.vue')

/* Tramos components */
const Tramos = () => import('./components/tramo/List.vue')
const TramoCreate = () => import('./components/tramo/Create.vue')
const TramoEdit = () => import('./components/tramo/Edit.vue')

/* Coeficientes components */
const Coeficientes = () => import('./components/coefconsumo/Coefconsumo.vue')

/* Tasas e Impuestos components */
const TasasImpuestos = () => import('./components/tasasimpuestos/Tasasimpuestos.vue')

/* Datos Operacionales components */
const DatosOperacionales = () => import('./components/datosoperacionales/DatosOperacionales.vue')

/* */
const Config = () => import('./components/config/Config.vue')

/* Costos components*/
const Costos = () => import('./components/costos/Costos.vue')

/* Insumos components*/
const Insumos = () => import('./components/insumos/Insumos.vue')


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
    },
    {
        name: 'registrosp',
        path: '/registrosp',
        component: Registros
    },
    {
        name: 'crearRegistro',
        path: '/crearregistro',
        component: RegistroCreate
    },
    {
        name: 'editarRegistro',
        path: '/editarregistro',
        component: RegistroEdit
    },
    {
        name: 'tipomant',
        path: '/tipomant',
        component: TipoMant
    },
    {
        name: 'crearTipoMant',
        path: '/tipomant/create',
        component: TipoMantCreate
    },
    {
        name: 'editarTipoMant',
        path: '/tipomant/edit',
        component: TipoMantEdit
    },
    {
        name: 'tramos',
        path: '/tramos',
        component: Tramos
    },
    {
        name: 'crearTramo',
        path: '/tramos/create',
        component: TramoCreate
    },
    {
        name: 'editarTramo',
        path: '/tramos/edit',
        component: TramoEdit
    },
    {
        name: 'coeficientes',
        path: '/coeficientes',
        component: Coeficientes
    },    
    {
        name: 'costos',
        path: '/costos',
        component: Costos
    },    
    {
        name: 'tasasimpuestos',
        path: '/tasasimpuestos',
        component: TasasImpuestos
    },    
    {
        name: 'datosoperacionales',
        path: '/datosoperacionales',
        component: DatosOperacionales
    },
    {
        name: 'insumos',
        path: '/insumos',
        component: Insumos
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