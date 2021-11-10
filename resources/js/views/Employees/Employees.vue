<template>
    <div class="container-fluid">
      <div class="row">
        <div class="col pt-5">
          <employees-table></employees-table>
        </div>
      </div>
    </div>
</template>
<script>
import EmployeesTable from "./Tables/EmployeesTable";
export default {
  name: "Employees",
  components: {
    EmployeesTable,
  },
};
</script>
<style></style>
