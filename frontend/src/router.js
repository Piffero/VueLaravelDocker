import { createWebHistory, createRouter } from "vue-router";

const routes =  [
  {
    path: "/",
    alias: '/customers',
    name: "home",
    component: () => import("./components/customers/CustomerGrid")
  },
  {
    path: "/customers/:id/edit",
    name: "customers-edit",
    component: () => import("./components/customers/CustomerEdit")
  },
  {
    path: "/customers/add",
    name: "add",
    component: () => import("./components/customers/CustomerAdd")
  },
  {
    path: "/customers/upload",
    name: "upload",
    component: () => import("./components/customers/CustomerUpload")
  },
  {
    path: "/:pathMatch(.*)*",
    name: "page-not-found",
    component: () => import("./views/PageNotFound")
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;