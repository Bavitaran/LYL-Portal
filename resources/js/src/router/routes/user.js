export default [
  {
    path: '/user',
    name: 'user-management',
    component: () => import('@/views/apps/user/users-list/UsersList.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/user/new-user',
    name: 'user-management-new',
    component: () => import('@/views/apps/user/users-list/UserListAddNew.vue'),
    meta: { requiresAuth: true }
  },
]
