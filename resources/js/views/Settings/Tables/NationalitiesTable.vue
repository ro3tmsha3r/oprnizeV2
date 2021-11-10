<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
      <div class="text-right"  style="background-color: transparent;">
         <base-button @click="showAddNationality" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
            Add New Nationality
        </base-button>
      </div>
  <el-table
    ref="multipleTable"
    :data="nationalities"
    style="width: 100%"
    @selection-change="handleSelectionChange"
  >
    <el-table-column type="selection" width="55" />
    <el-table-column property="name.ar" label="Arabic Name" width="300" />
    <el-table-column property="name.en" label="English Name" width="300" />
    <el-table-column label="Operations">
      <template #default="scope">
        <el-button @click="showEditNationality(scope.$index, scope.row)" size="mini">
          Edit
        </el-button>
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
    <!-- <span class="demonstration">When you have more than 7 pages</span> -->
    <el-pagination layout="prev, pager, next" :total="nationalities.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

  <!-- Call add nationality popup -->
  <el-dialog
      v-model="addNationalityAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <add-nationality @close-add-nationality="closeAddNationality"/>
  </el-dialog>

  <!-- Call edit nationality popup -->
  <el-dialog
      v-model="editNationalityAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <edit-nationality :itemToEdit="itemToEdit" @close-add-nationality="closeAddNationality"/>
  </el-dialog>
</template>
<script>
import axios from "axios";
import AddNationality from '../Pop-up/AddNationality.vue'
import EditNationality from '../Edit/EditNationality.vue'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  name: "NationalitiesTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddNationality,
    EditNationality,
  },
  data() {
    return {
      nationalities: [],
      addNationalityAttr: false,
      editNationalityAttr: false,
      itemToEdit: null,
    };
  },
  mounted() {
    this.getNationalities();
  },
  methods: {
    showAddNationality() {
      this.addNationalityAttr = true;
    },
    closeAddNationality() {
      this.addNationalityAttr = false;
    },
    showEditNationality(index, row) {
      this.editNationalityAttr = true;
      this.itemToEdit = row.id
    },
    closeEditNationality() {
      this.editNationalityAttr = false;
    },
    getNationalities: function () {
      var app = this;
      axios
        .get("/country")
        .then(function (response) {
          app.nationalities = response.data;
          console.log(app.nationalities);
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
}
.el-dialog {
  background: #FFFFFF 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 50px 3px!important;
}
</style>
