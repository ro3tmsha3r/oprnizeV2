<template>
  <h2>Add New City</h2>
  <Form as="el-form" :validation-schema="schema" @submit="onSubmit">
    <Field name="arabicName" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Arabic Name</h5>
        <base-input
          placeholder="Enter Your Arabic Name"
          v-bind="field"
          :model-value="value"
          v-model="city.arabicName"
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
          v-model="city.englishName"
        />
      </el-form-item>
    </Field>

    <Field name="nationality" v-slot="{ value, field, errorMessage }">
      <el-form-item :error="errorMessage">
        <h5>Select Nationality</h5>
        <el-radio-group v-for="(item, index) in nationalities" :key="index" v-model="city.nationality" @change="setIcon(item)">
          <el-radio-button
            class="border-0 mx-1"
            v-bind="field"
            :model-value="value"
           :label="item.id"
          >
              <div v-if="valueClicked == item" style="display: flex">
                <i :class="[isActive ? 'fa fa-check' : 'fa fa-plus']"/>
                <span class="pl-1">{{ item.name.ar }}</span>
              </div>
              <div v-else style="display: flex">
                <i class="fa fa-plus"/>
                <span class="pl-1">{{ item.name.ar }}</span>
              </div>
           </el-radio-button>
        </el-radio-group>
      </el-form-item>
    </Field>
    

    <div style="text-align: end">
      <el-button
        type="primary"
        native-type="submit"
        style="
          background: #007cc4 0% 0% no-repeat padding-box;
          border-radius: 3px 3px 10px 3px;
        "
        >
        Add
      </el-button>
    </div>
  </Form>
</template>

<script>
import axios from "axios";
import { Field, Form } from "vee-validate";
import * as yup from "yup";
import { ElMessage } from 'element-plus'

export default {
  name: "AddCity",
  data() {
    return {
      city: {
        arabicName: "",
        englishName: "",
        nationality: "",
        country_id: null,
      },
      isActive: false,
      valueClicked: "",
      nationalities: [],
    };
  },
  components: {
    Form,
    Field,
  },
  mounted() {
    this.getNationalities();
  },
  methods:{
    setIcon(e){
        this.isActive = true
        this.valueClicked = e
        console.log('chang',e)
    },
    getNationalities() {
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
  },
  setup(props, context) {
    const schema = yup.object({
      arabicName: yup.string().required().label("Arabic Name"),
      englishName: yup.string().required().label("English Name"),
      nationality: yup
        .string()
        .required()
        .label("Nationality"),
    });
    function onSubmit(values, actions) {
      console.log(JSON.stringify(values, null, 2));
      actions.resetForm();
       axios.post('/city', {
        name_ar: values.arabicName,
        name_en: values.englishName,
        country_id: values.nationality,
       })
      .then(() => {
        context.emit('close-add-city')
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
.el-radio-button__inner{
  background: #F3F3F3 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 10px 3px!important;
  opacity: 1!important;
}
</style>
