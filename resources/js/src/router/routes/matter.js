export default [
{
    path: '/matter',
    name: 'matter-management',
    component: () => import('@/views/matterManagement/MatterDashboard.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/add-matter',
    name: 'new-matter',
    component: () => import('@/views/matterManagement/addMatter.vue'),
    meta: { requiresAuth: true }
  },
]