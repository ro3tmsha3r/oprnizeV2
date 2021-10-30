<template>
  <!-- <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
    <div
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
          <base-button @click="showAddWorkingHours" type="primary" icon="ni ni-fat-add" size="md">
            Add Additional Working Hours
          </base-button>
        </div>
        <div class="col text-right">
          <base-button type="primary" icon="ni ni-fat-add">
            Add Additional Financial Movement
          </base-button>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <base-table
        class="table align-items-center table-flush"
        :class="type === 'dark' ? 'table-dark' : ''"
        :thead-classes="type === 'dark' ? 'thead-dark' : 'thead-light'"
        tbody-classes="list"
        :data="employees"
      >
        <template v-slot:columns>
          <th>Job Number</th>
          <th>Employee Arabic Name</th>
          <th>Month</th>
          <th>Basic Salary</th>
          <th>Addition</th>
          <th>Housing Allowance</th>
          <th>Transportation Allowance</th>
          <th>Food Allowance</th>
          <th>Other Allowance 1</th>
          <th>Other Allowance 2</th>
          <th>Deduction</th>
          <th>Gross Income</th>
          <th>Social Insurance</th>
          <th>Loans</th>
          <th>Total Deduction</th>
          <th>Net Salary</th>
          <th>Other Additions</th>
          <th>Other Additions</th>
          <th>Difference Ratio</th>

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
        
      </base-table>
    </div>
    <div
      class="card-footer d-flex justify-content-end"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <base-pagination 
        :per-page="10"
        :total="employees.length"
        >
      </base-pagination>
    </div>
  </div> -->

  <div class="row align-items-center">
        <div class="col text-right" style="background-color: #f6f8fc;">
          <base-button @click="showAddWorkingHours" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
            Add Additional Working Hours
          </base-button>
        </div>
        <div class="col text-right" style="background-color: #f6f8fc;">
          <base-button @click="showAddAdditionalFinancialMovement" type="primary" class="mb-2" icon="ni ni-fat-add">
            Add Additional Financial Movement
          </base-button>
        </div>
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
    <el-table-column property="name_ar" label="Employee Arabic Name" width="200" />
    <el-table-column property="basic_salary" label="Month" width="120" />
    <el-table-column property="basic_salary" label="Basic Salary" width="120" />
    <el-table-column property="location" label="Addition" width="120" />
    <el-table-column property="employee" label="Housing Allowance" width="150" />
    <el-table-column property="address" label="Transportation Allowance" width="200" show-overflow-tooltip />
    <el-table-column property="user_id" label="Food Allowance" width="150" show-overflow-tooltip />
    <el-table-column property="employee" label="Other Allowance 1" width="150" />
    <el-table-column property="employee" label="Other Allowance 2" width="150" />
    <el-table-column property="employee" label="Deduction" width="120" />
    <el-table-column property="employee" label="Gross Income" width="120" />
    <el-table-column property="employee" label="Loans" width="120" />
    <el-table-column property="employee" label="Total Deduction" width="150" />
    <el-table-column property="employee" label="Net Salary" width="120" />
    <el-table-column property="employee" label="Other Additions" width="150" />
    <el-table-column property="employee" label="Difference Ratio" width="150" />

    <el-table-column property="data" label="" width="100" show-overflow-tooltip />
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
  </el-table>
  
    <!-- </div> -->

    <div class="block">
    <!-- <span class="demonstration">When you have more than 7 pages</span> -->
    <el-pagination layout="prev, pager, next" :total="employees.length" class="text-right pt-4"></el-pagination>
  </div>
  <el-dialog
      v-model="addWorkingHoursAttr"
      class="rounded-3xl md:shadow-md"
      width="75%"
    >
      <add-working-hours :status="status" @close-add-working-hours="closeAddWorkingHours"/>
    </el-dialog>

  <el-dialog
      v-model="addFinancialMovementAttr"
      class="rounded-3xl md:shadow-md"
      width="75%"
    >
    <add-financial-movement :status="status" @close-add-financial-movement="closeAddFinancialMovement"/>
  </el-dialog>
</template>
<script>
import axios from "axios";
import AddWorkingHours from '../Form-Wizard/AddWorkingHours.vue'
import AddFinancialMovement from '../Form-Wizard/AddFinancialMovement.vue'
export default {
  name: "TransactionTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddWorkingHours,
    AddFinancialMovement,
  },
  data() {
    return {
      employees: [],
      addWorkingHoursAttr: false,
      addFinancialMovementAttr: false,
      status: 'employee',
      gridData: [
        {
          date: '2016-05-02',
          name: 'John Smith',
          address: 'No.1518,  Jinshajiang Road, Putuo District',
        },
        {
          date: '2016-05-04',
          name: 'John Smith',
          address: 'No.1518,  Jinshajiang Road, Putuo District',
        },
        {
          date: '2016-05-01',
          name: 'John Smith',
          address: 'No.1518,  Jinshajiang Road, Putuo District',
        },
        {
          date: '2016-05-03',
          name: 'John Smith',
          address: 'No.1518,  Jinshajiang Road, Putuo District',
        },
      ],
    };
  },
  mounted() {
    this.getEmployees();
  },
  methods: {
    showAddWorkingHours() {
      this.addWorkingHoursAttr = true;
    },
    showAddAdditionalFinancialMovement(){
      this.addFinancialMovementAttr = true;
    },
    closeAddWorkingHours() {
      this.addWorkingHoursAttr = false;
    },
    closeAddFinancialMovement() {
      this.addFinancialMovementAttr = false;
    },
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
<style></style>
