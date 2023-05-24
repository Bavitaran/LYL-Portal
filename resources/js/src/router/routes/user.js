export default [
  {
    path: '/user',
    name: 'user-management',
    component: () => import('@/views/apps/user/users-list/UsersList.vue'),
    meta: { requiresAuth: true }
  },
]
