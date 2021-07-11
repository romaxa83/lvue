import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Register from '@/public/Register.vue'
import Login from '@/public/Login.vue'
// import Home from '../views/Home.vue'

const routes: Array<RouteRecordRaw> = [
  // {
  //   path: '/',
  //   name: 'Home',
  //   component: Home
  // },
  {
    path: '/register',
    component: Register,
  },
  {
    path: '/login',
    component: Login,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
