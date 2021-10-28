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
                    <h3 class="mb-0">Personal Info</h3>
                  </div>
                  <!-- <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                  </div> -->
                </div>
              </div>
            </template>

            <form>
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Employee's English Name"
                      input-classes="form-control-alternative"
                      v-model="userInfo.usernameEnglish"
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Employee's Arabic Name"
                      input-classes="form-control-alternative"
                      v-model="userInfo.usernameArabic"
                      required
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="ID Number / Iqama Number"
                      input-classes="form-control-alternative"
                      v-model="userInfo.idNumber"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Mobile Number"
                      input-classes="form-control-alternative"
                      v-model="userInfo.mobileNumber"
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Email"
                      input-classes="form-control-alternative"
                      v-model="userInfo.email"
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      type="date"
                      alternative=""
                      label="Date Of Birth"
                      input-classes="form-control-alternative"
                      v-model="userInfo.dateBirth"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="pl-3">
                    <label>Nationality</label> <br />
                    <el-radio-group v-model="userInfo.contry" size="medium">
                      <el-radio-button id="one" class="border-0 bg-gradient-lighter" label="Saudi Arabian" v-model="checked">
                          <!-- <div style="display: flex;">
                            <i  :class="[sortType == 'asc' ? 'text-gray-900' : '']" class="icon el-icon-arrow-up" ></i><span>Male</span>
                          </div> -->
                      </el-radio-button>
                      <el-radio-button id="two" class="ml-2 border-0 bg-gradient-lighter" label="Egyptian" v-model="checked">
                      </el-radio-button>
                    </el-radio-group>
                    <a href="#" class="mr-2">See more</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label>Gender</label> <br />
                    <el-radio-group v-model="userInfo.gender" size="medium">
                      <el-radio-button label="Male">
                          <div style="display: flex;">
                          <i class="fa fa-mars" aria-hidden="true"></i><span>Male</span>
                          </div>
                        </el-radio-button>
                      <el-radio-button label="Female"> 
                          <div style="display: flex;">
                          <i class="fa fa-venus" aria-hidden="true"></i><span>Female</span>
                          </div>
                      </el-radio-button>
                    </el-radio-group>
                  </div>
                  <div class="col-lg-6">
                    <label>Marital</label> <br />
                    <el-radio-group v-model="userInfo.marital" size="medium">
                      <el-radio-button label="Married">
                        </el-radio-button>
                      <el-radio-button label="Single">
                      </el-radio-button>
                    </el-radio-group>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <div>
                <a href="" class="pl-2 text-sm">More Informations <i class="ni ni-bold-down"></i></a>
              </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/DepartmentInfo"
                  ><base-button class="mr-2" type="default"
                    >Next</base-button
                  ></router-link>
                <!-- <router-link to="/AddNewEmployee/DepartmentInfo"> -->
                  <base-button @click="personalInfo(userInfo)" type="primary">Save</base-button>
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
import { Field, Form } from 'vee-validate';

export default {
  name: "PersonalInfo",
  data() {
    return {
      checked: false,
      userInfo: {
        usernameEnglish: "",
        usernameArabic: "",
        email: "",
        idNumber: "",
        mobileNumber: "",
        dateBirth: "",
        marital: "",
        gender: "",
        contry: "",
      },
    };
  },
  methods: {
    personalInfo(user) {
      console.log('test')
      this.$store.state.employees.push(
        {
        usernameEnglish: user.usernameEnglish,
        usernameArabic: user.usernameArabic,
        email: user.email,
        idNumber: user.idNumber,
        mobileNumber: user.mobileNumber,
        dateBirth: user.dateBirth,
        marital: user.marital,
        gender: user.gender,
        contry: user.contry,
        }
      );
      this.$router.push({path: '/AddNewEmployee/DepartmentInfo'})
    }
  }
};
</script>
<style scoped>
.card-info {
  min-width: 375px;
}
.fa .fa-mars, .fa .fa-venus{
    padding: 0.40rem !important;
    margin-right: 0.25rem !important;
}

</style>
