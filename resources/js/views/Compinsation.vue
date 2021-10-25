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
                    <h3 class="mb-0">Compinsation</h3>
                  </div>
                  <!-- <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                  </div> -->
                </div>
              </div>
            </template>

            <form>
              <div class="row">
                <div class="col-lg-4">
                  <base-input
                    alternative=""
                    label="Basic"
                    input-classes="form-control-alternative"
                    v-model="model.branch"
                    required
                  />
                </div>
                <div class="col-lg-4">
                  <label>Probation Period</label> <br>
                    <el-radio-group v-model="model.email" size="medium">
                    <el-radio-button label="25% Hosing Allowance"></el-radio-button>
                    <el-radio-button label="10% Transportation"></el-radio-button>
                    <el-radio-button label="Custome"></el-radio-button>
                    </el-radio-group>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <label>Leave Balance</label> <br>
                    <el-radio-group v-model="model.email" size="medium">
                    <el-radio-button label="21"></el-radio-button>
                    <el-radio-button label="30"></el-radio-button>
                    <el-radio-button label="Custome"></el-radio-button>
                    </el-radio-group>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <label>Payment Method</label> <br>
                    <el-radio-group v-model="model.email" size="medium">
                    <el-radio-button label="Cash"></el-radio-button>
                    <el-radio-button label="Bank Deposit"></el-radio-button>
                    <el-radio-button label="Cheque"></el-radio-button>
                    <el-radio-button label="International Money Order"></el-radio-button>
                    </el-radio-group>
                </div>
              </div>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-4">
                    <base-input
                      alternative=""
                      label="IBAN"
                      input-classes="form-control-alternative"
                      v-model="model.branch"
                      required
                    />
                  </div>
                  <div class="col-lg-4">
                    <label>Bank Name</label> <br />
                    <el-radio-group v-model="model.gender" size="medium">
                      <el-radio-button label="Cash"></el-radio-button>
                      <el-radio-button label="Bank Deposit"></el-radio-button>
                      <el-radio-button label="Cheque"></el-radio-button>
                      <el-radio-button label="International Money Order"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div>
              </div>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-4">
                    <label>Contract Type</label> <br>
                    <el-radio-group v-model="model.city" size="medium">
                    <el-radio-button label="Full Time"></el-radio-button>
                    <el-radio-button label="Part Time"></el-radio-button>
                    <el-radio-button label="Remotely"></el-radio-button>
                    </el-radio-group>
                  </div>
                  <div class="col-lg-4">
                    <label>Employment Type</label> <br>
                    <el-radio-group v-model="model.username" size="medium">
                    <el-radio-button label="Limited"></el-radio-button>
                    <el-radio-button label="Unlimited"></el-radio-button>
                    </el-radio-group>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <label>Probation Period</label> <br>
                    <el-radio-group v-model="model.about" size="medium">
                    <el-radio-button label="90 days"></el-radio-button>
                    <el-radio-button label="180 days"></el-radio-button>
                    <el-radio-button @change="check" label="Custome"></el-radio-button>
                    </el-radio-group>
                    <div v-if="customeIsChecked == true">
                      hello
                    <base-slider disabled="false" type="number" :range="{min: 1, max: 90}" v-model="sliders.slider1"></base-slider>
                    </div>
                </div>
              </div>
              <div class="text-left">
                <router-link to="/AddNewEmployee/JobInformation"
                  ><base-button class="mr-2" type="secondary"
                    >Back</base-button
                  ></router-link
                >
              </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/Review"
                  ><base-button class="mr-2" type="default"
                    >Next</base-button
                  ></router-link
                >
                <router-link to="/AddNewEmployee/Review"
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
  name: "Compinsation",
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
      customeIsChecked: false,
      sliders: {
              slider1: 0
           }
    };
  },
  methods:{
    check(yes){
      console.log(yes);
      this.customeIsChecked = true;
      console.log(this.customeIsChecked)
    }
  }
};
</script>
<style>
.card {
  width: 800px;
}
</style>
