<template>
  <div>
    <div class="container-fluid mt--7">
      <div class="w-96 mt-8 ml-9">
        <div class="col-xl-8 order-xl-1">
          <card shadow type="secondary">
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
                    <el-radio-group v-model="model.contry" size="medium">
                    <el-radio-button label="HR Department"></el-radio-button>
                    <el-radio-button label="Financial department"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <label>Section</label> <br>
                    <el-radio-group v-model="model.contry" size="medium">
                    <el-radio-button label="Saudi Arabian"></el-radio-button>
                    <el-radio-button label="Egyptian"></el-radio-button>
                    </el-radio-group>
                  </div>
                  <div class="col-lg-4">
                    <label>Work Shift</label> <br>
                    <el-radio-group v-model="model.gender" size="medium">
                    <el-radio-button label="Male"></el-radio-button>
                    <el-radio-button label="Female"></el-radio-button>
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
                      v-model="model.branch"
                      required
                    />
                  </div>
                </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/JobInformation"><base-button class="mr-2" type="default">Next</base-button></router-link>
                <router-link to="/AddNewEmployee/JobInformation"><base-button type="primary">Save</base-button></router-link>
              </div>
            </form>
          </card>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "DepartmentInfo",
  data() {
    return {
      model: {
        username: "",
        email: "",
        firstName: "",
        lastName: "",
        address: "",
        city: "",
        country: [],
        zipCode: "",
        about: "",
      },
      countries: ['Saudi Arabian', 'Egyptian','Saudi Arabian', 'Egyptian','Saudi Arabian', 'Egyptian','Saudi Arabian', 'Egyptian'],
    };
  },
};
</script>
<style>
.card {
  width: 800px;
}
</style>
