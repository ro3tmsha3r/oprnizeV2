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
                      type="number"
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
                      type="number"
                      alternative=""
                      label="Mobile Number"
                      input-classes="form-control-alternative"
                      v-model="userInfo.mobileNumber"
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      type="email"
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
                    <el-radio-group v-for="(item, index) in nationalities" :key="index" v-model="userInfo.country" @change="setIcon(item)">
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
                      <el-radio-button label="Female" class="ml-2"> 
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
                      <el-radio-button label="Single" class="ml-2">
                      </el-radio-button>
                    </el-radio-group>
                  </div>
                </div>
              </div>
              <!-- <hr class="my-4" /> -->
              <div>
                <!-- <a href="" class="pl-2 text-sm">More Informations <i class="ni ni-bold-down"></i></a> -->
                <el-collapse v-model="activeNames" @change="handleChange">
                  <el-collapse-item title="More Informations" name="1">
                    <div class="row">
                  <div class="col-lg-4">
                    <base-input
                      type="number"
                      alternative=""
                      label="Card Number"
                      input-classes="form-control-alternative"
                      v-model="userInfo.cardNumber"
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Release Date"
                      input-classes="form-control-alternative"
                      v-model="userInfo.releaseDate"
                      required
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Expiry Data"
                      input-classes="form-control-alternative"
                      v-model="userInfo.expiryData"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <base-input
                      type="number"
                      alternative=""
                      label="Passport Number"
                      input-classes="form-control-alternative"
                      v-model="userInfo.passportNumber"
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Expiry Date"
                      input-classes="form-control-alternative"
                      v-model="userInfo.expiryDate"
                      required
                    />
                  </div>
                </div>
                
                  </el-collapse-item>
                  </el-collapse>
              </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/DepartmentInfo"
                  ><button class="mr-2" style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;opacity: 1;height: 45px;width: 90px;color: white;"
                    >Next</button
                  ></router-link>
                <!-- <router-link to="/AddNewEmployee/DepartmentInfo"> -->
                  <button @click.prevent="personalInfo(userInfo)" style="background: #007CC4 0% 0% no-repeat padding-box; border-radius: 3px 3px 10px 3px; opacity: 1;height: 45px;width: 90px;color: white;"> Save</button>
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
// import { Field, Form } from 'vee-validate';
import axios from "axios";

export default {
  name: "PersonalInfo",
  data() {
    return {
      checked: false,
      nationalityCheck: false,
      userInfo: {
        usernameEnglish: "",
        usernameArabic: "",
        email: "",
        idNumber: "",
        mobileNumber: "",
        dateBirth: "",
        marital: "",
        gender: "",
        country: "",
        cardNumber: null,
        releaseDate: "",
        expiryData: "",
        passportNumber: null,
        expiryDate: "",
      },
      activeNames: 1,
      isActive: false,
      valueClicked: "",
      nationalities: [],
    };
  },
  mounted() {
    this.getNationalities();
  },
  methods: {
    setIcon(e){
        this.isActive = true
        this.valueClicked = e
    },
    getNationalities() {
      var app = this;
      axios
        .get("/country")
        .then(function (response) {
          app.nationalities = response.data;
          console.log(app.nationalities);
          console.log(response.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    personalInfo(user) {
      console.log('test')
      let clone = {...user};
      this.$store.state.employees.push(clone);
      this.$router.push({path: '/AddNewEmployee/DepartmentInfo'})
    }
  }
};
</script>
<style>
.card-info {
  min-width: 375px;
}
.fa .fa-mars, .fa .fa-venus{
    padding: 0.40rem !important;
    margin-right: 0.25rem !important;
}

.card-body{
  background-color: white!important;
}

.el-radio-button--medium .el-radio-button__inner{
  background: #F3F3F3 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 10px 3px!important;
  opacity: 1!important;
}

.el-radio-button__orig-radio:checked+.el-radio-button__inner{
  /* color: #B1B1B1!important; */
  /* margin: 0 10px; */
  background-color: #007CC4!important;
}

</style>
