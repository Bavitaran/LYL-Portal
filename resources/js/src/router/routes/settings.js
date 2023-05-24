export default [
  {
    path: "/settings",
    name: "title-settings",
    component: () => import("@/views/settings/titlesetting/titlesetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-title-settings",
    name: "add-title",
    component: () => import("@/views/settings/titlesetting/addtitle.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-title-settings",
    name: "edit-title",
    component: () => import("@/views/settings/titlesetting/edittitle.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "tenure-settings",
    component: () => import("@/views/settings/tenuresetting/tenuresetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-tenure-settings",
    name: "add-tenure",
    component: () => import("@/views/settings/tenuresetting/addtenure.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-tenure-settings",
    name: "edit-tenure",
    component: () => import("@/views/settings/tenuresetting/edittenure.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "usage-settings",
    component: () => import("@/views/settings/usagesetting/usagesetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-usage-settings",
    name: "add-usage",
    component: () => import("@/views/settings/usagesetting/addusage.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-usage-settings",
    name: "edit-usage",
    component: () => import("@/views/settings/usagesetting/editusage.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "property-settings",
    component: () => import("@/views/settings/propertysetting/propertysetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-property-settings",
    name: "add-property",
    component: () => import("@/views/settings/propertysetting/addproperty.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-property-settings",
    name: "edit-property",
    component: () => import("@/views/settings/propertysetting/editproperty.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "unit-settings",
    component: () => import("@/views/settings/unitsetting/unitsetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-unit-settings",
    name: "add-unit",
    component: () => import("@/views/settings/unitsetting/addunit.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-unit-settings",
    name: "edit-unit",
    component: () => import("@/views/settings/unitsetting/editunit.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "trademark-settings",
    component: () => import("@/views/settings/trademarksetting/trademarksetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-trademark-settings",
    name: "add-trademark",
    component: () => import("@/views/settings/trademarksetting/addtrademark.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-trademark-settings",
    name: "edit-trademark",
    component: () => import("@/views/settings/trademarksetting/edittrademark.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "paymentmode-settings",
    component: () => import("@/views/settings/paymentmode/paymentmodesetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-paymentmode-settings",
    name: "add-paymentmode",
    component: () => import("@/views/settings/paymentmode/addpaymentmode.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-paymentmode-settings",
    name: "edit-paymentmode",
    component: () => import("@/views/settings/paymentmode/editpaymentmode.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "paymentfee-settings",
    component: () => import("@/views/settings/paymenttosetting/paymenttosetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-paymentfee-settings",
    name: "add-paymentfee",
    component: () => import("@/views/settings/paymenttosetting/addpaymentto.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-paymentfee-settings",
    name: "edit-paymentfee",
    component: () => import("@/views/settings/paymenttosetting/editpaymentto.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "assets-settings",
    component: () => import("@/views/settings/assetsetting/assetssetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-assets-settings",
    name: "add-assets",
    component: () => import("@/views/settings/assetsetting/addassets.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-assets-settings",
    name: "edit-assets",
    component: () => import("@/views/settings/assetsetting/editassets.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "assettype-settings",
    component: () => import("@/views/settings/assetsetting/assettypesetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-assetstype-settings",
    name: "add-assetstype",
    component: () => import("@/views/settings/assetsetting/addassetstype.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-assetstype-settings",
    name: "edit-assetstype",
    component: () => import("@/views/settings/assetsetting/editassetstype.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "relevant-settings",
    component: () => import("@/views/settings/relevantsetting/relevantsetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-relevant-settings",
    name: "add-relevant",
    component: () => import("@/views/settings/relevantsetting/addrelevant.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-relevant-settings",
    name: "edit-relevantname",
    component: () => import("@/views/settings/relevantsetting/editrelevant.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "relevanttype-settings",
    component: () => import("@/views/settings/relevantsetting/relevanttypesetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-relevanttype",
    name: "add-relevanttype",
    component: () => import("@/views/settings/relevantsetting/addrelevanttype.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-relevanttype-settings",
    name: "edit-relevanttype",
    component: () => import("@/views/settings/relevantsetting/editrelevanttype.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "matterstatus-settings",
    component: () => import("@/views/settings/matterstatussetting/matterstatussetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-matterstatus",
    name: "add-matterstatus",
    component: () => import("@/views/settings/matterstatussetting/addmatterstatus.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-matterstatus-settings",
    name: "edit-matterstatus",
    component: () => import("@/views/settings/matterstatussetting/editmatterstatus.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/settings",
    name: "role-settings",
    component: () => import("@/views/settings/rolesetting/rolesetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/add-role",
    name: "add-role",
    component: () => import("@/views/settings/rolesetting/addrolesetting.vue"),
    meta: { requiresAuth: true }
  },
  {
    path: "/edit-role-settings",
    name: "edit-role",
    component: () => import("@/views/settings/rolesetting/editrolesetting.vue"),
    meta: { requiresAuth: true }
  },
];