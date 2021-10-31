<template>
  <div class="limiter">
    <div class="container-login">
      <div class="wrap-login">
        <!-- Organization Name -->
        <div v-if="isSubmited == false" class="login-form validate-form">
          <div class="label-signup">
            You don't have an account? <strong><router-link to='/Signup'>Sign Up</router-link></strong>
          </div>
          <span class="login-form-title">
            Organization Name
          </span>
          <div class="label-name">
            Enter your organization name
          </div>
          <h5>Organization Name</h5>
          <div class="email">
              <label for="NameOrg">Organization Name</label>
              <el-input
                v-model="login.organization"
                class="select-org"
                placeholder=""
                required
              >
                <i class="fa-envelope-o"></i>
              </el-input>
            </div>
          <div class="container-login-form-btn">
            <button @click="submitName(value)" class="login-form-btn">
              Submit
            </button>
          </div>
        </div>

        <!-- Login -->
        <form v-else ref="login" :rules="loginRules" class="login-form validate-form">
          <div class="label-signup">
            You don't have an account? <strong><router-link to='/Signup'>Sign Up</router-link></strong>
          </div>
          <span class="login-form-title">
            Hello, Welcome Back
          </span>
          <div class="label-name">
            Sign in if you have an account
          </div>
          <div class="img-org">
            <span class="circle-image">
              <img src="./assets/image.jpg" />
            </span>
            <p>{{ login.organization }}</p>
          </div>
          <div class="login-info">
            <div class="email">
              <label for="E-mail Address">E-mail Address</label>
              <el-input
                v-model="login.email"
                class="select-org"
                placeholder="Example40@gmail.com"
                required
              >
                <i class="fa-envelope-o"></i>
              </el-input>
            </div>
            <div class="password">
              <label for="password">Password</label>
              <el-input
                v-model="login.password"
                class="select-org"
                type="password"
                placeholder="****************"
                required
              >
                <i class="fa-lock "></i>
                <i
                  @click="showPwd"
                  class="el-input__icon el-icon-view"
                ></i>
              </el-input>
            </div>
          </div>
          <div class="container-login-form-btn">
            <button @click="handleLogin" class="login-form-btn">
              Login
            </button>
          </div>
        </form>

        <div class="login-more" style="">
          <section class="copy">
            <h1 class="text-white">Logo Here</h1>
            <p>Opernize</p>
            <p>Towards a digital transformation</p>
          </section>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import "./assets/main";
import 'element-plus'
import 'element-plus/lib/theme-chalk/index.css'
import axios from "axios";
import {useRouter} from "vue-router";
import {message} from 'element-plus'
// import { validEmail } from "../utils/validate";

export default {
  name: "login",
  data() {
    // const validateEmail = (rule, value, callback) => {
    //   if (!validEmail(value)) {
    //     callback(new Error("Please enter the correct email"));
    //   } else {
    //     callback();
    //   }
    // };
    // const validatePass = (rule, value, callback) => {
    //   if (value.length < 4) {
    //     callback(new Error("Password cannot be less than 4 digits"));
    //   } else {
    //     callback();
    //   }
    // };
    return {
      login: {
        email: "",
        password: "",
        organization: "",
      },
      value2: 0,
      rememberMe: false,
      loginRules: {
        // email: [{ required: true, trigger: "blur", validator: validateEmail }],
        // password: [
        //   { required: true, trigger: "blur", validator: validatePass },
        // ],
      },
      loading: false,
      pwdType: "password",
      isSubmited: false,
      options: [],
      value: [],
      list: [],
      states: [{
          value: 'Alabama',
          label: 'Alabama'
        }, {
          value: 'Fordeal',
          label: 'Fordeal'
        }, {
          value: 'Option3',
          label: 'Option3'
        }, {
          value: 'Option4',
          label: 'Option4'
        }, {
          value: 'Option5',
          label: 'Option5'
        }],
      router: useRouter(),
    };
  },
  methods: {
    submitName(orgName) {
      this.isSubmited = true;
      console.log(orgName);
    },
    showPwd() {
      if (this.pwdType === "password") {
        this.pwdType = "";
      } else {
        this.pwdType = "password";
      }
    },
    async handleLogin() {
      await axios.post('login', {
        email: this.login.email,
        password: this.login.password,
      })
      .then(() => {
        this.$message({
            showClose: true,
            message: "Welcome " + this.login.email,
            type: "success",
          });
        this.$router.push({path: '/Home'})
      })
      .catch((err) => {
          if (err.response.status == 422) {
            console.log(err.response, "incorrect Email or password");
            this.$message({
              showClose: true,
              message: "Incorrect Email or password.",
              type: "error",
            });
          } else {
            console.log(err.response, "error");
            this.$message({
              showClose: true,
              message: "Error, Please retry again!.",
              type: "error",
            });
          }
      });
    },

        


  },
};
</script>
<style lang="scss">
@import "./assets/style.css";
</style>
