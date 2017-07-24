import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./components/Home')
    },
    {
        path: '/about',
        component: require('./components/About')
    },
    {
        path: '/contact',
        component: require('./components/Contact')
    },
    {
        path: '/create',
        component: require('./components/Form')
    }   
];

export default new VueRouter({    
    routes
});