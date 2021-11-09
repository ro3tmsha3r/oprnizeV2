<template>
  <div class="p-2">
          <card class="card-info" shadow type="secondary">
            <template v-slot:header>
              <div class="bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Department Info</h3>
                  </div>
                </div>
              </div>
            </template>

            <form>
              <h6 class="heading-small text-muted mb-4">Department information</h6>
              <div class="pl-lg-12">
                <div class="row">
                  <div class="col-lg-12">
                    <label>Name Of Department</label> <br>
                    <div size="medium">
                    <el-radio v-model="DepartmentInfo.nameDepartment" label="HR Department" border></el-radio>
                    <el-radio v-model="DepartmentInfo.nameDepartment" label="Financial department" border></el-radio>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label>Section</label> <br>
                    <el-radio-group v-model="DepartmentInfo.section" size="medium">
                    <el-radio-button @click="showFSection" label="Riyadh">
                      <div style="display: flex;">
                        <i  :class="[isActiveFSection ? 'fa fa-check' : 'fa fa-plus']" ></i><span>Riyadh</span>
                      </div>
                    </el-radio-button>
                    <el-radio-button @click="showSSection" label="Mekkah" class="ml-2">
                      <div style="display: flex;">
                        <i  :class="[isActiveSSection ? 'fa fa-check' : 'fa fa-plus']" ></i><span>Mekkah</span>
                      </div>
                    </el-radio-button>
                    </el-radio-group>
                  </div>
                  <div class="col-lg-6">
                    <label>Work Shift</label> <br>
                    <el-radio-group v-model="DepartmentInfo.workShift" size="medium">
                    <el-radio-button @click="showFWork" label="Supervisor">
                      <div style="display: flex;">
                        <i  :class="[isActiveFWork ? 'fa fa-check' : 'fa fa-plus']" ></i><span>Supervisor</span>
                      </div>
                    </el-radio-button>
                    <el-radio-button  @click="showSWork" label="Supervisors" class="ml-2">
                      <div style="display: flex;">
                        <i  :class="[isActiveSWork ? 'fa fa-check' : 'fa fa-plus']" ></i><span>Supervisors</span>
                      </div>
                    </el-radio-button>
                    </el-radio-group>
                  </div>
                </div> 
              </div>
              <div class="row">
                  <div class="col-lg-12">
                    <base-input
                      alternative=""
                      label="Department Name"
                      input-classes="form-control-alternative"
                      v-model="DepartmentInfo.branchName"
                      required
                    />
                  </div>
                </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/JobInformation"><button class="mr-2" style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;opacity: 1;height: 45px;width: 90px;color: white;">Next</button></router-link>
                <!-- <router-link to="/AddNewEmployee/JobInformation"> -->
                <button @click="DepartmentInfos(DepartmentInfo)" style="background: #007CC4 0% 0% no-repeat padding-box; border-radius: 3px 3px 10px 3px; opacity: 1;height: 45px;width: 90px;color: white;">Save</button>
                <!-- </router-link> -->
              </div>
            </form>
          </card>
        <!-- </div>
      </div>
    </div> -->
  </div>
</template>
<script>
export default {
  name: "DepartmentInfo",
  data() {
    return {
      DepartmentInfo: {
        nameDepartment: "",
        section: "",
        workShift: "",
        branchName: "",
      },
      isActiveFSection: false,
      isActiveSSection: false,
      isActiveFWork: false,
      isActiveSWork: false,
    };
  },
  methods: {
    showFSection(){
      this.isActiveSSection = false
      this.isActiveFSection = true
    },
    showSSection(){
      this.isActiveFSection = false
      this.isActiveSSection = true
    },
    showFWork(){
      this.isActiveSWork = false
      this.isActiveFWork = true
    },
    showSWork(){
      this.isActiveFWork = false
      this.isActiveSWork = true
    },
    DepartmentInfos(data) {
      console.log('test')
      let clone = {...data};
      this.$store.state.employees.push(clone);
      this.$router.push({path: '/AddNewEmployee/JobInformation'})
    }
  }
};
</script>
<style scoped>
.card-info {
  min-width: 375px;
}
.el-radio.is-bordered{
  height: 71px!important;

}
</style>
