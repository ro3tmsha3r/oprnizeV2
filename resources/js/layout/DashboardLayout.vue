<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      :background-color="sidebarBackground"
      short-title="Argon"
      title="Argon"
    >
      <template v-slot:links>
        <h5 class="navbar-heading pl-2 text-black font-weight-800 text-capitalize text-md-left">General</h5>
        <sidebar-item
          :link="{
            name: 'Home',
            icon: 'fa fa-home',
            path: '/Home',
          }"
        />
        <h5 class="navbar-heading pl-2 text-black font-weight-800 text-capitalize text-md-left">Employees</h5>
        <sidebar-item
          :link="{
            name: 'Employees',
            icon: 'fa fa-users',
            path: '/Employees',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Requests',
            icon: 'ni ni-ungroup',
            path: '/AddNewEmployee',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Structure',
            icon: 'fa fa-sitemap',
            path: '/Structure',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Employees Services',
            icon: 'ni ni-ui-04',
            path: '/EmployeesServices',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Employees Violations',
            icon: 'fa fa-exclamation-triangle',
            path: '/EmployeesViolations',
          }"
        />
        <h5 class="navbar-heading pl-2 text-black font-weight-800 text-capitalize text-md-left">Attendance</h5>
        <sidebar-item
          :link="{
            name: 'Shifts',
            icon: 'ni ni-time-alarm',
            path: '/Shifts',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Time Sheet',
            icon: 'ni ni-single-copy-04',
            path: '/TimeSheet',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Vacations',
            icon: 'ni ni-calendar-grid-58',
            path: '/Vacations',
          }"
        />
        <h5 class="navbar-heading pl-2 text-black font-weight-800 text-capitalize text-md-left">Payroll</h5>
        <sidebar-item
          :link="{
            name: 'Payroll Table',
            icon: 'ni ni-money-coins',
            path: '/PayrollTable',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Transactions',
            icon: 'ni ni-money-coins',
            path: '/Transactions',
          }"
        />
        <sidebar-item
          :link="{
            name: 'Payment Processing',
            icon: 'fa fa-tasks',
            path: '/PaymentProcessing',
          }"
        />
      </template>
    </side-bar>
    <div class="main-content " :data="sidebarBackground">
      <dashboard-navbar></dashboard-navbar>

      <div @click="toggleSidebar">
        <!-- your content here -->
        <router-view></router-view>
        <!-- <content-footer v-if="!$route.meta.hideFooter"></content-footer> -->
      </div>
    </div>
  </div>
</template>
<script>
import DashboardNavbar from "./DashboardNavbar.vue";
import ContentFooter from "./ContentFooter.vue";

export default {
  components: {
    DashboardNavbar,
    ContentFooter,
  },
  data() {
    return {
      sidebarBackground: "vue", //vue|blue|orange|green|red|primary
    };
  },
  methods: {
    toggleSidebar() {
      if (this.$sidebar.showSidebar) {
        this.$sidebar.displaySidebar(false);
      }
    },
  },
};
</script>
<style lang="scss"></style>
