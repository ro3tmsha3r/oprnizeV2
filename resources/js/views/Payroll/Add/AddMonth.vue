<template> 
    <h2>Add Month</h2>
  <Form as="el-form" :validation-schema="schema" @submit="onSubmit">
    <Field name="month" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <div class="block">
        <span class="demonstration">Choose Month</span>
        <base-input
          type="month"
          alternative=""
          input-classes="form-control-alternative"
          v-bind="field"
          :model-value="value"
          v-model="month"
        />
      </div>
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
    name: "AddMonth",
    data(){
      return {
        month: '',
      }
    },
    components: {
    Form,
    Field,
  },
 setup(props, context) {
    const schema = yup.object({
      month: yup.string().required().label("Month"),
    });

    function onSubmit(values, actions) {
      actions.resetForm();
      console.log(values.month)
      //  axios.post('', {
      //    month: values.month,
      //  })
      // .then(() => {
      //   context.emit('close-add-month')
      //   ElMessage({
      //     showClose: true,
      //     message: values.month + " has been added successfully ",
      //     type: 'success',
      // })
      // })
      // .catch((err) => {
      //   console.log(err)
      //   ElMessage.error('Try again!')
      // });
    }
    return {
      onSubmit,
      schema,
    };
  },
}
</script>