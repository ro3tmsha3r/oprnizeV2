<template>
  <div class="p-2">
          <card class="card-info" shadow type="secondary">
            <template v-slot:header>
              <div class="bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Job Information</h3>
                  </div>
                </div>
              </div>
            </template>
            <form>
                  <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <label>Job Number</label> <br />
                      <base-input
                      type="number"
                      alternative=""
                      input-classes="form-control-alternative"
                      v-model="jobInfo.jobNumber"
                      required
                    />
                  </div>
                  <div class="col-lg-6">
                    <label>Job Title</label> <br />
                    <el-radio-group v-for="(item, index) in jobTitles" :key="index" v-model="jobInfo.jobTitle" @change="setIcon(item)">
                      <el-radio-button
                        class="border-0 mx-1"
                        v-bind="field"
                        :model-value="value"
                      :label="item.id"
                      >
                          <div v-if="valueClicked == item" style="display: flex">
                            <i :class="[isActive ? 'fa fa-check' : 'fa fa-plus']"/>
                            <span class="pl-1">{{ item.name.ar }}</span>
                          </div>
                          <div v-else style="display: flex">
                            <i class="fa fa-plus"/>
                            <span class="pl-1">{{ item.name.ar }}</span>
                          </div>
                      </el-radio-button>
                    </el-radio-group>
                  </div>
                  </div>
                </div>
                <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6">
                  <label>Joining Date</label> <br />
                  <base-input
                    type="date"
                    al
                    ternative=""
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
                      <el-radio-button label="HR"></el-radio-button>
                      <el-radio-button label="Supervisor"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div>
              </div>
                  <div class="col-lg-12">
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
                  <label>Probation Period</label> <br/>
                    <el-radio-group v-model="jobInfo.probationPeriod" size="medium">
                    <el-radio-button @change="check90" label="90 days"></el-radio-button>
                    <el-radio-button @change="check" label="Custome"></el-radio-button>
                    </el-radio-group>
                    <div v-if="customeIsChecked == true">
                      
                    </div>
                    <div :class="[customeIsChecked ? 'visible' : 'hidden']">
                      <el-slider :min="1" :max="89" v-model="sliders.slider1" style="width: 60%;!important"></el-slider>
                      {{sliders.slider1}}
                    </div>

                    
                </div>
              </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/Compinsation">
                  <button class="mr-2" style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;opacity: 1;height: 45px;width: 90px;color: white;">
                    Next
                  </button>
                </router-link>
                  <button @click="jobInformation(jobInfo)" style="background: #007CC4 0% 0% no-repeat padding-box; border-radius: 3px 3px 10px 3px; opacity: 1;height: 45px;width: 90px;color: white;">
                   Save
                  </button>
              </div>
            </form>
          </card>
  </div>
</template>
<script>
import axios from "axios";

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
      },
      jobTitles: [],
    };
  },
  mounted() {
    this.getJobTitles();
  },
  methods:{
    check(yes){
      this.customeIsChecked = true;
      // this.custome = yes
    },
    check90(yes){
      this.customeIsChecked = false;
    },
    setIcon(e){
        this.isActive = true
        this.valueClicked = e
        console.log('chang',e)
    },
    getJobTitles: function () {
      var app = this;
      axios
        .get("/titlejob")
        .then(function (response) {
          app.jobTitles = response.data;
          console.log(app.jobTitles);
        })
        .catch(function (error) {
          console.log(error);
        });
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

.visible {
  visibility: visible!important;
}
.hidden{
  visibility: hidden!important;
}
</style>
