<template>
  <div>
    <div class="row">
      <div class="bg-white col-lg-2 ml-3 pl-0 pr-0" style="min-width: 200px">
        <nav class="navbar navbar-vertical justify-content-center">
            <!-- <el-steps :active="active" finish-status="success"> -->
              <h6 class="navbar-heading text-muted px-3">Settings</h6>
              <div class="employee-info">
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/Settings/Nationalities"
                    >
                      <i class="fa fa-id-card"></i>
                      <span> Nationalities </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/Settings/Cities"
                    >
                      <i class="ni ni-building"></i>
                      <span> Cities </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/Settings/Allowances"
                    >
                      <i class="ni ni-money-coins"></i>
                      <span> Allowances </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link class="nav-link" to="/Settings/Departments">
                      <i class="ni ni-building"></i>
                      <span> Departments </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link class="nav-link" to="/Settings/Sections">
                      <i class="ni ni-spaceship"></i>
                      <span> Sections </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/Settings/JobTitles"
                    >
                      <i class="ni ni-briefcase-24"></i>
                      <span> Job titles </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
            <!-- </el-steps> -->
          </div>
        </nav>
      </div>
      <div class="col-lg-9 pt-3">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<style>
.navbar.navbar-vertical.navbar-light.bg-white.add-Employe {
  margin-left: -39px;
  width: 100%;
  max-width: 230px;
  display: block;
  position: fixed;
  top: 79px;
  bottom: 0;
}
.navbar-vertical {
  box-shadow: 0 0 0 0 !important;
}
</style>
