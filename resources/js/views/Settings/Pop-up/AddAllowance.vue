<template>
  <h2>Add New Allowance</h2>
  <Form as="el-form" :validation-schema="schema" @submit="onSubmit">
    <div class="row">
      <div class="col-lg-6">
        <Field name="arabicName" v-slot="{ value, field, errorMessage }">
          <el-form-item :error="errorMessage">
            <h5>Arabic Name</h5>
            <base-input
              placeholder="Enter Your Arabic Name"
              v-bind="field"
              :model-value="value"
              v-model="allowance.arabicName"
            />
          </el-form-item>
        </Field>
      </div>
      <div class="col-lg-6">
        <Field name="englishName" v-slot="{ value, field, errorMessage }">
          <el-form-item :error="errorMessage">
            <h5>English Name</h5>
            <base-input
              placeholder="Enter Your English Name"
              v-bind="field"
              :model-value="value"
              v-model="allowance.englishName"
            />
          </el-form-item>
        </Field>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <Field name="valueInRyal" v-slot="{ value, field, errorMessage }">
          <el-form-item :error="errorMessage">
            <h5>Value In Ryal</h5>
            <base-input
              type="number"
              v-bind="field"
              :model-value="value"
              v-model="allowance.valueInRyal"
              v-bind:disabled="allowance.valueInPercentage.length > 0"
            />
          </el-form-item>
        </Field>
      </div>

      <div class="col-lg-6">
        <Field name="valueInPercentage" v-slot="{ value, field, errorMessage }">
          <el-form-item :error="errorMessage">
            <h5>Value In Percentage</h5>
            <base-input
              type="number"
              v-bind="field"
              :model-value="value"
              v-model="allowance.valueInPercentage"
              v-bind:disabled="allowance.valueInRyal.length > 0"
            />
          </el-form-item>
        </Field>
      </div>
    </div>

    <div style="text-align: end;">
      <el-button type="primary" native-type="submit" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;">Add</el-button>
    </div>
  </Form>
</template>
  
<script>
import axios from 'axios'
import { Field, Form } from "vee-validate";
import * as yup from "yup";
import BaseInput from '../../../components/BaseInput.vue';
import { ElMessage } from 'element-plus'


export default {
  name: "AddAllowance",
  data() {
    return {
      allowance: {
        arabicName: '',
        englishName: '',
        valueInRyal: '',
        valueInPercentage: '',
      },
      isActive: false,
      valueClicked: "",
    };
  },
  components: {
    Form,
    Field,
    BaseInput,
  },
  methods:{
    setIcon(e){
        this.isActive = true
        this.valueClicked = e
        console.log('chang',e)
    }
  },
 setup(props, context) {
    const schema = yup.object({
      arabicName: yup.string().required().label("Arabic Name"),
      englishName: yup.string().required().label("english Name"),
      valueInRyal: yup.number().label('Value In Ryal'),
      valueInPercentage: yup.number().min(1).max(100).label('Value In Percentage'),
    });

    function onSubmit(values, actions) {
      console.log(JSON.stringify(values, null, 2));
      actions.resetForm();
       axios.post('/allowance', {
         name_ar: values.arabicName,
         name_en: values.englishName,
         price: values.valueInRyal,
         percentage: values.valueInPercentage,
       })
      .then(() => {
        context.emit('close-add-allowance')
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
