export default [
  {
    path: "/finance",
    name: "finance",
    component: () => import("@/views/finance/finance.vue"),
    meta: { requiresAuth: true }
  }
];
