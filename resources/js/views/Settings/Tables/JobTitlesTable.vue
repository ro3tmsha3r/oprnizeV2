<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
      <div class="text-right"  style="background-color: transparent;">
         <base-button @click="showAddJobTitle" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
            Add New Job Title
        </base-button>
      </div>
  <el-table
    ref="multipleTable"
    :data="jobTitles"
    style="width: 100%"
    @selection-change="handleSelectionChange"
  >
    <el-table-column type="selection" width="55" />
    <el-table-column property="name.ar" label="Arabic Name" width="260" />
    <el-table-column property="name.en" label="English Name" width="260" />
    <el-table-column property="section_id" label="Section Name" width="260" />
    <el-table-column label="Operations">
      <template #default="scope">
        <el-button size="mini" @click="showEditJobTitle(scope.$index, scope.row)"
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
    <el-pagination layout="prev, pager, next" :total="jobTitles.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

  <!-- Call add Job Title popup -->
    <el-dialog
      v-model="addJobTitleAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <add-job-title @close-add-job-title="closeAddJobTitle"/>
    </el-dialog>


    <!-- Call edit Job Title popup -->
    <el-dialog
      v-model="editJobTitleAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <edit-job-title :itemToEdit="itemToEdit" @close-edit-job-title="closeEditJobTitle"/>
    </el-dialog>
</template>
<script>
import axios from "axios";
import AddJobTitle from '../Add/AddJobTitle.vue'
import EditJobTitle from '../Edit/EditJobTitle.vue'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  name: "JobTitlesTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddJobTitle,
    EditJobTitle,
  },
  data() {
    return {
      jobTitles: [],
      addJobTitleAttr: false,
      editJobTitleAttr: false,
      itemToEdit: null,
    };
  },
  mounted() {
    this.getJobTitles();
  },
  methods: {
    showAddJobTitle() {
      this.addJobTitleAttr = true;
    },
    closeAddJobTitle() {
      this.addJobTitleAttr = false;
    },
    showEditJobTitle(index, row) {
      this.editJobTitleAttr = true;
      this.itemToEdit = row.id
    },
    closeEditJobTitle() {
      this.editJobTitleAttr = false;
    },
    getJobTitles: function () {
      var app = this;
      axios
        .get("/titlejob")
        .then(function (response) {
          app.jobTitles = response.data;
          console.log(app.jobTitles);
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
          axios.delete(`titlejob/${row.id}`, {
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
