<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
    <div class="text-right"  style="background-color: transparent;">
     <base-button @click="showAddDepartment" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
        Add New Department
      </base-button>
    </div>
  <el-table
    ref="multipleTable"
    :data="departments"
    style="width: 100%"
    @selection-change="handleSelectionChange"
  >
    <el-table-column type="selection" width="55" />
    <el-table-column property="name.ar" label="Arabic Name" width="300" />
    <el-table-column property="job_title" label="English Name" width="300" />
    <el-table-column label="Operations">
      <template #default="scope">
        <el-button size="mini" @click="showEditDepartment"
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
    <el-pagination layout="prev, pager, next" :total="departments.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

  <!-- Call add Department popup -->
    <el-dialog
      v-model="addDepartmentAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <add-department @close-add-department="closeAddDepartment"/>
    </el-dialog>


    <!-- Call edit Department popup -->
    <el-dialog
      v-model="editDepartmentAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <edit-department @close-edit-department="closeEditDepartment"/>
    </el-dialog>
</template>
<script>
import axios from "axios";
import AddDepartment from '../Pop-up/AddDepartment.vue'
import EditDepartment from '../Edit/EditDepartment.vue'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  name: "DepartmentsTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddDepartment,
    EditDepartment,
  },
  data() {
    return {
      departments: [],
      addDepartmentAttr: false,
      editDepartmentAttr: false,
    };
  },
  mounted() {
    this.getDepartments();
  },
  methods: {
    showAddDepartment() {
      this.addDepartmentAttr = true;
    },
    closeAddDepartment() {
      this.addDepartmentAttr = false;
    },
    showEditDepartment() {
      this.editDepartmentAttr = true;
    },
    closeEditDepartment() {
      this.editDepartmentAttr = false;
    },
    getDepartments: function () {
      var app = this;
      axios
        .get("/employee")
        .then(function (response) {
          app.departments = response.data;
          console.log(app.departments);
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
          ElMessage({
            type: 'success',
            message: 'Delete completed',
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
</style>
