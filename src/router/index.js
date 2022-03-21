import { createRouter, createWebHashHistory } from 'vue-router';
import Home from '../pages/Home.vue';
import Other from '../pages/Other.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/other',
        name: 'Other',
        component: Other
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;
