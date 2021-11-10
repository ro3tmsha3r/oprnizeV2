<template>
  <div :class="type === 'dark' ? 'bg-default' : ''">
       <div class="text-right"  style="background-color: transparent;">
         <base-button @click="showAddCity" class="mb-2" type="primary" icon="ni ni-fat-add" size="md">
            Add New City
        </base-button>
    </div>
  <el-table
    ref="multipleTable"
    :data="cities"
    style="width: 100%"
    @selection-change="handleSelectionChange"
  >
    <el-table-column type="selection" width="55" />
    <el-table-column property="name.ar" label="Arabic Name" width="260" />
    <el-table-column property="name.en" label="English Name" width="260" />
    <el-table-column property="country_id" label="Nationality" width="260" />
    <el-table-column label="Operations">
      <template #default="scope">
        <el-button size="mini" @click="showEditCity(scope.$index, scope.row)"
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
    <el-pagination layout="prev, pager, next" :total="cities.length" :page-size="10" class="text-right pt-4"></el-pagination>
  </div>

  <!-- Call add city popup -->
    <el-dialog
      v-model="addCityAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <add-city @close-add-city="closeAddCity"/>
    </el-dialog>


    <!-- Call edit city popup -->
    <el-dialog
      v-model="editCityAttr"
      class="rounded-3xl md:shadow-md"
      width="30%"
    >
      <edit-city :itemToEdit="itemToEdit" @close-edit-city="closeEditCity"/>
    </el-dialog>
</template>
<script>
import axios from "axios";
import AddCity from '../Pop-up/AddCity.vue'
import EditCity from '../Edit/EditCity.vue'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  name: "CitiesTable",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  components: {
    AddCity,
    EditCity,
  },
  data() {
    return {
      cities: [],
      addCityAttr: false,
      editCityAttr: false,
      itemToEdit: null,
    };
  },
  mounted() {
    this.getCities();
  },
  methods: {
    showAddCity() {
      this.addCityAttr = true;
    },
    closeAddCity() {
      this.addCityAttr = false;
    },
    showEditCity(index, row) {
      this.editCityAttr = true;
      this.itemToEdit = row.id
    },
    closeEditCity() {
      this.editCityAttr = false;
    },
    getCities: function () {
      var app = this;
      axios
        .get("/city")
        .then(function (response) {
          app.cities = response.data;
          console.log(app.cities);
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
          axios.delete(`city/${row.id}`, {
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
