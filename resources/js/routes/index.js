import {createRouter, createWebHistory} from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('@/views/MainPage.vue')
        },
        {
            path: '/catalog',
            component: () => import('@/views/Catalog.vue')
        },
        {
            path: '/catalog/:category',
            component: () => import('@/views/Catalog.vue')
        },
        {
            path: '/catalog/:category/:subcategory',
            component: () => import('@/views/SubCategory.vue')
        },
        {
            path: '/catalog/:category/:subcategory/:product',
            component: () => import('@/views/Product.vue')
        },
    ],
})

export default router

