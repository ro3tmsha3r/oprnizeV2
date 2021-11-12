<template>
  <div>
    <!-- <base-header type="white" class="pb-2 pb-2 pt-5 pt-md-6"> </base-header> -->
    <div class="row">
      <div class="bg-white col-lg-2 ml-3 pl-0 pr-0" style="min-width: 200px">
        <nav class="navbar navbar-vertical justify-content-center">
            <!-- <el-steps :active="active" finish-status="success"> -->
              <!-- Employees -->
              <h6 class="navbar-heading text-muted px-3">Employees</h6>
              <!--Navigation-->
              <div class="employee-info">
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/AddNewEmployee/PersonalInfo"
                    >
                      <i class="fa fa-id-card"></i>
                      <span> Personal Info </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/AddNewEmployee/DepartmentInfo"
                    >
                      <i class="ni ni-building"></i>
                      <span> Department Info </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/AddNewEmployee/JobInformation"
                    >
                      <i class="ni ni-briefcase-24"></i>
                      <span> Job Information </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link
                      class="nav-link"
                      to="/AddNewEmployee/Compinsation"
                    >
                      <i class="ni ni-money-coins"></i>
                      <span> Compinsation </span>
                      <!-- <el-step></el-step> -->
                    </router-link>
                  </li>
                </ul>
                <ul class="navbar-nav smb-md-3">
                  <li class="nav-item">
                    <router-link class="nav-link" to="/AddNewEmployee/Review">
                      <i class="ni ni-spaceship"></i>
                      <span> Review </span>
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
