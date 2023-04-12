import Vue from 'vue'
import VueRouter from 'vue-router';

Vue.use(VueRouter);
let routes = [
    {
        path: '/',
        component: () => import('./pages/index.vue'),
        meta: {layout: 'main'}
    },
    {
        path: '/employer',
        component: () => import('./pages/employer/index.vue'),
        meta: {layout: 'main'}
    },
    {
        path: '/question',
        component: () => import('./pages/question/index.vue'),
        meta: {layout: 'main'}
    },
    {
        path: '/legal-data',
        component: () => import('./pages/legal-data/index.vue'),
        meta: {layout: 'main'}
    },
    {
        path: '/support',
        component: () => import('./pages/support.vue'),
        meta: {layout: 'main'}
    },
    // {
    //     path: '*',
    //     redirect: '/404'
    // }
];
const router = new VueRouter({
    routes, mode: 'history',
    linkActiveClass: "-active",
});
router.beforeEach((to, from, next) => {
    next();
})
export default router;
