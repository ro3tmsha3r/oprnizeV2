<template>
  <base-nav
    class="fixed top-0 inset-x-0 z-50 h-16 text-white bg-white"
    id="navbar-main"
    :show-toggle-button="false"
    expand
  >
    <form
      class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex"
    >
      <!-- <div class="form-group mb-0"> -->
        <base-input input-group-classes="input-group-merge" placeholder="Search" style="color: #B1B1B1; border: 0px!important;">
          <template v-slot:addonLeft><i class="fas fa-search" style="color: #B1B1B1" /></template>
        </base-input>
      <!-- </div> -->
    </form>
    <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
        <base-dropdown class="nav-link pr-0 " style="display: flex;">
          <template v-slot:title>
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img
                  alt="Image placeholder"
                  src="img/theme/team-4-800x800.jpg"
                />
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <h6 class="text-overflow m-0">Welcome!</h6>
                <span class="mb-0 text-sm font-weight-bold" style="color: #525f7f!important;">Jessica Jones</span>
              </div>
            </div>
            <div
              class="border-separate ml-3 mx-3"
              style="
                border-left: 1px solid #B1B1B1;
                height: 30px;
                margin-top: 3px;
                "
            />
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16" style="background: #eaf2fc 0% 0% no-repeat padding-box; opacity: 1; margin-top: 5px; border-radius: 40px;">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
              </svg>
            </div>
          </template>
          <!-- <div class="dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div> -->
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
          <router-link to="/profile" class="dropdown-item">
            <i class="ni ni-user-run"></i>
            <span>Logout</span>
          </router-link>
        </base-dropdown>
      </li>
    </ul>
  </base-nav>
</template>
<script>
export default {
  data() {
    return {
      activeNotifications: false,
      showMenu: false,
      searchQuery: "",
    };
  },
  methods: {
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    },
    hideSidebar() {
      this.$sidebar.displaySidebar(false);
    },
    toggleMenu() {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>

<style>
::placeholder { 
  color: #B1B1B1!important;
}

.navbar-search .input-group {
  background: #FAFBFD 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 10px 3px!important;
  opacity: 1!important;
}

.navbar-search-dark .input-group-text {
    color: #B1B1B1;
}
</style>
