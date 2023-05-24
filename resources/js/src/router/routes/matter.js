export default [
  {
    path: "/matter",
    name: "matter-management",
    component: () => import("@/views/matterManagement/MatterDashboard.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matter",
    name: "new-matter",
    component: () => import("@/views/matterManagement/addMatter.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-matter/:id",
    name: "edit-matter",
    component: () => import("@/views/matterManagement/editMatter.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter/:id",
    name: "view-matter",
    component: () => import("@/views/matterManagement/MatterView.vue"),
    meta: { requiresAuth: true }
  }
];
