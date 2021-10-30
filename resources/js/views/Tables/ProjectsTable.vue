<template>
  <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
    <!-- <div
      class="card-header border-0"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0" :class="type === 'dark' ? 'text-white' : ''">
            {{ title }}
          </h3>
        </div>
        <div class="col text-right">
          <router-link to="/AddNewEmployee" class="text-white"
            ><base-button type="primary" icon="ni ni-fat-add" size="md">
              Add New Employee</base-button
            ></router-link
          >
        </div>
      </div>
    </div> -->
    
    <!-- Oprnize -->
    <div class="table-responsive">
      <!-- <base-table
        class="table align-items-center table-flush"
        :class="type === 'dark' ? 'table-dark' : ''"
        :thead-classes="type === 'dark' ? 'thead-dark' : 'thead-light'"
        tbody-classes="list"
        :data="employees"
      >
        <template v-slot:columns>
          <th>Job Number</th>
          <th>Employee</th>
          <th>Job Title</th>
          <th>Department</th>
          <th>Location</th>
          <th>Joining Date</th>
          <th>ID / Iqama Number</th>
          <th></th>
        </template>

        <template v-slot:default="row">
          <td class="budget text-center">
            {{ row.item.job_number }}
          </td>
          <th scope="row" class="text-center">
            <div class="media align-items-center">
              <a href="#" class="avatar rounded-circle mr-3">
                <img alt="Image placeholder" :src="row.item.img" />
              </a>

              <div class="media-body">
                <span class="name mb-0 text-sm"
                  ><a>{{ row.item.name.en }}</a></span
                >
              </div>
            </div>
          </th>
          <td class="text-center">
            {{ row.item.job_title }}
          </td>

          <td class="budget text-center">
            {{ row.item.Department }}
          </td>

          <td class="text-center">
            {{ row.item.Location }}
          </td>
          <td class="text-center">
            {{ row.item.contract_start_date }}
          </td>
          <td class="text-center">
            {{ row.item.user_id }}
          </td>
          <td class="text-right">
            <base-dropdown class="dropdown" position="right">
              <template v-slot:title>
                <a
                  class="btn btn-sm btn-icon-only text-light"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-ellipsis-v"></i>
                </a>
              </template>

              <a class="dropdown-item" href="#">
                <i class="fa fa-pencil-square-o"></i>Edit</a
              >
              <a class="dropdown-item" href="#">End</a>
            </base-dropdown>
          </td>
        </template>
        
      </base-table> -->
       </div>
       <div class="text-right"  style="background-color: #f6f8fc;">
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
    <el-table-column property="job_number" label="Job Number" width="120">
    </el-table-column>
    <el-table-column property="name.ar" label="Employee" width="120" />
    <el-table-column property="job_title" label="Job Title" width="120" />
    <el-table-column property="department" label="Department" width="120" />
    <el-table-column property="location" label="Location" width="120" />
    <el-table-column property="contract_start_date" label="Joining Date" width="120" />
    <el-table-column property="address" label="Address" show-overflow-tooltip />
    <el-table-column property="user_id" label="ID / Iqama Number" width="150" show-overflow-tooltip />
    <el-table-column label="" width="55" show-overflow-tooltip />
    <!-- <template> -->
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
    <!-- </template> -->
  </el-table>
  
    </div>

    <div class="block">
    <!-- <span class="demonstration">When you have more than 7 pages</span> -->
    <el-pagination layout="prev, pager, next" :total="employees.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

    <!-- <div
      class="card-footer d-flex justify-content-end"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <base-pagination 
        :per-page="10"
        :total="employees.length"
        >
      </base-pagination>
    </div> -->
 






</template>
<script>
import axios from "axios";
export default {
  name: "projects-table",
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
