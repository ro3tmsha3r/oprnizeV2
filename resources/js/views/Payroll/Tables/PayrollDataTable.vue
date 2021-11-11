<template>
  <div>
    <p>Thursday, February 25, 2021 </p>
  </div>
  
  <el-table
    ref="multipleTable"
    :data="employees"
    style="width: 100%"
    border="false"
    @selection-change="handleSelectionChange"
  >
    <el-table-column label="Employee's Information">
      <el-table-column class-name="column-child" prop="state" label="Job Number" width="110" />
      <el-table-column class-name="column-child" prop="city" label="Employee's Name" width="130" />
    </el-table-column>
    <el-table-column label="Basic And Allowances">
      <el-table-column class-name="column-child" prop="state" label="basic" width="120" />
      <el-table-column prop="city" label="Housing Allowance" width="140" />
      <el-table-column property="address" label="Transportation Allowance" width="150" />
      <el-table-column property="employee" label="Other" width="120" />
      <el-table-column property="employee" label="Total" width="120" />
    </el-table-column>
    <el-table-column label="Additions">
      <el-table-column prop="state" label="Overtime" width="120" />
      <el-table-column prop="city" label="Other" width="120" />
      <el-table-column property="employee" label="Total" width="150" />
    </el-table-column>
    <el-table-column label="Deductions">
      <el-table-column prop="state" label="Social Insurance" width="120" />
      <el-table-column prop="city" label="Labor Violation" width="120" />
      <el-table-column prop="city" label="Financial Advance" width="120" />
      <el-table-column property="employee" label="Total Deduction" width="120" />
    </el-table-column>
    <el-table-column label="Payment Info">
      <el-table-column prop="state" label="Net Salary" width="120" />
    </el-table-column>
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
export default {
  name: "payroll-data-table",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  data() {
    return {
      employees: [],
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
.el-table .cell{
  word-break: normal!important;
}

/* .column-child{
  background: #961d5f 0% 0% no-repeat padding-box!important
} */
</style>
