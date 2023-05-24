export default [
    {
        path: '/documents',
        name: 'document-management',
        component: () => import('@/views/documents/FileManagement.vue'),
        meta: { requiresAuth: true }
    }
]