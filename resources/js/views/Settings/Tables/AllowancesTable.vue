<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
       <div class="text-right"  style="background-color: transparent">
         <base-button @click="showAddAllowance" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
            Add New Allowance
        </base-button>
    </div>
  <el-table
    ref="multipleTable"
    :data="allowances"
    style="width: 100%"
    @selection-change="handleSelectionChange"
  >
    <el-table-column type="selection" width="55" />
    <el-table-column property="name.ar" label="Arabic Name" width="140" />
    <el-table-column property="name.en" label="English Name" width="140" />
    <el-table-column property="type" label="Allowance Type" width="140" />
    <el-table-column property="price" label="Value In Ryal" width="130" />
    <el-table-column property="percentage" label="Value In Percentage" width="160" />
    <el-table-column property="is_calculated" label="Calculated in the previous salary" width="200" />
    <el-table-column label="Operations">
      <template #default="scope">
        <el-button size="mini" @click="showEditAllowance(scope.$index, scope.row)"
          >Edit</el-button
        >
        <el-button
          size="mini"
          type="danger"
          @click="handleDelete(scope.$index, scope.row)"
          >Delete</el-button
        >
      </template>
    </el-table-column>
  </el-table>
  
  </div>

    <div class="block">
    <!-- <span class="demonstration">When you have more than 7 pages</span> -->
    <el-pagination layout="prev, pager, next" :total="allowances.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

  <!-- Call add Allowance popup -->
    <el-dialog
      v-model="addAllowanceAttr"
      class="rounded-3xl md:shadow-md"
      width="50%"
    >
      <add-allowance @close-add-allowance ="closeAddAllowance "/>
    </el-dialog>


    <!-- Call edit Allowance popup -->
    <el-dialog
      v-model="editAllowanceAttr"
      class="rounded-3xl md:shadow-md"
      width="50%"
    >
      <edit-allowance :itemToEdit="itemToEdit" @close-edit-allowance ="closeEditAllowance "/>
    </el-dialog>
</template>
<script>
import axios from "axios";
import AddAllowance from '../Pop-up/AddAllowance.vue'
import EditAllowance from '../Edit/EditAllowance.vue'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  name: "AllowancesTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddAllowance,
    EditAllowance,
  },
  data() {
    return {
      allowances: [],
      addAllowanceAttr: false,
      editAllowanceAttr: false,
      itemToEdit: null,
    };
  },
  mounted() {
    this.getAllowances();
  },
  methods: {
    showAddAllowance() {
      this.addAllowanceAttr = true;
    },
    closeAddAllowance() {
      this.addAllowanceAttr = false;
    },
    showEditAllowance(index, row) {
      this.editAllowanceAttr = true;
      this.itemToEdit = row.id
    },
    closeEditAllowance() {
      this.editAllowanceAttr = false;
    },
    getAllowances: function () {
      var app = this;
      axios
        .get("/allowance")
        .then(function (response) {
          app.allowances = response.data;
          console.log(app.allowances);
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
          axios.delete(`allowance/${row.id}`, {
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
}
.el-dialog {
  background: #FFFFFF 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 50px 3px!important;
}
</style>
