import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import HOME from '@/views/HomePage.vue'
import ADMIN from '@/views/AdminPage.vue'


const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Home',
    component: HOME,
  },
  {
    path: '/admin',
    name: 'Admin',
    component: ADMIN,
  }
  // Other routes...
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;