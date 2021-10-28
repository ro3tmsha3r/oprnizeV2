<template>
  <div class="limiter">
    <div class="container-login">
      <div class="wrap-login">
        <!-- Sign Up -->
        <form @submit.prevent="handleSignUp" class="login-form validate-form">
          <div class="label-signup">
            You already have an account? <strong><router-link to='/login'>Login</router-link></strong>
          </div>
          <span class="login-form-title">
            Hello, Welcome
          </span>
          <div class="label-name-signup">
            Create an account
          </div>
          <div class="login-info">
            <div class="username">
              <label for="E-mail Address">Username</label>
              <el-input 
                v-model="signup.username" 
                class="select-org" 
                required
              >
                <i slot="prefix" class="el-input__icon el-icon-user"></i>
              </el-input>
            </div>
            <div class="email">
              <label for="E-mail Address">E-mail Address</label>
              <el-input 
                v-model="signup.email" 
                class="select-org" 
                placeholder="Example40@gmail.com"
                required
              >
                <i slot="prefix" class="el-input__icon el-icon-message"></i>
              </el-input>
            </div>
            <div class="domain">
              <label for="domain">Domain</label>
              <el-input 
                v-model="signup.domain" 
                class="select-org" 
                placeholder="example.opernize.com"
                required
              >
                <i slot="prefix" class="el-input__icon el-icon-message"></i>
              </el-input>
            </div>
            <div class="password">
              <label for="password">Password</label>
              <el-input 
                v-model="signup.password" 
                class="select-org" 
                type="password" 
                placeholder="****************"
                required
              >
                <i slot="prefix" class="el-input__icon el-icon-lock"></i>
                <i @click="showPassword" slot="suffix" class="el-input__icon el-icon-view"></i>
              </el-input>
            </div>
            <div class="password">
              <label for="confirmPassword">Confirm Password</label>
              <el-input 
                v-model="signup.confirmPassword" 
                class="select-org" 
                type="password" 
                placeholder="****************"
                required
              >
                <i slot="prefix" class="el-input__icon el-icon-lock"></i>
                <i @click="showPassword" slot="suffix" class="el-input__icon el-icon-view"></i>
              </el-input>
            </div>
          </div>
          <div class="container-login-form-btn">
            <button class="login-form-btn">
              Sign Up
            </button>
          </div>
        </form>

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
import axios from "axios";
export default {
  name: "signup",
  data() {
    return {
      signup: {
        username: '',
        email: '',
        domain: '',
        password: '',
        confirmPassword: '',
      },
    }
  },
  methods: {
    showPassword(){
      console.log(this.login.password);
    },
    submitName(orgName) {
      this.isSubmited = true;
      console.log(orgName);
    },
    async handleSignUp(){
      const response = await axios.post('register', {
        name: this.signup.username,
        email: this.signup.email,
        domain: this.signup.domain,
        password: this.signup.password,
        confirmPassword: this.signup.confirmPassword,
      })
      console.log(response)
    }
  },
};
</script>
<style lang="scss">
@import "./assets/style.css";

.select-org {
  position: relative;
  width: 100%;
  margin: 15px auto;

  el-select , el-input{
    width: 100%;
    padding: 10px 5px 10px 40px;
    display: block;
    border: 2px solid #cecbcb;
    border-radius: 4px;
    transition: 0.2s ease-out;
    background-color: #f7f7f7;
    color: darken(#ededed, 30%);
  }
  .el-icon-office-building {
    padding: 10px 0;
    font-size: 20px;
  }
  .el-icon-office-building:focus {
    color: #2c50f1;
  }
}
input.el-input__inner {
  background-color: #f7f7f7 !important;
  padding: 20px 20px;
}

.el-input.is-active .el-input__inner,
.el-input__inner:focus {
  border-color: #409eff;
  color: #409EFF;
}

.el-select .el-input__inner {
  font-size: 14px;
  font-weight: 300;
}
h5 {
  padding-bottom: 10px;
}

.login-more {
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-more .copy {
  color: white;
  text-align: center;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.login-more h1 {
  font-weight: 700;
  font-size: 4rem;
  margin: 30px 0;
}
.login-more p {
  font-weight: 500;
  color: white;
  margin: 20px 0;
  font-size: 1.5rem;
}

.img-org {
  display: flex;
  margin: 10px 0;
}

.img-org p {
  padding: 15px 5px;
}

.circle-image {
  display: inline-block;
  border-radius: 50%;
  overflow: hidden;
  width: 50px;
  height: 50px;
}
.circle-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.login-info{
  margin: 20px 0;
  label{
    font-size: 12px;
  }
}

.el-input__icon .el-icon-view{
  cursor: pointer;
}
</style>
