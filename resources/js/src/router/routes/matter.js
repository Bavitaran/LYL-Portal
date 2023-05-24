export default [
  {
    path: "/matter",
    name: "matter-management",
    component: () => import("@/views/matterManagement/MatterDashboard.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matter-conveyancing",
    name: "new-matter-convey",
    component: () => import("@/views/matterManagement/Add/addMatterConveyancing.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matter-corporate",
    name: "new-matter-corporate",
    component: () => import("@/views/matterManagement/Add/addMatterCorporate.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matter-dispute",
    name: "new-matter-dispute",
    component: () => import("@/views/matterManagement/Add/addMatterDispute.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matter-intellectual",
    name: "new-matter-intellectual",
    component: () => import("@/views/matterManagement/Add/addMatterIntellectual.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matter-probate",
    name: "new-matter-probate",
    component: () => import("@/views/matterManagement/Add/addMatterProbate.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matter-will",
    name: "add-matter-will",
    component: () => import("@/views/matterManagement/Add/addMatterWill.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter/:id",
    name: "view-matter",
    component: () => import("@/views/matterManagement/MatterView.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-convey/:id",
    name: "view-matter-convey",
    component: () => import("@/views/matterManagement/View/viewMatterConveyancing.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-will/:id",
    name: "view-matter-will",
    component: () => import("@/views/matterManagement/View/viewMatterWill.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-probate/:id",
    name: "view-matter-probate",
    component: () => import("@/views/matterManagement/View/viewMatterProbate.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-corp/:id",
    name: "view-matter-corp",
    component: () => import("@/views/matterManagement/View/viewMatterCorp.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-intel/:id",
    name: "view-matter-intel",
    component: () => import("@/views/matterManagement/View/viewMatterIntel.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-dispute/:id",
    name: "view-matter-dispute",
    component: () => import("@/views/matterManagement/View/viewMatterDispute.vue"),
    meta: { requiresAuth: true }
  }, 
  {
    path: "/edit-matter-conveyancing/:id",
    name: "edit-matter-conveyancing",
    component: () => import("@/views/matterManagement/Edit/editMatterConvey.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-matter-will/:id",
    name: "edit-matter-will",
    component: () => import("@/views/matterManagement/Edit/editMatterWill.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-matter-probate/:id",
    name: "edit-matter-probate",
    component: () => import("@/views/matterManagement/Edit/editMatterProbate.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-matter-corp/:id",
    name: "edit-matter-corp",
    component: () => import("@/views/matterManagement/Edit/editMatterCorp.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-matter-intel/:id",
    name: "edit-matter-intel",
    component: () => import("@/views/matterManagement/Edit/editMatterIntel.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-matter-dispute/:id",
    name: "edit-matter-dispute",
    component: () => import("@/views/matterManagement/Edit/editMatterDispute.vue"),
    meta: { requiresAuth: true }
  },


  // *=============================USER============================*//
  {
    path: "/matter-dashboard",
    name: "matter-dashboard",
    component: () => import("@/views/matterManagement/User/UserMatterDashboard.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-convey/:id",
    name: "user-view-matter-convey",
    component: () => import("@/views/matterManagement/User/View/viewMatterConveyancing.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-will/:id",
    name: "user-view-matter-will",
    component: () => import("@/views/matterManagement/User/View/viewMatterWill.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-probate/:id",
    name: "user-view-matter-probate",
    component: () => import("@/views/matterManagement/User/View/viewMatterProbate.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-corp/:id",
    name: "user-view-matter-corp",
    component: () => import("@/views/matterManagement/User/View/viewMatterCorp.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-intel/:id",
    name: "user-view-matter-intel",
    component: () => import("@/views/matterManagement/User/View/viewMatterIntel.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/view-matter-dispute/:id",
    name: "user-view-matter-dispute",
    component: () => import("@/views/matterManagement/User/View/viewMatterDispute.vue"),
    meta: { requiresAuth: true }
  }
];
