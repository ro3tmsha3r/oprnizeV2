<template>
  <div class="p-2">
    <card class="card-info" shadow type="secondary">
      <template v-slot:header>
        <div class="bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Compinsation</h3>
            </div>
          </div>
        </div>
      </template>

      <form>
        <div class="row">
          <div class="col-lg-6">
            <base-input
              type="number"
              alternative=""
              label="Basic"
              input-classes="form-control-alternative"
              v-model="compinsation.basic"
              required
            />
          </div>
          <div class="col-lg-6">
            <label>Allowences</label> <br />
            <el-radio-group v-model="compinsation.Allowences" size="medium">
              <el-radio-button label="25% Hosing Allowance"></el-radio-button>
              <el-radio-button label="10% Transportation"></el-radio-button>
              <el-radio-button label="Custome"></el-radio-button>
            </el-radio-group>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label>Leave Balance</label> <br />
            <el-radio-group v-model="compinsation.leaveBalance" size="medium">
              <el-radio-button @change="check21" label="21"></el-radio-button>
              <el-radio-button @change="check21" label="30"></el-radio-button>
              <el-radio-button @change="check" label="Custome"></el-radio-button>
            </el-radio-group>
            <div :class="[customeIsChecked ? 'visible' : 'hidden']">
              <vue-slider v-bind="options" v-model="sliders.slider1" />
            </div> 
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label>Payment Method</label> <br />
            <el-radio-group v-model="compinsation.paymentMethod" size="medium">
              <el-radio-button label="Cash"></el-radio-button>
              <el-radio-button label="Bank Deposit"></el-radio-button>
              <el-radio-button label="Cheque"></el-radio-button>
              <el-radio-button
                label="International Money Order"
              ></el-radio-button>
            </el-radio-group>
          </div>
        </div>
        <div class="pl-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <base-input
                type="number"
                alternative=""
                label="IBAN"
                input-classes="form-control-alternative"
                v-model="compinsation.IBAN"
                required
              />
            </div>
            <div class="col-lg-6">
              <label>Bank Name</label> <br />
              <el-radio-group v-model="compinsation.bankName" size="medium">
                <el-radio-button label="Cash"></el-radio-button>
                <el-radio-button label="Bank Deposit"></el-radio-button>
                <el-radio-button label="Cheque"></el-radio-button>
                <el-radio-button
                  label="International Money Order"
                ></el-radio-button>
              </el-radio-group>
            </div>
          </div>
        </div>
        <div class="text-left">
          <router-link to="/AddNewEmployee/JobInformation">
            <base-button class="mr-2" type="secondary"> Back </base-button>
          </router-link>
        </div>
        <div class="text-right">
          <router-link to="/AddNewEmployee/Review">
            <button
              class="mr-2"
              style="
                background: #464648 0% 0% no-repeat padding-box;
                border-radius: 3px 3px 10px 3px;
                opacity: 1;
                height: 45px;
                width: 90px;
                color: white;
              "
            >
              Next
            </button>
          </router-link>
          <button
            @click="compinsationInfo(compinsation)"
            style="
              background: #007cc4 0% 0% no-repeat padding-box;
              border-radius: 3px 3px 10px 3px;
              opacity: 1;
              height: 45px;
              width: 90px;
              color: white;
            "
          >
            Save
          </button>
        </div>
      </form>
    </card>
  </div>
</template>
<script>

import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'

export default {
  name: "Compinsation",
  data() {
    return {
      compinsation: {
        basic: "",
        Allowences: "",
        leaveBalance: "",
        paymentMethod: "",
        bankName: "",
        IBAN: "",
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
    };
  },
  components: {
    VueSlider
  },
  methods: {
    check(yes){
      this.customeIsChecked = true;
      // this.custome = yes
    },
    check21(yes){
      this.customeIsChecked = false;
    },
    compinsationInfo(data) {
      console.log("test");
      let clone = { ...data };
      this.$store.state.employees.push(clone);
      this.$router.push({ path: "/AddNewEmployee/Review" });
    },
  },
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
