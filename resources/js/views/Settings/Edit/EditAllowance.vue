<template>
  <h2>Edit Allowance</h2>
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
    <Field name="allowanceType" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Allowance Type</h5>
        <el-radio-group v-for="(item, index) in types" :key="index" v-model="allowance.allowanceType" @change="setIcon">
          <el-radio-button
            class="border-0 mx-1"
            v-bind="field"
            :model-value="value"
           :label="item"
          >
              <div v-if="valueClicked == item" style="display: flex">
                <i :class="[isActive ? 'fa fa-check' : 'fa fa-plus']"/>
                <span class="pl-1">{{ item }}</span>
              </div>
              <div v-else style="display: flex">
                <i class="fa fa-plus"/>
                <span class="pl-1">{{ item }}</span>
              </div>
           </el-radio-button>
        </el-radio-group>
      </el-form-item>
    </Field>

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
            />
          </el-form-item>
        </Field>
      </div>
    </div>

    <Field name="isCalculated" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage" >
        <div style="display: flex!important;">
          <h5 class="pr-3">It is calculated in the previous salary</h5>
          <el-switch v-bind="field"
            :model-value="value" 
            v-model="allowance.isCalculated" 
          />
        </div>
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
import BaseInput from '../../../components/BaseInput.vue';
import { ElMessage } from 'element-plus'

export default {
  name: "EditAllowance",
  data() {
    return {
      allowance: {
        arabicName: '',
        englishName: '',
        allowanceType: '',
        valueInRyal: null,
        valueInPercentage: null,
        isCalculated: false,
      },
      isActive: false,
      valueClicked: "",
      types: ['Addition','Deduction']
    };
  },
  props:{
    itemToEdit: Number,
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
      allowanceType: yup.string().required().label("Allowance Type"),
      valueInRyal: yup.number().required().label('Value In Ryal'),
      valueInPercentage: yup.number().min(1).max(100).required().label('Value In Percentage'),
    });

    function onSubmit(values, actions) {
      console.log(JSON.stringify(values, null, 2));
      actions.resetForm();
       axios.put(`allowance/${props.itemToEdit}`,  {
         name_ar: values.arabicName,
         name_en: values.englishName,
         type: values.allowanceType,
         price: values.valueInRyal,
         percentage: values.valueInPercentage,
         id: props.itemToEdit,
       })
      .then(() => {
        context.emit('close-edit-allowance')
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
