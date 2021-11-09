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
        <el-radio-group v-for="(item, index) in nationalities" :key="index" v-model="city.nationality" @change="setIcon">
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

export default {
  name: "AddCity",
  data() {
    return {
      nationalities: ["Saudi Arabian","Egyptian","Los Angeles","Chicago"],
      city: {
        arabicName: "",
        englishName: "",
        nationality: "",
      },
      isActive: false,
      valueClicked: "",
    };
  },
  components: {
    Form,
    Field,
  },
  methods:{
    setIcon(e){
        this.isActive = true
        console.log(this.city.nationality)
        this.valueClicked = e
        console.log('chang',e)
    }
  },
  setup() {
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
      //  axios.post('', {})
      // .then(() => {
      //   this.$message({
      //       showClose: true,
      //       message: city.arabicName + "has been added successfully ",
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
.el-radio-button__inner{
  background: #F3F3F3 0% 0% no-repeat padding-box!important;
  border-radius: 3px 3px 10px 3px!important;
  opacity: 1!important;
}
</style>
