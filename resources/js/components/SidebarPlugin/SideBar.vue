<template>
  <nav
    class="navbar navbar-vertical fixed-left navbar-expand-md bg-white"
    id="sidenav-main"
  >
    <div class="container-fluid">
      <!--Toggler-->
      <navbar-toggle-button @click="showSidebar">
        <span class="navbar-toggler-icon"></span>
      </navbar-toggle-button>
      <router-link class="navbar-brand" to="/">
        <img :src="logo" class="navbar-brand-img" alt="..." />
      </router-link>

      <slot name="mobile-right">
        <ul class="nav align-items-center d-md-none">
          <base-dropdown class="nav-item" position="right">
            <template v-slot:title>
              <a
                class="nav-link nav-link-icon"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="ni ni-bell-55"></i>
              </a>
            </template>

            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </base-dropdown>
          <base-dropdown class="nav-item" position="right">
            <template v-slot:title>
              <a class="nav-link" href="#" role="button">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img
                      alt="Image placeholder"
                      src="img/theme/team-1-800x800.jpg"
                    />
                  </span>
                </div>
              </a>
            </template>

            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <router-link to="/profile" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </router-link>
            <router-link to="/profile" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </router-link>
            <router-link to="/profile" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </router-link>
            <router-link to="/profile" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </router-link>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </base-dropdown>
        </ul>
      </slot>
      <slot></slot>
      <div
        v-show="$sidebar.showSidebar"
        class="navbar-collapse collapse show"
        id="sidenav-collapse-main"
      >
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <router-link to="/">
                <img :src="logo" />
              </router-link>
            </div>
            <div class="col-6 collapse-close">
              <navbar-toggle-button
                @click="closeSidebar"
              ></navbar-toggle-button>
            </div>
          </div>
        </div>
        <!-- <ul class="navbar-nav">
          <slot name="links"> </slot>
        </ul> -->
        <!-- General -->
        <h6 class="navbar-heading text-muted">General</h6>
        <!--Navigation-->
        <ul class="navbar-nav smb-md-3">
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-spaceship"></i> Home
            </a>
          </li>
        </ul>

        <!--Employees-->
        <h6 class="navbar-heading text-muted">Employees</h6>
        <!--Navigation-->
        <ul class="navbar-nav smb-md-3">
          <li class="nav-item">
            <router-link
              to = "/Employees"
              class="nav-link"
            >
              <i class="ni ni-spaceship"></i> Employees
            </router-link>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-palette"></i> Requests
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-ui-04"></i> Structure
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-ui-04"></i> Employees Services
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-ui-04"></i> Employees Violations
            </a>
          </li>
        </ul>

        <!--Attendance-->
        <h6 class="navbar-heading text-muted">Attendance</h6>
        <!--Navigation-->
        <ul class="navbar-nav smb-md-3">
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-spaceship"></i> Shifts
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-palette"></i> Time Sheet
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-ui-04"></i> Vacations
            </a>
          </li>
        </ul>

        <!--Payroll-->
        <h6 class="navbar-heading text-muted">Payroll</h6>
        <!--Navigation-->
        <ul class="navbar-nav smb-md-3">
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-spaceship"></i> Payroll Table
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-palette"></i> Payment Processing
            </a>
          </li>
        </ul>
        <!--Divider-->
        <hr class="my-3" />
        <ul class="navbar-nav smb-md-3">
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-spaceship"></i> Reports
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
            >
              <i class="ni ni-palette"></i> Settings
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
</template>
<script>
import NavbarToggleButton from "../../components/NavbarToggleButton.vue";

export default {
  name: "sidebar",
  components: {
    NavbarToggleButton,
  },
  props: {
    logo: {
      type: String,
      default: "img/brand/green.png",
      description: "Sidebar app logo",
    },
    autoClose: {
      type: Boolean,
      default: true,
      description:
        "Whether sidebar should autoclose on mobile when clicking an item",
    },
  },
  provide() {
    return {
      autoClose: this.autoClose,
    };
  },
  methods: {
    closeSidebar() {
      this.$sidebar.displaySidebar(false);
    },
    showSidebar() {
      this.$sidebar.displaySidebar(true);
    },
  },
  beforeUnmount() {
    if (this.$sidebar.showSidebar) {
      this.$sidebar.showSidebar = false;
    }
  },
};
</script>
