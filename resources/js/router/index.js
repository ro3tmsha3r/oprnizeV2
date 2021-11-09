import { createRouter, createWebHashHistory } from "vue-router";

import DashboardLayout from "../layout/DashboardLayout";
// import AuthLayout from "@/layout/AuthLayout";

import Dashboard from "../views/Dashboard.vue";
// import Icons from "../views/Icons.vue";
// import Maps from "../views/Maps.vue";
// import Profile from "../views/UserProfile.vue";
import Employees from "../views/Employees.vue";
import PayrollTable from "../views/PayrollTable.vue"
import Transactions from "../views/Transactions.vue"
import AddNewEmployee from '../views/AddNewEmployee.vue'
import personalInfo from '../views/personalInfo.vue'
import DepartmentInfo from '../views/DepartmentInfo.vue'
import JobInformation from '../views/JobInformation.vue'
import Compinsation from '../views/Compinsation.vue'
import Vacations from '../views/Vacations.vue'
import Review from '../views/Review.vue'

// Settings
import Settings from '../views/Settings/Settings.vue'
import Nationalities from "../views/Settings/Nationalities.vue";
import Cities from "../views/Settings/Cities.vue";
import Allowances from "../views/Settings/Allowances.vue";
import Departments from "../views/Settings/Departments.vue";
import Sections from "../views/Settings/Sections.vue";
import JobTitles from "../views/Settings/JobTitles.vue";




import Login from "../views/auth/Login.vue";
import Signup from "../views/auth/Signup.vue";

const routes = [
  {
    path: "/dashboard",
    redirect: "/home",
    component: DashboardLayout,
    children: [
      {
        path: "/Home",
        name: "dashboard",
        components: { default: Dashboard },
      },
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
      },
      {
        path: "/PayrollTable",
        name: "PayrollTable",
        components: { default: PayrollTable },
      },
      {
        path: "/Transactions",
        name: "Transactions",
        components: { default: Transactions },
      },
      {
        path: "/Vacations",
        name: "Vacations",
        components: { default: Vacations },
      },
      {
        path: "/Settings",
        name: "Settings",
        components: { default: Settings },
        children: [
          {
            path: "Nationalities",
            name: "Nationalities",
            components: { default: Nationalities },
          },
          {
            path: "Cities",
            name: "Cities",
            components: { default: Cities },
          },
          {
            path: "Allowances",
            name: "Allowances",
            components: { default: Allowances },
          },
          {
            path: "Departments",
            name: "Departments",
            components: { default: Departments },
          },
          {
            path: "Sections",
            name: "Sections",
            components: { default: Sections },
          },
          {
            path: "JobTitles",
            name: "JobTitles",
            components: { default: JobTitles },
          },
        ],
      },
    ],
  },
  {
    path: "/",
    name: "Login",
    // redirect: "/login",
    component: Login,
    // children: [
    //   {
    //     path: "/",
    //     name: "login",
    //     components: { default: Login },
    //   },
    // ]
  },
  {
    path: "/Signup",
    name: "Signup",
    components: { default: Signup },
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  linkActiveClass: "active",
  routes,
});

export default router;
