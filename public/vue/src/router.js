import {createRouter, createWebHistory} from 'vue-router'
import SignIn from './pages/SignIn.vue'
import SignUp from './pages/SignUp.vue'
import Home from './pages/home.vue'
import Dashboard from './pages/dashboard.vue'
import UserList from './pages/UserManagement/List.vue'
import OpportunityList from './pages/OpportuinityManagement/List.vue'

const routerHistory = createWebHistory()

const router = createRouter({
    history: routerHistory,
    routes: [
        {
            path: '/',
            name: 'home-page',
            component: Home
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true
            },
        },
        {
            path: '/user-management',
            name: 'user-management',
            component: UserList,
            meta: {
                requiresAuth: true
            },
        },
        {
            path: '/opportunity-management',
            name: 'opportunity-management',
            component: OpportunityList,
            meta: {
                requiresAuth: true
            },
        },
        {
            path: '/sign-in',
            name: "sign-in",
            component: SignIn
        },
        {
            path: '/sign-up',
            name: "sign-up",
            component: SignUp
        },
    ]
})

export default router
