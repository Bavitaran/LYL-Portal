export default [
  {
    path: "/report",
    name: "report-management",
    component: () => import("@/views/reportManagement/reportDashboard.vue"),
    meta: { requiresAuth: true }
  },
];
