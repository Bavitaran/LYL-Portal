export default [
  {
    path: '/dashboard/analytics',
    name: 'dashboard-analytics',
    component: () => import('@/views/dashboard/analytics/Analytics.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/dashboard/ecommerce',
    name: 'dashboard-ecommerce',
    component: () => import('@/views/dashboard/ecommerce/Ecommerce.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/dashboard',
    name: 'dashboard-new',
    component: () => import('@/views/dashboard/new/DashboardNew.vue'),
    meta: { requiresAuth: true }
  },
]
