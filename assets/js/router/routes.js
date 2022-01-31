import Home from '@/views/Home.vue';
const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/about',
        component: () => import(
            /* webpackChunkName: "contact" */
            "@/views/About.vue"
            )
    },
    {
        path: '/contact',
        component: () => import(
            /* webpackChunkName: "contact" */
            "@/views/Contact.vue"
            )
    },
    {
        path: '/shop',
        component: () => import(
            /* webpackChunkName: "shop" */
            "@/views/Shop.vue"
            )
    },
    {
        path: '/cart',
        component: () => import(
            /* webpackChunkName: "cart" */
            "@/views/Cart.vue"
            )
    },
    {
        path: '/not-found',
        alias: '*',
        component: {
            render: h => h('div', ['404! Page not found!'])
        }
    }

];

export default routes;