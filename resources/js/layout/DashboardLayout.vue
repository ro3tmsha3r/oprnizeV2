<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      :background-color="sidebarBackground"
      short-title="Argon"
      title="Argon"
    >
      <template v-slot:links>
        <div style="display: flex;">
        <h5 class="navbar-heading px-2 text-black font-weight-800 text-capitalize text-md-left">General</h5>
        <div class="text-md-right px-2 pl-8">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" style="color: #007CC4" viewBox="0 0 16 16">
          <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>
        </div>
        </div>
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
