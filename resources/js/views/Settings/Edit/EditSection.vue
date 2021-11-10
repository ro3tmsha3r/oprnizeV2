<template>
  <h2>Edit Section</h2>
  <Form as="el-form" :validation-schema="schema" @submit="onSubmit">
    <Field name="arabicName" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Arabic Name</h5>
        <base-input
          placeholder="Enter Your Arabic Name"
          v-bind="field"
          :model-value="value"
          v-model="section.arabicName"
        />
      </el-form-item>
    </Field>

    <Field name="englishName" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>English Name</h5>
        <base-input
          placeholder="Enter Your English Name"
          v-bind="field"
          :model-value="value"
          v-model="section.englishName"
        />
      </el-form-item>
    </Field>

    <Field name="departmentName" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Department Name</h5>
        <select 
          class="form-control" 
          v-bind="field"
          :model-value="value"
          v-model="section.departmentName"
        >
          <option selected>Select Your Department Name</option>
          <option 
            v-for="(item, index) in departments"
            :key="index"
            :value="item.id"
          >
            {{ item.name.ar }}
          </option>
        </select>
      </el-form-item>
    </Field>

    <div style="text-align: end;">
      <el-button type="primary" native-type="submit" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;">Edit</el-button>
    </div>
  </Form>
</template>
  
<script>
import axios from 'axios'
import { Field, Form } from "vee-validate";
import * as yup from "yup";
import { ElMessage } from 'element-plus'

export default {
  name: "EditSection",
  data() {
    return {
      submitted: false,
      section: {
        arabicName: '',
        englishName: '',
        departmentName: '',
      },
      departments: [],

    };
  },
  props:{
    itemToEdit: Number,
  },
  components: {
    Form,
    Field,
  },
  mounted(){
    this.getDepartments()
  },
  methods: {
    getDepartments: function () {
      var app = this;
      axios
        .get("/administration")
        .then(function (response) {
          app.departments = response.data;
          console.log(app.departments);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
 setup(props, context) {
    const schema = yup.object({
      arabicName: yup.string().required().label("Arabic Name"),
      englishName: yup.string().required().label("english Name"),
      departmentName: yup.string().required().label("Department Name"),
    });

    function onSubmit(values, actions) {
      console.log(JSON.stringify(values, null, 2));
      actions.resetForm();
       axios.put(`section/${props.itemToEdit}`, {
         name_ar: values.arabicName,
         name_en: values.englishName,
         administration_id: values.departmentName,
         id: props.itemToEdit,
       })
      .then(() => {
        context.emit('close-edit-section')
        ElMessage({
          showClose: true,
          message: values.arabicName + "has been updated successfully ",
          type: 'success',
        })
      })
      .catch((err) => {
        console.log(err)
        ElMessage.error('Try again!')
      });
    }
    return {
      onSubmit,
      schema,
    };
  },
};


</script>

<style lang="scss">
.form-control {
    border: 0.30000001192092896px solid #007CC4!important;
    border-radius: 3px 3px 10px 3px!important;
    opacity: 1!important;
}
</style>
