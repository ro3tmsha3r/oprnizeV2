<template>
  <div v-if="status == 'admin'" class="card">
    <div class="card-header">
      <div class="steps">
        <div class="step active">
          <span> <i class="ni ni-single-02"></i> </span>
        </div>
        <div class="step">
          <span> <i class="ni ni-check-bold"></i> </span>
        </div>
      </div>
    </div>
    <div id="cardBody" class="card-body">
      <div class="tabs">
        <div id="first" class="tab">
          <form>
            <div class="pl-lg-12">
              <div class="row">
                <div class="col-lg-6">
                  <base-input
                    type="number"
                    alternative=""
                    label="Job Number"
                    input-classes="form-control-alternative"
                    v-model="jobNumber"
                    required
                  />
                </div>
                <div class="col-lg-6">
                  <base-input
                    type="number"
                    alternative=""
                    label="Number Of Hours"
                    input-classes="form-control-alternative"
                    v-model="numberHours"
                    required
                  />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div id="second" class="tab">
          <p>Job Number: {{ numberHours }}</p>
          <p>Number Of Hours: {{ numberHours }}</p>
          <p class="text-center text-muted">Submit this changes</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button id="prevBtn" @click="nextWorkAdmin(-1)">Prev</button>
      <button id="nextBtn" @click="nextWorkAdmin(1)">Next</button>
    </div>
  </div>
  <div v-if="status == 'employee'" class="card">
    <div class="card-header">
      <div class="steps">
        <div class="step active">
          <span> <i class="ni ni-single-02"></i> </span>
        </div>
        <div class="step">
          <span> <i class="ni ni-check-bold"></i> </span>
        </div>
      </div>
    </div>
    <!-- employee -->
    <div v-if="status == 'employee'" id="cardBody" class="card-body">
      <div class="tabs">
        <div id="first" class="tab">
          <form>
            <div class="pl-lg-12">
              <div class="row">
                <div class="col-lg-6">
                  <base-input
                    type="number"
                    alternative=""
                    label="Job Number"
                    input-classes="form-control-alternative"
                    v-model="jobNumber"
                    required
                  />
                </div>
                <div class="col-lg-6">
                  <base-input
                    type="number"
                    alternative=""
                    label="Number Of Hours"
                    input-classes="form-control-alternative"
                    v-model="numberHours"
                    required
                  />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div id="second" class="tab">
          <p>Job Number: {{ numberHours }}</p>
          <p>Number Of Hours: {{ numberHours }}</p>
          <p class="text-center text-muted">Send a request to add hours of work</p>
        </div>
        <!-- <div v-if="status == employee" id="second" class="tab">
          <p>Job Number: {{ numberHours }}</p>
          <p>Number Of Hours: {{ numberHours }}</p>
          <p class="text-center text-muted">Send a request to add hours of work</p>
        </div> -->
      </div>
    </div>
    <div class="card-footer">
      <button id="prevBtn" @click="nextWorkAdmin(-1)">Prev</button>
      <button id="nextBtn" @click="nextWorkAdmin(1)">Next</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: "AddWorkingHours",
  props: {
    status: String,
  },
  data() {
    return {
      numberHours: 0,
      jobNumber: null,
      currentTab: 0,
    };
  },
  mounted() {
    this.showTabWorkAdmin(this.currentTab);
  },
  methods: {
    onComplete() {
      alert("Yay. Done!");
    },
    fixStepIndicator(n) {
      var i,
        x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }

      x[n].className += " active";
    },

    showTabWorkAdmin(n) {
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";

      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == x.length - 1) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      this.fixStepIndicator(n);
    },

    async nextWorkAdmin(n) {
      var x = document.getElementsByClassName("tab");

      x[this.currentTab].style.display = "none";

      this.currentTab = this.currentTab + n;

      if (this.currentTab >= x.length) {
        console.log('fini')
        await axios.post('login', {
          email: 'amina@gmail.com',
          password: '123456as'
        })
        .then(() => {
          this.$emit('close-add-working-hours');
          this.showTabWorkAdmin(0)
          this.currentTab = 0
          this.$message({
              showClose: true,
              message: "The operation was added succesfully",
              type: "success",
            });
        })
        .catch((err) => {
              console.log(err.response);
              this.$message({
                showClose: true,
                message: "Error, try again!",
                type: "error",
              });
        })
      }
      this.showTabWorkAdmin(this.currentTab);
    },
  },
}
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css?family=Lato&display=swap");
.card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(255, 255, 255, 0.04588);

  &-header {
    padding: 20px;
    border-bottom: 1px solid #d5d0d0;

    & .steps {
      display: flex;
      column-count: 3;
      justify-content: center;
      align-items: center;

      & .step {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #d4d4d4;
        line-height: 0.1em;
        margin: 10px 0 20px;
        & span {
          padding: 10px 16px;
          border: 1px solid #007cc4;
          border-radius: 20px;
          background: #fff;
          box-shadow: 0px 3px 0px 0px #007cc4;
        }
      }

      & .step.active {
        & span {
          background: #007cc4;
          color: white;
          border: 1px solid #007cc4;
        }
      }
    }
  }

  &-body {
    padding: 16px;
    min-height: 250px;
    display: flex;
    justify-items: center;
    align-items: center;
    & .tabs {
      width: 100%;
      height: 100%;
      justify-content: center;
      display: flex;
      align-items: center;
      & .tab {
        display: none;
      }

      & .tab.active {
        display: block !important;
      }
    }
  }

  &-footer {
    padding: 16px;
    border-top: 1px solid #d5d0d0;

    & button {
      border-radius: 5px;
      padding: 15px 25px;
      width: 150px;

      margin: 10px auto;
      border: none;
      border-radius: 0.085rem;
      font-weight: 500;
      font-size: 16px;
      color: white;
      background: #007cc4;
      box-shadow: 0px 5px 0px 0px #007cc4;
      &:active {
        outline: none;
        transform: translate(0px, 5px);
        -webkit-transform: translate(0px, 5px);
        box-shadow: 0px 1px 0px 0px;
      }
    }
  }
}

@media only screen and (max-width: 420px) {
  .card-footer {
    & button {
      width: 100%;
    }
  }
}
</style>
