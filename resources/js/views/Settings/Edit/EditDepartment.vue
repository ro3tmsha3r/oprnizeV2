<template>
  <h2>Edit Department</h2>
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
      <el-button type="primary" native-type="submit" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;">Edit</el-button>
    </div>
  </Form>
</template>
  
<script>
import axios from 'axios'
import { Field, Form } from "vee-validate";
import * as yup from "yup";

export default {
  name: "EditDepartment",
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
 setup() {
    const schema = yup.object({
      arabicName: yup.string().required().label("Arabic Name"),
      englishName: yup.string().required().label("english Name"),
    });

    function onSubmit(values, actions) {
      console.log(JSON.stringify(values, null, 2));
      actions.resetForm();
      //  axios.post('', {})
      // .then(() => {
      //   this.$message({
      //       showClose: true,
      //       message: department.arabicName + "has been added successfully ",
      //       type: "success",
      //     });
      //   this.$router.push({path: '/'})
      // })
      // .catch((err) => {
      //   console.log(err)
      //       this.$message({
      //         showClose: true,
      //         message: "Try Again!",
      //         type: "error",
      //       });
      // });
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
