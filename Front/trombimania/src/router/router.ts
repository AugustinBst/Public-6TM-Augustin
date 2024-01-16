import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Home',
    component: () => import('@/views/Home.vue'),
  },
  {
    path: '/',
    redirect: '/home',
  }
  // Other routes...
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;