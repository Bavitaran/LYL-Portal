export default [
  {
    path: "/mail-track",
    name: "mail-track",
    component: () => import("@/views/mail-track/mail-track.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-mail-track",
    name: "new-mail",
    component: () => import("@/views/mail-track/addMail.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-mail/:id",
    name: "edit-mail",
    component: () => import("@/views/mail-track/editMail.vue"),
    meta: { requiresAuth: true }
  }
];
