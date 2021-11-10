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

      <form>
        <h6 class="heading-small text-muted mb-4">Department information</h6>
          <div class="row">
            <div class="col-lg-12">
              <label>Name Of Department</label> <br />
              <div size="medium">
                <el-radio
                  v-for="(item, index) in departments"
                  :key="index"
                  v-model="DepartmentInfo.nameDepartment"
                  :label="item.name.ar"
                  border
                >
                </el-radio>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <label>Section</label> <br />
              <el-radio-group v-for="(item, index) in sections" :key="index" v-model="DepartmentInfo.section" @change="setIcon(item)">
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
            <div class="col-lg-6">
              <label>Work Shift</label> <br />
              <el-radio-group v-model="DepartmentInfo.workShift" size="medium">
                <el-radio-button @click="showFWork" label="Supervisor">
                  <div style="display: flex">
                    <i
                      :class="[isActiveFWork ? 'fa fa-check' : 'fa fa-plus']"
                    ></i
                    ><span>Supervisor</span>
                  </div>
                </el-radio-button>
                <el-radio-button
                  @click="showSWork"
                  label="Supervisors"
                  class="ml-2"
                >
                  <div style="display: flex">
                    <i
                      :class="[isActiveSWork ? 'fa fa-check' : 'fa fa-plus']"
                    ></i
                    ><span>Supervisors</span>
                  </div>
                </el-radio-button>
              </el-radio-group>
            </div>
          </div>
        <div class="row">
          <div class="col-lg-6">
            <base-input
              alternative=""
              label="Department Name"
              input-classes="form-control-alternative"
              v-model="DepartmentInfo.branchName"
              required
            />
          </div>
        </div>
        <div class="text-right">
          <router-link to="/AddNewEmployee/JobInformation"
            ><button
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
            </button></router-link
          >
          <button
            @click="DepartmentInfos(DepartmentInfo)"
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
import axios from "axios";

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
      valueClicked: "",
      departments: [],
      sections: [],
    };
  },
  mounted(){
    this.getDepartments()
    this.getSections()
  },
  methods: {
    getDepartments: function () {
      var app = this;
      axios
        .get("/administration")
        .then(function (response) {
          app.departments = response.data;
          console.log(app.departments);
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
          console.log(app.sections);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    DepartmentInfos(data) {
      console.log("test");
      let clone = { ...data };
      this.$store.state.employees.push(clone);
      this.$router.push({ path: "/AddNewEmployee/JobInformation" });
    },
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
