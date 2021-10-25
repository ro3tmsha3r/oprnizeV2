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
                      v-model="model.usernameEnglish"
                      required
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Employee's Arabic Name"
                      input-classes="form-control-alternative"
                      v-model="model.usernameArabic"
                      required
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="ID Number / Iqama Number"
                      input-classes="form-control-alternative"
                      v-model="model.idNumber"
                      required
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Mobile Number"
                      input-classes="form-control-alternative"
                      v-model="model.mobileNumber"
                      required
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="Email"
                      input-classes="form-control-alternative"
                      v-model="model.email"
                      required
                    />
                  </div>
                  <div class="col-lg-4">
                    <base-input
                      type="date"
                      alternative=""
                      label="Date Of Birth"
                      input-classes="form-control-alternative"
                      v-model="model.dateBirth"
                      required
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="pl-3">
                    <label>Nationality</label> <br />
                    <el-radio-group v-model="model.contry" size="medium">
                      <el-radio-button id="one" class="border-0 bg-gradient-lighter" label="Saudi Arabian" v-model="checked">
                          <!-- <div style="display: flex;">
                            <i  :class="[sortType == 'asc' ? 'text-gray-900' : '']" class="icon el-icon-arrow-up" aria-hidden="true"></i><span>Male</span>
                          </div> -->
                      </el-radio-button>
                      <el-radio-button id="two" class="ml-2 border-0 bg-gradient-lighter" label="Egyptian" v-model="checked">
                      </el-radio-button>
                    </el-radio-group>
                    <a href="#" class="mr-2">See more</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <label>Gender</label> <br />
                    <el-radio-group v-model="model.gender" size="medium">
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
                  ></router-link
                >
                <router-link to="/AddNewEmployee/DepartmentInfo"
                  ><base-button type="primary">Save</base-button></router-link
                >
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
  name: "PersonalInfo",
  data() {
    return {
      checked: false,
      model: {
        usernameEnglish: "",
        usernameArabic: "",
        email: "",
        idNumber: "",
        mobileNumber: "",
        dateBirth: "",
        country: [],
      },
      countries: [
        "Saudi Arabian",
        "Egyptian",
        "Saudi Arabian",
        "Egyptian",
        "Saudi Arabian",
        "Egyptian",
        "Saudi Arabian",
        "Egyptian",
      ],
    };
  },
};
</script>
<style>
.card {
  width: 800px;
}
.fa .fa-mars, .fa .fa-venus{
    padding: 0.40rem !important;
    margin-right: 0.25rem !important;
}
</style>
