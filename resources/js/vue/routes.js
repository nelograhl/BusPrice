const Home = () => import('./components/Home.vue')

/* Bus components */
const Create = () => import('./components/bus/Create.vue')

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'showBuses',
        path: '/buses',
        component: Home
    },
    {
        name: 'createBus',
        path: '/Create',
        component: Home
    }
];

export default routes;