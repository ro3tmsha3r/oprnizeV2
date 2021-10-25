import { createRouter, createWebHashHistory } from "vue-router";

import DashboardLayout from "../layout/DashboardLayout";
// import AuthLayout from "@/layout/AuthLayout";

import Dashboard from "../views/Dashboard.vue";
// import Icons from "../views/Icons.vue";
// import Maps from "../views/Maps.vue";
// import Profile from "../views/UserProfile.vue";
import Employees from "../views/Employees.vue";
import AddNewEmployee from '../views/AddNewEmployee.vue'
import personalInfo from '../views/personalInfo.vue'
import DepartmentInfo from '../views/DepartmentInfo.vue'
import JobInformation from '../views/JobInformation.vue'
import Compinsation from '../views/Compinsation.vue'
import Review from '../views/Review.vue'





// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";

const routes = [
  {
    path: "/",
    redirect: "/dashboard",
    component: DashboardLayout,
    children: [
      {
        path: "/dashboard",
        name: "dashboard",
        components: { default: Dashboard },
      },
  //     {
  //       path: "/icons",
  //       name: "icons",
  //       components: { default: Icons },
  //     },
  //     {
  //       path: "/maps",
  //       name: "maps",
  //       components: { default: Maps },
  //     },
      {
        path: "/AddNewEmployee",
        name: "AddNewEmployee",
        components: { default: AddNewEmployee },
        children: [
              {
                path: "personalInfo",
                name: "personalInfo",
                components: { default: personalInfo },
              },
              {
                path: "DepartmentInfo",
                name: "DepartmentInfo",
                components: { default: DepartmentInfo },
              },
              {
                path: "JobInformation",
                name: "JobInformation",
                components: { default: JobInformation },
              },
              {
                path: "Compinsation",
                name: "Compinsation",
                components: { default: Compinsation },
              },
              {
                path: "Review",
                name: "Review",
                components: { default: Review },
              },
            ],
      },
      {
        path: "/Employees",
        name: "Employees",
        components: { default: Employees },
        // children: [
        //       {
        //         path: "add",
        //         name: "AddNewEmployee",
        //         components: { default: AddNewEmployee },
        //       },
        //     ],
      },
    ],
  // },
  // {
  //   path: "/",
  //   redirect: "login",
  //   component: AuthLayout,
  //   children: [
  //     {
  //       path: "/login",
  //       name: "login",
  //       components: { default: Login },
  //     },
  //     {
  //       path: "/register",
  //       name: "register",
  //       components: { default: Register },
  //     },
  //   ],
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  linkActiveClass: "active",
  routes,
});

export default router;
