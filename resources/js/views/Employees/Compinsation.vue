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

      <el-form ref="ruleForm" :model="compinsation" :rules="rules">
        <div class="row">
          <div class="col-lg-6">
            <el-form-item prop="basic">
            <base-input
              type="number"
              alternative=""
              label="Basic"
              input-classes="form-control-alternative"
              v-model="compinsation.basic"
              required
            />
            </el-form-item>
          </div>
          <div class="col-lg-6">
            <label>Allowences</label> <br />
            <el-form-item prop="allowence">
            <el-checkbox-group v-model="compinsation.allowence">
              <el-checkbox-button v-for="item in allowences" :key="item" :label="item">{{
                item
              }}</el-checkbox-button>
            </el-checkbox-group>
            </el-form-item>
            <!-- <el-checkbox-group v-model="compinsation.Allowences" size="medium">
              <el-checkbox-button label="25% Hosing Allowance">25% Hosing Allowance</el-checkbox-button>
              <el-checkbox-button label="10% Transportation">10% Transportation</el-checkbox-button> -->
              <!-- <el-checkbox-button label="Custome"></el-checkbox-button> -->
              <el-tag
                v-for="tag in dynamicTags"
                :key="tag"
                closable
                :disable-transitions="false"
                @close="handleClose(tag)"
              >
                {{ tag }}
              </el-tag>
              <el-input
                v-if="inputVisible"
                ref="saveTagInput"
                v-model="inputValue"
                class="input-new-tag"
                size="mini"
                @keyup.enter="handleInputConfirm"
                @blur="handleInputConfirm"
              >
              </el-input>
              <el-button v-else class="button-new-tag" size="medium" @click="showInput"
                >+ </el-button>
            <!-- </el-checkbox-group> -->
          </div>
        </div>
        <div>
          Total: 
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label>Leave Balance</label> <br />
            <el-form-item prop="leaveBalance">
            <el-radio-group v-model="compinsation.leaveBalance" size="medium">
              <el-radio-button @change="check21" label="21"></el-radio-button>
              <el-radio-button @change="check21" label="30"></el-radio-button>
              <el-radio-button @change="check" label="Custome"></el-radio-button>
            </el-radio-group>
            </el-form-item>
            <div :class="[customeIsChecked ? 'visible' : 'hidden']">
            {{sliders.slider1}}
              <vue-slider v-bind="options" v-model="sliders.slider1" />
            </div> 
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label>Payment Method</label> <br />
            <el-form-item prop="paymentMethod">
            <el-radio-group v-model="compinsation.paymentMethod" size="medium">
              <el-radio-button label="Cash"></el-radio-button>
              <el-radio-button label="Bank Deposit"></el-radio-button>
              <el-radio-button label="Cheque"></el-radio-button>
              <el-radio-button
                label="International Money Order"
              ></el-radio-button>
            </el-radio-group>
            </el-form-item>
          </div>
        </div>
        <div class="pl-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <el-form-item prop="IBAN">
              <base-input
                type="number"
                alternative=""
                label="IBAN"
                input-classes="form-control-alternative"
                v-model="compinsation.IBAN"
                required
              />
              </el-form-item>
            </div>
            <div class="col-lg-6">
              <label>Bank Name</label> <br />
              <el-form-item prop="bankName">
              <el-radio-group v-model="compinsation.bankName" size="medium">
                <el-radio-button label="Cash"></el-radio-button>
                <el-radio-button label="Bank Deposit"></el-radio-button>
                <el-radio-button label="Cheque"></el-radio-button>
                <el-radio-button
                  label="International Money Order"
                ></el-radio-button>
              </el-radio-group>
              </el-form-item>
            </div>
          </div>
        </div>
        
        <div class="text-left">
          <router-link to="/AddNewEmployee/JobInformation">
            <base-button class="mr-2" type="secondary"> Back </base-button>
          </router-link>
        </div>
        <div class="text-right">
                <el-button @click="compinsationInfo(compinsation)"  style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Next</el-button>
                <el-button @click="compinsationInfo(compinsation)" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Add</el-button>
              </div>
      </el-form>
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
        allowence: [''],
        leaveBalance: "",
        paymentMethod: "",
        bankName: "",
        IBAN: "",
      },
      customeIsChecked: false,
      sliders: {
        slider1: 22
      },
      options: {
        dotSize: 14,
        width: '60%',
        height: 4,
        min: 22,
        max: 60,
      },
      dynamicTags: [],
      inputVisible: false,
      inputValue: '',
      allowences: ['25% Hosing Allowance', '10% Transportation'],
      rules: {
        basic: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        allowence: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        leaveBalance: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        paymentMethod: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        bankName: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        IBAN: [
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
    if( this.data[4] !== undefined){
    this.compinsation.basic = this.data[4].basic
    this.compinsation.allowence = this.data[4].allowence
    this.compinsation.leaveBalance = this.data[4].leaveBalance
    this.compinsation.paymentMethod = this.data[4].paymentMethod
    this.compinsation.bankName = this.data[4].bankName
    this.compinsation.IBAN = this.data[4].IBAN
    }
  },
  computed: {
    data() {
      return this.$store.getters.getEmployees;
    },
  },
  methods: {
    handleClose(tag) {
      this.dynamicTags.splice(this.dynamicTags.indexOf(tag), 1)
    },

    showInput() {
      this.inputVisible = true
      this.$nextTick((_) => {
        this.$refs.saveTagInput.$refs.input.focus()
      })
    },

    handleInputConfirm() {
      const inputValue = this.inputValue
      if (inputValue) {
        this.dynamicTags.push(inputValue)
      }
      this.inputVisible = false
      this.inputValue = ''
    },
    check(yes){
      this.customeIsChecked = true;
      // this.custome = yes
    },
    check21(yes){
      this.customeIsChecked = false;
    },
    compinsationInfo(data) {
      this.$refs['ruleForm'].validate((valid) => {
        if (valid) {
          let clone = { ...data };
          this.$store.state.employees.push(clone);
          this.$router.push({ path: "/AddNewEmployee/Review" });
        } else {
          console.log('error submit!!')
          return false
        }
      })
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

.el-tag {
    background-color: #007CC4!important;
    border-color: #007CC4!important;
    font-size: 14px!important;
    color: white!important;
    border-radius: 3px 3px 10px 3px!important;
    height: 40px!important;
}

.el-checkbox-button.is-checked .el-checkbox-button__inner {
    color: #FFF!important;
    background-color: #007CC4!important;
    border-color: #007CC4!important;
}

.el-checkbox-button__inner{
  background: #F3F3F3 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 10px 3px!important;
  opacity: 1!important;
  margin-right: 14px!important;
  border: 1px solid #DCDFE6!important;
  color: #606266!important;

}
</style>
