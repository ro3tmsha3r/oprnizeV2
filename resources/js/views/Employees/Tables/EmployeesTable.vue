<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
       <div class="text-right"  style="background-color: transparent;">
          <router-link to="/AddNewEmployee" class="text-white mb-2"
            ><base-button class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
              Add New Employee</base-button
            ></router-link
          >
        </div>
  <el-table
    ref="multipleTable"
    :data="employees"
    style="width: 100%"
    @selection-change="handleSelectionChange"
  >
    <el-table-column type="selection" width="55" />
    <el-table-column property="job_number" label="Job Number" width="120"/>
    <el-table-column property="name.ar" label="Employee" width="120" />
    <el-table-column property="job_title" label="Job Title" width="120" />
    <el-table-column property="department" label="Department" width="120" />
    <el-table-column property="location" label="Location" width="120" />
    <el-table-column property="contract_start_date" label="Joining Date" width="120" />
    <el-table-column property="address" label="Address" show-overflow-tooltip />
    <el-table-column property="user_id" label="ID / Iqama Number" width="150" show-overflow-tooltip />
    <el-table-column label="" width="55" show-overflow-tooltip >
      <base-dropdown class="dropdown" position="right">
                <a
                  class="btn btn-sm btn-icon-only text-light"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-ellipsis-v"></i>
                </a>

              <a class="dropdown-item" href="#">
                <i class="fa fa-pencil-square-o"></i>Edit</a
              >
              <a class="dropdown-item" href="#">End</a>
            </base-dropdown>
    </el-table-column>
  </el-table>
  
    </div>

    <div class="block">
    <!-- <span class="demonstration">When you have more than 7 pages</span> -->
    <el-pagination layout="prev, pager, next" :total="employees.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "EmployeesTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  data() {
    return {
      employees: [],
    };
  },
  mounted() {
    this.getEmployees();
  },
  methods: {
    getEmployees: function () {
      var app = this;
      axios
        .get("/employee")
        .then(function (response) {
          app.employees = response.data;
          console.log(app.employees);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
<style>
.el-table th {
    background-color: #19125E!important;
}

.el-table th>.cell{
  color: white;
}
</style>
