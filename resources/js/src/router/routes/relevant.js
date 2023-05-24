export default [
  {
    path: "/relevant",
    name: "relevant",
    component: () => import("@/views/relevant/relevant.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-relevant",
    name: "new-relevant",
    component: () => import("@/views/relevant/addRelevant.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-relevant/:id",
    name: "edit-relevant",
    component: () => import("@/views/relevant/editRelevant.vue"),
    meta: { requiresAuth: true }
  }
];
