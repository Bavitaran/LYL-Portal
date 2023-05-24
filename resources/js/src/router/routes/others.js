export default [
  {
    path: '/access-control',
    name: 'access-control',
    component: () => import('@/views/extensions/acl/AccessControl.vue'),
    meta: {
      requiresAuth: true,
      resource: 'ACL',
      action: 'read',
    },
  },
]
