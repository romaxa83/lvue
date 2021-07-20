import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Register from '@/public/Register.vue'
import Login from '@/public/Login.vue'
import Secure from '@/secure/Secure.vue'
import Dashboard from '@/secure/dashboard/Dashboard.vue'
import Users from '@/secure/user/Users.vue'
import UserCreate from '@/secure/user/UserCreate.vue'
import UserEdit from '@/secure/user/UserEdit.vue'
import Roles from '@/secure/role/Roles.vue'
import RoleCreate from '@/secure/role/RoleCreate.vue'
import RoleEdit from '@/secure/role/RoleEdit.vue'
import Products from '@/secure/product/Products.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '',
    component: Secure,
    children: [
      {path: '', redirect: '/dashboard'},
      {path: '/dashboard', component: Dashboard},
      {path: '/users', component: Users},
      {path: '/users/create', component: UserCreate},
      {path: '/users/:id/edit', component: UserEdit},
      {path: '/roles', component: Roles},
      {path: '/roles/create', component: RoleCreate},
      {path: '/roles/:id/edit', component: RoleEdit},
      {path: '/products', component: Products}
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
