<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
      <div class="text-right"  style="background-color: transparent;">
         <base-button @click="showAddMonth" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
            Add New Month
        </base-button>
      </div>

   <el-table :data="months" @row-click="rowClick" style="width: 100%">
    <el-table-column prop="name" label="Date" width="150" />
    <el-table-column label="Operations">
      <template #default="scope">
        <!-- <el-button @click="showEditMonth(scope.$index, scope.row)" size="mini">
          Edit
        </el-button> -->
        <el-button
          size="mini"
          type="danger"
          @click="handleDelete(scope.$index, scope.row)"
        >
          Delete
        </el-button>
      </template>
    </el-table-column>
  </el-table>
  
  </div>

    <div class="block">
    <el-pagination layout="prev, pager, next" :total="months.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

  <!-- Call add Month popup -->
  <el-dialog
      v-model="addMonthAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <add-month @close-add-month="closeAddMonth"/>
  </el-dialog>

</template>
<script>
import axios from "axios";
import AddMonth from '../Add/AddMonth.vue'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  name: "MonthsTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddMonth,
    // EditMonth,
  },
  data() {
    return {
      months: [
        {
          name: 'Tom',
        },
        {
          name: 'Annie',
        },
        {
          name: 'Jack',
        },
      ],
      addMonthAttr: false,
      editMonthAttr: false,
      itemToEdit: null,
    };
  },
  mounted() {
    // this.getMonths();
  },
  methods: {
    rowClick(row, column, event){
      console.log(row)
      console.log(column)
      console.log(event)
      this.$router.push({path: '/'+ row.name +'/PayrollTable'})
    },
    showAddMonth() {
      this.addMonthAttr = true;
    },
    closeAddMonth() {
      this.addMonthAttr = false;
    },
    showEditMonth(index, row) {
      this.editMonthAttr = true;
      this.itemToEdit = row.id
    },
    closeEditMonth() {
      this.editMonthAttr = false;
    },
    getMonths: function () {
      var app = this;
      axios
        .get("/")
        .then(function (response) {
          app.months = response.data;
          console.log(app.months);
          console.log(response.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    handleEdit(index, row) {
      console.log(index, row)
    },
    handleDelete(index, row) {
      console.log(index, row)
      ElMessageBox.confirm(
        'This will permanently delete this. Continue?',
        'Warning',
        {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'warning',
        }
      )
        .then(() => {
          axios.delete(`country/${row.id}`, {
            id: row.id
          })
          .then(() => { 
            ElMessage({
              type: 'success',
              message: 'Delete completed',
            })
          })
          .catch(() => {
          ElMessage({
            type: 'error',
            message: 'Try Again!',
          })
        })

        })
        .catch(() => {
          ElMessage({
            type: 'info',
            message: 'Delete canceled',
          })
        })
      
    },
  },
};
</script>
<style>
.el-table {
  border-radius: 10px 10px 0px 0px!important;
}

.el-table th {
  background: #007CC4 0% 0% no-repeat padding-box!important;
}

.el-table th>.cell{
  color: white;
}

.el-table .cell {
  text-align: center;
  cursor: pointer;
}
.el-dialog {
  background: #FFFFFF 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 50px 3px!important;
}
</style>
