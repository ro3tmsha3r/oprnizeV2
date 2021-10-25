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
          <el-select
            v-model="login.organization"
            filterable
            remote
            reserve-keyword
            placeholder=""
            :loading="loading"
            class="select-org"
            required
          >
            <el-option
              v-for="item in states"
              :key="item.value"
              :label="item.label"
              :value="item.value"
            >
            </el-option>
            <i slot="prefix" class="el-icon-office-building"></i>
          </el-select>
          <div class="container-login-form-btn">
            <button @click="submitName(value)" class="login-form-btn">
              Submit
            </button>
          </div>
        </div>

        <!-- Login -->
        <div v-else ref="login" :rules="loginRules" class="login-form validate-form">
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
                <i slot="prefix" class="el-input__icon el-icon-message"></i>
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
                <i slot="prefix" class="el-input__icon el-icon-lock"></i>
                <i
                  @click="showPwd"
                  slot="suffix"
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
        </div>

        <div class="login-more" style="">
          <section class="copy">
            <h1>Logo Here</h1>
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
// import "element-ui";
import axios from "axios";
import {useRouter} from "vue-router";
// import { validEmail } from "../utils/validate";

export default {
  name: "login",
  data() {
    const router = useRouter();
    const validateEmail = (rule, value, callback) => {
      if (!validEmail(value)) {
        callback(new Error("Please enter the correct email"));
      } else {
        callback();
      }
    };
    const validatePass = (rule, value, callback) => {
      if (value.length < 4) {
        callback(new Error("Password cannot be less than 4 digits"));
      } else {
        callback();
      }
    };
    return {
      login: {
        email: "",
        password: "",
        organization: "",
      },
      rememberMe: false,
      loginRules: {
        email: [{ required: true, trigger: "blur", validator: validateEmail }],
        password: [
          { required: true, trigger: "blur", validator: validatePass },
        ],
      },
      loading: false,
      pwdType: "password",
      isSubmited: false,
      options: [],
      value: [],
      list: [],
      states: [
        {
          label: "Alabama",
          value: "Alabama",
        },
        {
          label: "Fordeal",
          value: "Fordeal",
        },
      ],
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
    handleLogin() {
      this.loading = true;
      axios
        .post("/login", { login: this.login, remember: this.rememberMe })
        .then((response) => {
          this.$message({
            showClose: true,
            message: "Welcome " + this.login.email,
            type: "success",
          });
          router.push({
            path: "/",
          });
        })
        .catch((err) => {
          this.loading = false;
          if (err.response.status == 422) {
            console.log(err.response, "incorrect Email or password");
            this.$message({
              showClose: true,
              message: "The given data was invalid.",
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
