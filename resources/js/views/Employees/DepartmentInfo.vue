<template>
  <div class="p-2">
    <card class="card-info" shadow type="secondary">
      <template v-slot:header>
        <div class="bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Department Info</h3>
            </div>
          </div>
        </div>
      </template>

      <!-- <Form as="el-form" :validation-schema="schema" @submit="onSubmit"> -->
        <el-form ref="ruleForm" :model="DepartmentInfo" :rules="rules">
        <h6 class="heading-small text-muted mb-4">Department information</h6>
          <div class="row">
            <div class="col-lg-12">
              <label>Name Of Department</label> <br />
              <div size="medium">
                <!-- <Field name="nameDepartment" v-slot="{ value, field, errorMessage }"> -->
                <el-form-item prop="nameDepartment">
                <el-radio
                  v-for="(item, index) in departments"
                  :key="index"
                  v-model="DepartmentInfo.nameDepartment"
                  :label="item.name.ar"
                  border
                  @click="selectDept(item)"
                >
                </el-radio>
                </el-form-item>
              <!-- </Field> -->
              </div>
            </div>
          </div>
          <div class="row" v-if="isSelectDept">
            <div class="col-lg-6">
              <label>Section</label> <br />
              <!-- <Field name="section" v-slot="{ value, field, errorMessage }"> -->
                <el-form-item prop="section">
              <el-radio-group v-for="(item, index) in sections" :key="index" v-model="DepartmentInfo.section" @change="setIcon(item)">
                <el-radio-button
                  v-if="item.administration_id == deptActive"
                  class="border-0 mx-1"
                  v-bind="field"
                  :label="item.name.en"
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
              <!-- </Field> -->
            </div>
            <div class="col-lg-6">
              <label>Work Shift</label> <br />
              <!-- <Field name="workShift" v-slot="{ value, field, errorMessage }"> -->
                <el-form-item prop="workShift">
              <el-radio-group v-for="(item, index) in workShifts" :key="index" v-model="DepartmentInfo.workShift" size="medium" @change="setIconWork(item)">
                <el-radio-button
                  v-bind="field"
                  :model-value="value" 
                  :label="item">
                  <div v-if="valueClickedWork == item" style="display: flex">
                      <i :class="[isActiveWork ? 'fa fa-check' : 'fa fa-plus']"/>
                      <span class="pl-1">{{ item }}</span>
                    </div>
                    <div v-else style="display: flex">
                      <i class="fa fa-plus"/>
                      <span class="pl-1">{{ item }}</span>
                    </div>
                </el-radio-button>
              </el-radio-group>
            </el-form-item>
            <!-- </Field> -->
            </div>
          </div>
        <div class="row">
          <div class="col-lg-6">
            <base-input
              alternative=""
              label="Department Name"
              input-classes="form-control-alternative"
              v-model="DepartmentInfo.branchName"
            />
          </div>
        </div>
        <div class="text-right">
          <el-button @click="DepartmentInfos(DepartmentInfo)"  style="background: #464648 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Next</el-button>
          <el-button @click="DepartmentInfos(DepartmentInfo)" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;height: 45px;width: 90px;color: white;">Add</el-button>
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
  name: "DepartmentInfo",
  data() {
    return {
      DepartmentInfo: {
        nameDepartment: "",
        section: "",
        workShift: "",
        branchName: "",
      },
      isActive: false,
      isActiveWork: false,
      valueClicked: "",
      valueClickedWork: "",
      departments: [],
      sections: [],
      workShifts: ['supervisor','supervisors'],
      isSelectDept: false,
      deptActive: null,
      rules: {
        nameDepartment: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        section: [
          {
            required: true,
            message: 'This field is required',
            trigger: 'blur',
          },
        ],
        workShift: [
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
    Form,
    Field,
  },
  mounted(){
    this.getDepartments()
    this.getSections()
    if( this.data[1] !== undefined ){
    this.DepartmentInfo.nameDepartment =  this.data[1].nameDepartment
    this.DepartmentInfo.section = this.data[1].section
    this.DepartmentInfo.workShift = this.data[1].workShift
    this.DepartmentInfo.branchName = this.data[1].branchName
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
    setIconWork(e){
        this.isActiveWork = true
        this.valueClickedWork = e
    },
    selectDept(data){
      console.log(data)
      this.isSelectDept = true
      this.deptActive = data.id
      console.log(this.deptActive)
    },
    getDepartments: function () {
      var app = this;
      axios
        .get("/administration")
        .then(function (response) {
          app.departments = response.data;
          // console.log(app.departments);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    getSections: function () {
      var app = this;
      axios
        .get("/section")
        .then(function (response) {
          app.sections = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    DepartmentInfos(data) {
      console.log("test");
      

      this.$refs['ruleForm'].validate((valid) => {
        if (valid) {
          let clone = { ...data };
          this.$store.state.employees.push(clone);
          this.$router.push({ path: "/AddNewEmployee/JobInformation" });
        } else {
          console.log('error submit!!')
          return false
        }
      })
    },
  },
  setup(props, context) {
    const store = useStore()
    const router = useRouter()

    const schema = yup.object({
      nameDepartment: yup.string().required().label("Name Of Department"),
      section: yup.string().required().label("section"),
      idNumber: yup.number().required().label("ID Number"),
      country: yup.string().required().label("Nationality"),
    });

    function onSubmit(values, actions) {
      // console.log(JSON.stringify(values, null, 2));
      console.log(values);
      let clone = {...values};
      store.state.employees.push(clone);
      router.push({ path: "/AddNewEmployee/JobInformation" });
      this.DepartmentInfo.nameDepartment = values.nameDepartment
      this.DepartmentInfo.section = values.section
      this.DepartmentInfo.workShift = values.workShift
      this.DepartmentInfo.workShift = values.workShift
    }
    return {
      onSubmit,
      schema,
    };
  },
};
</script>
<style scoped>
.card-info {
  min-width: 375px;
}
.el-radio.is-bordered {
  height: 71px !important;
  width: 200px;
  margin-left: 0px!important;
}
</style>
