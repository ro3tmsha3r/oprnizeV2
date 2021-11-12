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
            <el-form ref="ruleForm" :model="jobInfo" :rules="rules">
                  <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <label>Job Number</label> <br />
                    <el-form-item prop="jobNumber">
                      <base-input
                      type="number"
                      alternative=""
                      input-classes="form-control-alternative"
                      v-model="jobInfo.jobNumber"
                      required
                    />
                    </el-form-item>
                  </div>
                  <div class="col-lg-6">
                    <label>Job Title</label> <br />
                    <el-form-item prop="jobTitle">
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
                    </el-form-item>
                  </div>
                  </div>
                </div>
                <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6">
                  <label>Joining Date</label> <br />
                  <el-form-item prop="joiningDate">
                  <base-input
                    type="date"
                    ternative=""
                    input-classes="form-control-alternative"
                    v-model="jobInfo.joiningDate"
                    required
                  />
                  </el-form-item>
                </div>
                <div class="col-lg-6">
                    <label>Role</label> <br />
                    <el-form-item prop="role">
                    <el-radio-group v-model="jobInfo.role" size="medium">
                      <el-radio-button label="HR"></el-radio-button>
                      <el-radio-button label="Supervisor"></el-radio-button>
                      <el-radio-button label="HRs"></el-radio-button>
                      <el-radio-button label="Supervisors"></el-radio-button>
                    </el-radio-group>
                    </el-form-item>
                  </div>
                </div>
              </div>
                  <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <label>Contract Type</label> <br>
                    <el-form-item prop="contractType">
                    <el-radio-group v-model="jobInfo.contractType" size="medium">
                    <el-radio-button label="Full Time"></el-radio-button>
                    <el-radio-button label="Part Time"></el-radio-button>
                    </el-radio-group>
                    </el-form-item>
                  </div>
                  <div class="col-lg-6">
                    <label>Employment Type</label> <br>
                    <el-form-item prop="employmentType">
                    <el-radio-group v-model="jobInfo.employmentType" size="medium">
                    <el-radio-button label="Limited"></el-radio-button>
                    <el-radio-button label="Unlimited"></el-radio-button>
                    </el-radio-group>
                    </el-form-item>
                  </div>
                  </div>
                </div>
                
                
                  <div class="row">
                    <div class="col-lg-12">
                  <label>Probation Period</label> <br/>
                  <el-form-item prop="probationPeriod">
                    <el-radio-group v-model="jobInfo.probationPeriod" size="medium">
                    <el-radio-button @change="check90" label="90 days"></el-radio-button>
                    <el-radio-button @change="check" label="Custome"></el-radio-button>
                    </el-radio-group>
                    </el-form-item>
                    
                    <div :class="[customeIsChecked ? 'visible' : 'hidden']">
                      {{ sliders.slider1 }}
                      <vue-slider v-bind="options" v-model="sliders.slider1" />
                    </div>               
                </div>
              </div>
              <div class="text-right">
                <el-button @click="jobInformation(jobInfo)"  style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Next</el-button>
                <el-button @click="jobInformation(jobInfo)" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Add</el-button>
              </div>
            </el-form>
          </card>
  </div>
</template>
<script>
import axios from "axios";
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'

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
      options: {
        dotSize: 14,
        width: '60%',
        height: 4,
        min: 1,
        max: 89,
      },
      jobTitles: [],
      rules: {
        jobNumber: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        jobTitle: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        role: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        joiningDate: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        contractType: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        employmentType: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        probationPeriod: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
      }
    };
  },
  components: {
    VueSlider
  },
  mounted() {
    this.getJobTitles();
    if( this.data[3] !== undefined){
    this.jobInfo.jobNumber =  this.data[3].jobNumber
    this.jobInfo.jobTitle = this.data[3].jobTitle
    this.jobInfo.role = this.data[3].role
    this.jobInfo.joiningDate = this.data[3].joiningDate
    this.jobInfo.contractType = this.data[3].contractType
    this.jobInfo.employmentType = this.data[3].employmentType
    this.jobInfo.probationPeriod = this.data[3].probationPeriod
    }
  },
  computed: {
    data() {
      return this.$store.getters.getEmployees;
    },
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
      this.$refs['ruleForm'].validate((valid) => {
        if (valid) {
          let clone = { ...data };
          this.$store.state.employees.push(clone);
          this.$router.push({path: '/AddNewEmployee/Compinsation'})
        } else {
          console.log('error submit!!')
          return false
        }
      })
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

.el-slider {
  width: 200px;
}
</style>
