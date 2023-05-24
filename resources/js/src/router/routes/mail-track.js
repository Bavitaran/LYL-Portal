export default [
  {
    path: "/mail-track",
    name: "mail-track",
    component: () => import("@/views/mail-track/mail-track.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-mail-track-in",
    name: "new-mail",
    component: () => import("@/views/mail-track/addMailIn.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-mail-track-out",
    name: "new-mail",
    component: () => import("@/views/mail-track/addMailOut.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-mail-in/:id",
    name: "edit-mail-in",
    component: () => import("@/views/mail-track/editMailIn.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-mail-out/:id",
    name: "edit-mail-out",
    component: () => import("@/views/mail-track/editMailOut.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/mail-desc/",
    name: "mail-desc",
    component: () => import("@/views/mail-track/mail-desc.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-mail-desc/",
    name: "new-mail-desc",
    component: () => import("@/views/mail-track/newMaildesc.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-mail-desc/",
    name: "edit-mail-desc",
    component: () => import("@/views/mail-track/editMaildesc.vue"),
    meta: { requiresAuth: true }
  },

  //*====================USER===================*//
  {
    path: "/mail-tracking",
    name: "user-mail-track",
    component: () => import("@/views/mail-track/user/mail-track.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-mail",
    name: "user-view-mail",
    component: () => import("@/views/mail-track/user/viewMail.vue"),
    meta: { requiresAuth: true }
  },
];
