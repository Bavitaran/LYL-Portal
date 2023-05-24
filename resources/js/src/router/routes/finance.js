export default [
  {
    path: "/finance-invoice",
    name: "finance-invoice",
    component: () => import("@/views/finance/financeinvoice.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/finance-oustanding",
    name: "finance-outstanding",
    component: () => import("@/views/finance/financeoutstanding.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/finance-others",
    name: "finance-others",
    component: () => import("@/views/finance/financeothers.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-invoice",
    name: "add-invoice",
    component: () => import("@/views/finance/Addinvoice.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-outstanding",
    name: "add-outstanding",
    component: () => import("@/views/finance/addOutstanding.vue"),
    meta: { requiresAuth: true }
  },
{
    path: "/add-others",
    name: "add-others",
    component: () => import("@/views/finance/addOthers.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-invoice/:id",
    name: "edit-invoice",
    component: () => import("@/views/finance/editInvoice.vue"),
    meta: { requiresAuth: true }
  },

  //*==================USER====================*///
  {
    path: "/finance",
    name: "user-finance",
    component: () => import("@/views/finance/user/finance.vue"),
    meta: { requiresAuth: true }
  }
];
