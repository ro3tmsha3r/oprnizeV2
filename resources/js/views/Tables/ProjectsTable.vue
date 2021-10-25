<template>
  <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
    <div
      class="card-header border-0"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0" :class="type === 'dark' ? 'text-white' : ''">
            {{ title }}
          </h3>
        </div>
        <div class="col text-right">
          <base-button type="primary" icon="ni ni-fat-add" size="md"> <router-link to="/AddNewEmployee"> Add New Employee </router-link></base-button>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <base-table
        class="table align-items-center table-flush"
        :class="type === 'dark' ? 'table-dark' : ''"
        :thead-classes="type === 'dark' ? 'thead-dark' : 'thead-light'"
        tbody-classes="list"
        :data="tableData"
      >
        <template v-slot:columns>
          <th>Job Number</th>
          <th>Employee</th>
          <th>Job Title</th>
          <th>Department</th>
          <th>Location</th>
          <th>Joining Date</th>
          <th>ID / Iqama Number</th>
          <th></th>
        </template>

        <template v-slot:default="row">
          <td class="budget">
            {{ row.item.JobNumber }}
          </td>
          <th scope="row">
            <div class="media align-items-center">
              <a href="#" class="avatar rounded-circle mr-3">
                <img alt="Image placeholder" :src="row.item.img" />
              </a>
              <div class="media-body">
                <span class="name mb-0 text-sm">{{ row.item.Employee }}</span>
              </div>
            </div>
          </th>
          <td>
            {{ row.item.JobTitle }}
          </td>
          
          <td class="budget">
            {{ row.item.Department }}
          </td>

          <td>
              {{ row.item.Location }}
          </td>
          <td>
            {{ row.item.JoiningDate }}
          </td>
          <td>
            {{ row.item.IDIqama }}
          </td>
          <td class="text-right">
            <base-dropdown class="dropdown" position="right">
              <template v-slot:title>
                <a
                  class="btn btn-sm btn-icon-only text-light"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-ellipsis-v"></i>
                </a>
              </template>

                <a class="dropdown-item" href="#"> <i class="fa fa-pencil-square-o"></i>Edit</a>
                <a class="dropdown-item" href="#">End</a>
            </base-dropdown>
          </td>
        </template>
      </base-table>
    </div>

    <div
      class="card-footer d-flex justify-content-end"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <base-pagination total="30"></base-pagination>
    </div>
  </div>
</template>
<script>
export default {
  name: "projects-table",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  data() {
    return {
      tableData: [
        {
          JobNumber: '1',
          img: "img/theme/bootstrap.jpg",
          Employee: "Muhammed Ahmed",
          JobTitle: "HR Manager",
          Department: 'HR',
          Location: 'Riyadh',
          JoiningDate: '22/12/2018',
          IDIqama: '123456789',
        },
        {
          JobNumber: '2',
          img: "img/theme/angular.jpg",
          Employee: "Muhammed Ahmed",
          JobTitle: "HR Manager",
          Department: 'HR',
          Location: 'Riyadh',
          JoiningDate: '22/12/2018',
          IDIqama: '123456789',
        },
        {
          JobNumber: '3',
          img: "img/theme/sketch.jpg",
          Employee: "Muhammed Ahmed",
          JobTitle: "HR Manager",
          Department: 'HR',
          Location: 'Riyadh',
          JoiningDate: '22/12/2018',
          IDIqama: '123456789',
        },
        {
          JobNumber: '4',
          img: "img/theme/react.jpg",
          Employee: "Muhammed Ahmed",
          JobTitle: "HR Manager",
          Department: 'HR',
          Location: 'Riyadh',
          JoiningDate: '22/12/2018',
          IDIqama: '123456789',
        },
        {
          JobNumber: '5',
          img: "img/theme/vue.jpg",
          Employee: "Muhammed Ahmed",
          JobTitle: "HR Manager",
          Department: 'HR',
          Location: 'Riyadh',
          JoiningDate: '22/12/2018',
          IDIqama: '123456789',
        },
      ],
    };
  },
};
</script>
<style></style>
