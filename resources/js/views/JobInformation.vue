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
                    <h3 class="mb-0">Job Information</h3>
                  </div>
                  <!-- <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                  </div> -->
                </div>
              </div>
            </template>

            <form>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <base-input
                    type="number"
                    alternative=""
                    label="Job Number"
                    input-classes="form-control-alternative"
                    v-model="jobInfo.jobNumber"
                    required
                  />
                  </div>
                  <div class="col-lg-6">
                    <label>Job Title</label> <br />
                    <el-radio-group v-model="jobInfo.jobTitle" size="medium">
                      <el-radio-button label="HR"></el-radio-button>
                      <el-radio-button label="Supervisor"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <base-input
                    type="date"
                    alternative=""
                    label="Joining Date"
                    input-classes="form-control-alternative"
                    v-model="jobInfo.joiningDate"
                    required
                  />
                </div>
                <div class="col-lg-6">
                    <label>Role</label> <br />
                    <el-radio-group v-model="jobInfo.role" size="medium">
                      <el-radio-button label="HR"></el-radio-button>
                      <el-radio-button label="Supervisor"></el-radio-button>
                    </el-radio-group>
                  </div>
              </div>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <label>Contract Type</label> <br>
                    <el-radio-group v-model="jobInfo.contractType" size="medium">
                    <el-radio-button label="Full Time"></el-radio-button>
                    <el-radio-button label="Part Time"></el-radio-button>
                    <el-radio-button label="Remotely"></el-radio-button>
                    </el-radio-group>
                  </div>
                  <div class="col-lg-6">
                    <label>Employment Type</label> <br>
                    <el-radio-group v-model="jobInfo.employmentType" size="medium">
                    <el-radio-button label="Limited"></el-radio-button>
                    <el-radio-button label="Unlimited"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <label>Probation Period</label> <br>
                    <el-radio-group v-model="jobInfo.probationPeriod" size="medium">
                    <el-radio-button label="90 days"></el-radio-button>
                    <el-radio-button label="180 days"></el-radio-button>
                    <el-radio-button @change="check" label="Custome"></el-radio-button>
                    </el-radio-group>
                    <div v-if="customeIsChecked == true">
                      <div class="slider-demo-block">
                      <!-- <span class="demonstration">Default value</span> -->
                      <el-slider v-model="sliders.slider1"></el-slider>
                    </div>
                    <!-- <base-slider :value="[1]" :options="{tooltips: true, pips: true}" :range="{min: 1, max: 90}" v-model="sliders.slider1"></base-slider> -->
                    </div>
                </div>
              </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/Compinsation">
                  <button class="mr-2" style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;opacity: 1;height: 45px;width: 90px;color: white;">
                    Next
                  </button>
                </router-link>
                <!-- <router-link to="/AddNewEmployee/Compinsation"> -->
                  <button @click="jobInformation(jobInfo)" style="background: #007CC4 0% 0% no-repeat padding-box; border-radius: 3px 3px 10px 3px; opacity: 1;height: 45px;width: 90px;color: white;">
                   Save
                  </button>
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
  name: "JobInformation",
  data() {
    return {
      jobInfo: {
        jobNumber: 0,
        jobTitle: "",
        role: "",
        joiningDate: "",
        contractType: "",
        employmentType: "",
        probationPeriod: "",
      },
      customeIsChecked: false,
      sliders: {
        slider1: 1
      }
    };
  },
  methods:{
    check(yes){
      console.log(yes);
      this.customeIsChecked = true;
      console.log(this.customeIsChecked)
    },
    jobInformation(data) {
      console.log('test')
      let clone = {...data};
      this.$store.state.employees.push(clone);
      this.$router.push({path: '/AddNewEmployee/Compinsation'})
    }
  }
};
</script>
<style scoped>
.card-info {
  min-width: 375px;
}
</style>
