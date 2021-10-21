<template>
  <div class="limiter">
    <div class="container-login">
      <div class="wrap-login">
        <!-- Organisation Name -->
        <form v-if="isSubmited == false" class="login-form validate-form">
          <div class="label-signup">
            You don't have an account? <strong><a href="#">Sign Up</a></strong>
          </div>
          <span class="login-form-title">
            Organization Name
          </span>
          <div class="label-name">
            Enter your organization name
          </div>
          <h5>Organization Name</h5>
          <el-select
            v-model="value"
            filterable
            remote
            reserve-keyword
            placeholder=""
            :remote-method="remoteMethod"
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
        </form>

        <!-- Login -->
        <form v-else class="login-form validate-form">
          <div class="label-signup">
            You don't have an account? <strong><a href="#">Sign Up</a></strong>
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
            <p>{{ value }}</p>
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
                <i @click="showPassword" slot="suffix" class="el-input__icon el-icon-view"></i>
              </el-input>
            </div>
          </div>
          <div class="container-login-form-btn">
            <button class="login-form-btn">
              Login
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
import "element-ui";
export default {
  name: "login",
  data() {
    return {
      login: {
        email: '',
        password: '',
      },
      isSubmited: false,
      options: [],
      value: [],
      list: [],
      loading: false,
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
  mounted() {
    this.list = this.states.map((item) => {
      return { value: `value:${item}`, label: `label:${item}` };
    });
  },
  methods: {
    showPassword(){
      console.log(this.login.password);
    },
    submitName(orgName) {
      this.isSubmited = true;
      console.log(orgName);
    },
    remoteMethod(query) {
      if (query !== "") {
        this.loading = true;
        setTimeout(() => {
          this.loading = false;
          this.options = this.list.filter((item) => {
            return item.label.toLowerCase().indexOf(query.toLowerCase()) > -1;
          });
        }, 200);
      } else {
        this.options = [];
      }
    },
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
