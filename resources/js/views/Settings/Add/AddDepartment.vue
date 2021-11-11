<template>
  <h2>Add New Department</h2>
  <Form as="el-form" :validation-schema="schema" @submit="onSubmit">
    <Field name="arabicName" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Arabic Name</h5>
        <base-input
          placeholder="Enter Your Arabic Name"
          v-bind="field"
          :model-value="value"
          v-model="department.arabicName"
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
          v-model="department.englishName"
        />
      </el-form-item>
    </Field>

    <div style="text-align: end;">
      <el-button type="primary" native-type="submit" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;">Add</el-button>
    </div>
  </Form>
</template>
  
<script>
import axios from 'axios'
import { Field, Form } from "vee-validate";
import * as yup from "yup";
import { ElMessage } from 'element-plus'

export default {
  name: "AddDepartment",
  data() {
    return {
      submitted: false,
      department: {
        arabicName: '',
        englishName: '',
      }
    };
  },
  components: {
    Form,
    Field,
  },
 setup(props, context) {
    const schema = yup.object({
      arabicName: yup.string().required().label("Arabic Name"),
      englishName: yup.string().required().label("english Name"),
    });

    function onSubmit(values, actions) {
      console.log(JSON.stringify(values, null, 2));
      actions.resetForm();
       axios.post('/administration', {
         name_ar: values.arabicName,
         name_en: values.englishName,
       })
      .then(() => {
        context.emit('close-add-department')
        ElMessage({
          showClose: true,
          message: values.arabicName + "has been added successfully ",
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
