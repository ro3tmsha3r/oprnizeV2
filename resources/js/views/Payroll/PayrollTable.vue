<template>
  <div class="pt-5 px-2">
    <payroll-data-table></payroll-data-table>
  </div>
</template>
<script>
import PayrollDataTable from "./Tables/PayrollDataTable.vue";
export default {
  name: "PayrollTable",
  components: {
    PayrollDataTable,
  },
};
</script>
<style></style>
