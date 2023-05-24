export default [
  {
    path: '/database',
    name: 'database-management',
    component: () => import('@/views/database/DatabaseDashboard.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/database/new-party',
    name: 'database-management-newparty',
    component: () => import('@/views/database/AddNewParty.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/database/edit-party',
    name: 'database-management-editparty',
    component: () => import('@/views/database/EditParty.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/database/view-party',
    name: 'database-management-viewparty',
    component: () => import('@/views/database/ViewParty.vue'),
    meta: { requiresAuth: true }
  }
]
