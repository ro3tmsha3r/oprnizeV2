<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
    <div class="text-right"  style="background-color: transparent;">
     <base-button @click="showAddSection" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
        Add New Section
      </base-button>
    </div>
  <el-table
    ref="multipleTable"
    :data="Sections"
    style="width: 100%"
    @selection-change="handleSelectionChange"
  >
    <el-table-column type="selection" width="55" />
    <el-table-column property="name.ar" label="Arabic Name" width="260" />
    <el-table-column property="name.en" label="English Name" width="260" />
    <el-table-column property="administration_id" label="Department Name" width="260" />
    <el-table-column label="Operations">
      <template #default="scope">
        <el-button size="mini" @click="showEditSection(scope.$index, scope.row)"
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
    <el-pagination layout="prev, pager, next" :total="Sections.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

  <!-- Call add Section popup -->
    <el-dialog
      v-model="addSectionAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <add-section @close-add-section="closeAddSection"/>
    </el-dialog>

    <!-- Call edit Section popup -->
    <el-dialog
      v-model="editSectionAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <edit-section :itemToEdit="itemToEdit" @close-edit-section="closeEditSection"/>
    </el-dialog>
</template>
<script>
import axios from "axios";
import AddSection from '../Pop-up/AddSection.vue'
import EditSection from '../Edit/EditSection.vue'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  name: "SectionsTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddSection,
    EditSection,
  },
  data() {
    return {
      Sections: [],
      addSectionAttr: false,
      editSectionAttr: false,
      itemToEdit: null,
    };
  },
  mounted() {
    this.getSections();
  },
  methods: {
    showAddSection() {
      this.addSectionAttr = true;
    },
    closeAddSection() {
      this.addSectionAttr = false;
    },
    showEditSection(index, row) {
      this.editSectionAttr = true;
      this.itemToEdit = row.id
    },
    closeEditSection() {
      this.editSectionAttr = false;
    },
    getSections: function () {
      var app = this;
      axios
        .get("/section")
        .then(function (response) {
          app.Sections = response.data;
          console.log(app.Sections);
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
          axios.delete(`section/${row.id}`, {
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
</style>
