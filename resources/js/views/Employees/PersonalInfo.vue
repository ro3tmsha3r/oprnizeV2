<template>
  <div class="p-2">
          <card class="card-info" shadow type="secondary">
            <template v-slot:header>
              <div class="bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Personal Info</h3>
                  </div>
                </div>
              </div>
            </template>

            <!-- <Form as="el-form" :validation-schema="schema" @submit="onSubmit">  -->
              <el-form ref="ruleForm" :model="userInfo" :rules="rules">            
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <!-- <Field name="usernameEnglish" v-slot="{ value, field, errorMessage }"> -->
                      <el-form-item prop="usernameEnglish">
                        <base-input
                          alternative=""
                          label="Employee's English Name"
                          input-classes="form-control-alternative"
                          v-model="userInfo.usernameEnglish"
                          required
                        />
                      </el-form-item>
                    <!-- </Field> -->
                  </div>
                  <div class="col-lg-6">
                    <!-- <Field name="arabicName" v-slot="{ value, field, errorMessage }"> -->
                      <el-form-item prop="arabicName">
                        <base-input
                          alternative=""
                          label="Employee's Arabic Name"
                          input-classes="form-control-alternative"
                          v-model="userInfo.usernameArabic"
                          required
                        />
                      </el-form-item>
                    <!-- </Field> -->
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-lg-6">
                    <!-- <Field name="idNumber" v-slot="{ value, field, errorMessage }"> -->
                      <el-form-item prop="idNumber">
                        <base-input
                          type="number"
                          alternative=""
                          label="ID Number / Iqama Number"
                          input-classes="form-control-alternative"
                          v-model="userInfo.idNumber"
                          required
                        />
                      </el-form-item>
                    <!-- </Field> -->
                  </div>
                  <div class="col-lg-6">
                    <el-form-item>
                      <base-input
                        type="number"
                        alternative=""
                        label="Mobile Number"
                        input-classes="form-control-alternative"
                        v-model="userInfo.mobileNumber"
                      />
                    </el-form-item>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="pl-3">
                    <!-- <Field name="country" v-slot="{ value, field, errorMessage }"> -->
                      <el-form-item prop="country">
                        <h5 style="color: #525f7f;font-size: 0.875rem;font-weight: 600;">Nationality</h5>
                        <!-- <el-radio-button 
                        v-bind="field"
                          :model-value="value" 
                          :class="[isActive ? 'visible' : 'hidden']" 
                          :label="userInfo.country" 
                          v-bind:checked="isActive">
                            <div style="display: flex">
                                <i @click="removeTag" class="fa fa-times-circle"/>
                                <span class="pl-1">{{ userInfo.country }}</span>
                              </div>
                          </el-radio-button>
                        <el-radio-group v-for="(item, index) in nationalities" :key="index" v-model="userInfo.country" @click="setIcon(item)">
                          <el-radio-button  :class="[isActive ? 'hidden' : 'visible']" :label="item.name.en">
                            <div style="display: flex">
                                <i class="fa fa-plus"/>
                                <span class="pl-1">{{ item.name.en }}</span>
                              </div>
                          </el-radio-button>
                        </el-radio-group> -->
                        <el-radio-group v-for="(item, index) in nationalities" :key="index" v-model="userInfo.country" @change="setIcon(item)">
                          <el-radio-button
                            class="border-0 mx-1"
                            v-bind="field"
                            :model-value="value"
                          :label="item.name.en"
                          >
                              <div v-if="valueClicked == item" style="display: flex">
                                <i :class="[isActive ? 'fa fa-check' : 'fa fa-plus']"/>
                                <span class="pl-1">{{ item.name.en }}</span>
                              </div>
                              <div v-else style="display: flex">
                                <i class="fa fa-plus"/>
                                <span class="pl-1">{{ item.name.en }}</span>
                              </div>
                          </el-radio-button>
                        </el-radio-group>
                        
                      </el-form-item><br>
                    <!-- </Field> -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label>Gender</label> <br />
                    <el-radio-group v-model="userInfo.gender" size="medium">
                      <el-radio-button label="Male">
                          <div style="display: flex;">
                          <i class="fa fa-mars" aria-hidden="true"></i><span class="px-2">Male</span>
                          </div>
                        </el-radio-button>
                      <el-radio-button label="Female" class="ml-2"> 
                          <div style="display: flex;">
                          <i class="fa fa-venus" aria-hidden="true"></i><span class="px-2">Female</span>
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
              <div>
                <el-collapse v-model="activeNames">
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
                      type="date"
                      alternative=""
                      label="Date Of Birth"
                      input-classes="form-control-alternative"
                      v-model="userInfo.dateBirth"
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
                </div>
                  </el-collapse-item>
                  </el-collapse>
              </div>
              <div class="text-right">
                <el-button @click="personalInfo(userInfo)"  style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Next</el-button>
                <el-button @click="personalInfo(userInfo)"  style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Add</el-button>
              </div>
            <!-- </Form> -->
              </el-form>
          </card>
  </div>
</template>
<script>
import axios from 'axios'
import { Field, Form } from "vee-validate";
import * as yup from "yup";
import { ElMessage } from 'element-plus'
import { useStore } from 'vuex'
import { useRouter } from 'vue-router'

export default {
  name: "PersonalInfo",
  data() {
    return {
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
      rules: {
        usernameEnglish: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        usernameArabic: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        idNumber: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        country: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
      },
      // data: [],
    };
  },
  components: {
    Form,
    Field,
  },
  mounted() {
    this.getNationalities();
    // console.log(this.data[0])
    if( this.data[0] !== undefined){
    this.userInfo.usernameEnglish =  this.data[0].usernameEnglish
    this.userInfo.usernameArabic = this.data[0].usernameArabic
    this.userInfo.idNumber = this.data[0].idNumber
    this.userInfo.country = this.data[0].country
    this.userInfo.mobileNumber = this.data[0].mobileNumber
    this.userInfo.gender = this.data[0].gender
    this.userInfo.marital = this.data[0].marital
    }
  },
  computed: {
    data() {
      return this.$store.getters.getEmployees;
    },
  },
  methods: {
    setIcon(e){
        this.isActive = true
        this.valueClicked = e
    },
    removeTag(e){
      this.isActive = false
      this.userInfo.country = e
    },
    getNationalities() {
      var app = this;
      axios
        .get("/country")
        .then(function (response) {
          app.nationalities = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    personalInfo(data) {
      // console.log('test')
      this.$refs['ruleForm'].validate((valid) => {
        if (valid) {
          let clone = { ...data };
          this.data = data
          console.log(data)
          this.$store.state.employees.push(clone);
          this.$router.push({path: '/AddNewEmployee/DepartmentInfo'})
        } else {
          console.log('error submit!!')
          return false
        }
      })
    }
  },
  setup(props, context) {
    const store = useStore()
    const router = useRouter()

    const schema = yup.object({
      usernameArabic: yup.string().required().label("Arabic Name"),
      usernameEnglish: yup.string().required().label("english Name"),
      idNumber: yup.string().required().label("ID Number"),
      country: yup.string().required().label("Nationality"),
    });

    function onSubmit(values, actions) {
      // console.log(JSON.stringify(values, null, 2));
      console.log(values);
      // console.log(user);
      let clone = {...values};
      store.state.employees.push(clone);
      router.push({path: '/AddNewEmployee/DepartmentInfo'})
      // this.userInfo.usernameEnglish = values.usernameEnglish
      // this.userInfo.usernameArabic = values.usernameArabic
      // this.userInfo.idNumber = values.idNumber
      // this.userInfo.country = values.country
    }
    return {
      onSubmit,
      schema,
    };
  },
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

.el-form-item__error{
  width: max-content!important;
}
.visible {
  visibility: visible!important;
}
.hidden{
  visibility: hidden!important;
}

.fa.fa-times-circle:hover{
  transform: scale(1.5)!important;
}
</style>
