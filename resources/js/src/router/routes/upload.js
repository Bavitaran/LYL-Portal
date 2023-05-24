export default [
  {
    path: "/upload",
    name: "upload",
    component: () => import("@/views/upload/upload.vue"),
    meta: { requiresAuth: true }
  }
];
