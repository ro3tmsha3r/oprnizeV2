<template>
  <div>
    <base-header type="white" class="pb-2 pb-2 pt-5 pt-md-6"> </base-header>
    <div class="container-fluid">
      <nav class="navbar navbar-vertical navbar-light bg-white add-Employe">
        <div class="">
          <!-- Employees -->
          <h6 class="navbar-heading text-muted">Employees</h6>
          <!--Navigation-->
          <ul class="navbar-nav smb-md-3">
            <li class="nav-item">
              <router-link class="nav-link" to="/AddNewEmployee/PersonalInfo">
                <i class="ni ni-spaceship"></i> 
                <span> Personal Info </span>
              </router-link>
            </li>
          </ul>
          <ul class="navbar-nav smb-md-3">
            <li class="nav-item">
              <router-link class="nav-link" to="/AddNewEmployee/DepartmentInfo">
                <i class="ni ni-spaceship"></i> 
                <span> Department Info </span>
              </router-link>
            </li>
          </ul>
          <ul class="navbar-nav smb-md-3">
            <li class="nav-item">
              <router-link class="nav-link" to="/AddNewEmployee/JobInformation">
                <i class="ni ni-spaceship"></i> 
                <span> Job Information </span>
              </router-link>
            </li>
          </ul>
          <ul class="navbar-nav smb-md-3">
            <li class="nav-item">
              <router-link class="nav-link" to="/AddNewEmployee/Compinsation">
                <i class="ni ni-spaceship"></i> 
                <span> Compinsation </span>
              </router-link>
            </li>
          </ul>
          <ul class="navbar-nav smb-md-3">
            <li class="nav-item">
              <router-link class="nav-link" to="/AddNewEmployee/Review">
                <i class="ni ni-spaceship"></i> 
                <span> Review </span>
              </router-link>
            </li>
          </ul>
        </div>
      </nav>
        
    
    </div>
    <div class="container-fluid">
        <div class="col">
          <router-view></router-view>
        </div>
      <!-- </div> -->
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
