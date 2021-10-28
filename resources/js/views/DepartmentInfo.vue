<template>
  <div class="p-2">
    <!-- <div class="container-fluid mt--7">
      <div class="w-96 mt-8 ml-9">
        <div class="col-xl-8 order-xl-1"> -->
          <card class="card-info" shadow type="secondary">
            <template v-slot:header>
              <div class="bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Department Info</h3>
                  </div>
                  <!-- <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                  </div> -->
                </div>
              </div>
            </template>

            <form>
              <h6 class="heading-small text-muted mb-4">Department information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-4">
                    <label>Name Of Department</label> <br>
                    <el-radio-group v-model="DepartmentInfo.nameDepartment" size="medium">
                    <el-radio-button label="HR Department"></el-radio-button>
                    <el-radio-button label="Financial department"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <label>Section</label> <br>
                    <el-radio-group v-model="DepartmentInfo.section" size="medium">
                    <el-radio-button label="Riyadh"></el-radio-button>
                    <el-radio-button label="Mekkah"></el-radio-button>
                    </el-radio-group>
                  </div>
                  <div class="col-lg-4">
                    <label>Work Shift</label> <br>
                    <el-radio-group v-model="DepartmentInfo.workShift" size="medium">
                    <el-radio-button label="Supervisor"></el-radio-button>
                    <el-radio-button label="Supervisors"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div> 
              </div>
              <div class="row">
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Branch Name"
                      input-classes="form-control-alternative"
                      v-model="DepartmentInfo.branchName"
                      required
                    />
                  </div>
                </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/JobInformation"><base-button class="mr-2" type="default">Next</base-button></router-link>
                <!-- <router-link to="/AddNewEmployee/JobInformation"> -->
                <base-button @click="DepartmentInfos(DepartmentInfo)" type="primary">Save</base-button>
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
    };
  },
  methods: {
    DepartmentInfos(data) {
      console.log('test')
      this.$store.state.employees.push(
        {
        nameDepartment: data.nameDepartment,
        section: data.section,
        workShift: data.workShift,
        branchName: data.branchName,
        }
      );
      this.$router.push({path: '/AddNewEmployee/JobInformation'})
    }
  }
};
</script>
<style scoped>
.card-info {
  min-width: 375px;
}
</style>
