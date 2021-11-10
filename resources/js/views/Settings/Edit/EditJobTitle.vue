<template>
  <h2>Edit Job Title</h2>
  <Form as="el-form" :validation-schema="schema" @submit="onSubmit">
    <Field name="arabicName" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Arabic Name</h5>
        <base-input
          placeholder="Enter Your Arabic Name"
          v-bind="field"
          :model-value="value"
          v-model="jobTitle.arabicName"
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
          v-model="jobTitle.englishName"
        />
      </el-form-item>
    </Field>

    <Field name="sectionName" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Section Name</h5>
        <select 
          class="form-control" 
          v-bind="field"
          :model-value="value"
          v-model="jobTitle.sectionName"
        >
          <option selected>Select Your Section Name</option>
          <option 
            v-for="(item, index) in sections"
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
  name: "EditJobTitle",
  data() {
    return {
      submitted: false,
      jobTitle: {
        arabicName: '',
        englishName: '',
        sectionName: '',
      },
      sections: [],
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
    this.getSections()
  },
  methods: {
    getSections: function () {
      var app = this;
      axios
        .get("/section")
        .then(function (response) {
          app.sections = response.data;
          console.log(app.sections);
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
      sectionName: yup.string().required().label("Section Name"),
    });

    function onSubmit(values, actions) {
      console.log(JSON.stringify(values, null, 2));
      actions.resetForm();
       axios.put(`titlejob/${props.itemToEdit}`, {
         name_ar: values.arabicName,
         name_en: values.englishName,
         section_id: values.sectionName,
         id: props.itemToEdit,
       })
      .then(() => {
        context.emit('close-edit-job-title')
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

</style>
