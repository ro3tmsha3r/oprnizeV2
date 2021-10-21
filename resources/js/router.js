import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import login from './views/auth/login.vue'
import signup from './views/auth/signup.vue'

const routes = [
    {
        path: '/login',
        component: login,
    },
    {
        path: '/signup',
        component: signup,
    },
]

export default new Router({
    mode: 'history',
    routes
})