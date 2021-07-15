import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Register from '@/public/Register.vue'
import Login from '@/public/Login.vue'
import Secure from '@/secure/Secure.vue'
import Dashboard from '@/secure/dashboard/Dashboard.vue'
import Users from '@/secure/user/Users.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    component: Secure,
    children: [
      {path: '', component: Dashboard},
      {path: '/users', component: Users}
    ]
  },
  {
    path: '/login',
    component: Login,
  },
  {
    path: '/register',
    component: Register,
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
