<template>
  <div v-if="review[0] !=  null || review[1] !=  null || review[2] !=  null || review[3] !=  null" class="p-2">
    <!-- <div class="container-fluid mt--7">
      <div class="w-96 mt-8 ml-9">
        <div class="col-xl-8 order-xl-1"> -->
          <card class="card-info" shadow type="secondary">
            <template v-slot:header>
              <div class="bg-white fixed border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Review</h3>
                  </div>
                  <!-- <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                  </div> -->
                </div>
              </div>
            </template>

            <form @submit.prevent="approve(review)">
              <div class="row">
                <div>
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img
                        alt="Image placeholder"
                        src="img/theme/team-4-800x800.jpg"
                      />
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span
                        class="mb-0 text-sm font-weight-bold"
                        style="color: #525f7f !important"
                        >Jessica Jones</span
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-11">
                  <h3 class="pt-4">Personal Information</h3>
                  <br />
                </div>
                <div class="col-lg-1">
                  <i class="ni ni-settings"></i>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div style="display: flex">
                    <p>Employee's English Name:</p>
                    <span>{{ review[0].usernameEnglish }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Employee's Arabic Name:</p>
                    <span>{{ review[0].usernameArabic }}</span>
                  </div>
                  <div style="display: flex">
                    <p>ID Number:</p>
                    <span>{{ review[0].idNumber }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Nationality:</p>
                    <span>{{ review[0].contry }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Gender:</p>
                    <span>{{ review[0].gender }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Email:</p>
                    <span>{{ review[0].email }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Mobile Number:</p>
                    <span>{{ review[0].mobileNumber }}</span>
                  </div>
                </div>
                <div class="col-lg-1">
                  <div
                    class="border-separate"
                    style="
                      border-left: 1px solid rgb(152, 153, 155);
                      height: 300px;
                    "
                  ></div>
                </div>
                <div class="col-lg-5">
                  <div style="display: flex">
                    <p>Date Of Birth:</p>
                    <span>{{ review[0].dateBirth }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Card Number:</p>
                    <span>{{ review[0].cardNumber }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Release Date:</p>
                    <span>{{ review[0].releaseDate }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Expiry Date:</p>
                    <span>{{ review[0].expiryDate }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Passport Number:</p>
                    <span>{{ review[0].passportNumber }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Expiry Date:</p>
                    <span>{{ review[0].expiryDate }}</span>
                  </div>
                </div>
              </div>

              <hr class="my-4" />
              <div class="row">
                <div class="col-lg-11">
                  <h3 class="pt-4">Department Information</h3>
                  <br />
                </div>
                <div class="col-lg-1">
                  <i class="ni ni-settings"></i>
                </div>
              </div>

              <div class="row">
                <!-- <label>Payment Method</label> <br> -->
                <div class="col-lg-6">
                  <div style="display: flex">
                    <p>Department Name:</p>
                    <span>{{ review[1].nameDepartment }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Work Shift:</p>
                    <span>{{ review[1].workShift }}</span>
                  </div>
                </div>
                <div class="col-lg-1">
                  <div
                    class="border-separate"
                    style="
                      border-left: 1px solid rgb(152, 153, 155);
                      height: 90px;
                    "
                  ></div>
                </div>
                <div class="col-lg-5">
                  <div style="display: flex">
                    <p>Section:</p>
                    <span>{{ review[1].section }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Branch Name:</p>
                    <span>{{ review[1].branchName }}</span>
                  </div>
                </div>
              </div>

              <hr class="my-4" />
              <div class="row">
                <div class="col-lg-11">
                  <h3 class="pt-4">Job Information</h3>
                  <br />
                </div>
                <div class="col-lg-1">
                  <i class="ni ni-settings"></i>
                </div>
              </div>

              <div class="row">
                <!-- <label>Payment Method</label> <br> -->
                <div class="col-lg-6">
                  <div style="display: flex">
                    <p>Job Title:</p>
                    <span>{{ review[2].jobTitle }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Contract Type:</p>
                    <span>{{ review[2].contractType }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Contract Period:</p>
                    <span>{{ review[2].joiningDate }}</span>
                  </div>
                </div>
                <div class="col-lg-1">
                  <div
                    class="border-separate"
                    style="
                      border-left: 1px solid rgb(152, 153, 155);
                      height: 130px;
                    "
                  ></div>
                </div>
                <div class="col-lg-5">
                  <div style="display: flex">
                    <p>Role:</p>
                    <span>{{ review[2].role }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Employment Type:</p>
                    <span>{{ review[2].employmentType }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Probation Period:</p>
                    <span>{{ review[2].probationPeriod }}</span>
                  </div>
                </div>
              </div>

              <hr class="my-4" />
              <div class="row">
                <div class="col-lg-11">
                  <h3 class="pt-4">Compinsation</h3>
                  <br />
                </div>
                <div class="col-lg-1">
                  <i class="ni ni-settings"></i>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div style="display: flex">
                    <p>Basic:</p>
                    <span>{{ review[3].basic }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Leave Balance:</p>
                    <span>{{ review[3].leaveBalance }}</span>
                  </div>
                  <div style="display: flex">
                    <p>IBAN:</p>
                    <span>{{ review[3].IBAN }}</span>
                  </div>
                </div>
                <div class="col-lg-1">
                  <div
                    class="border-separate"
                    style="
                      border-left: 1px solid rgb(152, 153, 155);
                      height: 130px;
                    "
                  ></div>
                </div>
                <div class="col-lg-5">
                  <div style="display: flex">
                    <p>Allowences:</p>
                    <span>{{ review[3].Allowences }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Payment Method:</p>
                    <span>{{ review[3].paymentMethod }}</span>
                  </div>
                  <div style="display: flex">
                    <p>Bank Name:</p>
                    <span>{{ review[3].bankName }}</span>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <router-link to="/AddNewEmployee/Review"
                  ><button class="mr-2" style="background: #F72525 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;opacity: 1;height: 45px;width: 90px;color: white;"
                    >Reject</button
                  ></router-link
                >
                <router-link to="/AddNewEmployee/Review"
                  ><button @click.prevent="approve(review)" style="background: #007CC4 0% 0% no-repeat padding-box;border-radius: 3px 3px 10px 3px;opacity: 1;height: 45px;width: 90px;color: white;"
                    >Approve</button
                  ></router-link
                >
              </div>
            </form>
          </card>
        <!-- </div>
      </div>
    </div> -->
  </div>
  <div> 
    Fill the pervious informations
  </div>
</template>
<script>
import axios from 'axios'
export default {
  name: "Review",
  data() {
    return {
      customeIsChecked: false,
      sliders: {
        slider1: 0,
      },
    };
  },
  methods: {
    check(yes) {
      console.log(yes);
      this.customeIsChecked = true;
      console.log(this.customeIsChecked);
    },
     approve(review){
      console.log(review[0].usernameArabic)
       axios.post('employee', {
        name_en: review[0].usernameEnglish,
        name_ar: review[0].usernameArabic,
        username: review[0].usernameEnglish,
        job_number: review[2].jobNumber,
        password: '12345678',
        password_confirmation: '12345678',
        company_id:'1',
        sex: review[0].gender,
        marital: review[0].marital,
        phone: review[0].mobileNumber,
        identification_number: review[0].idNumber,
        email: review[0].email,
        job_title: review[2].jobTitle,
        type_of_contract: review[2].contractType,
        testing_period: review[2].probationPeriod, 
        contract_start_date: review[2].joiningDate,
        basic_salary: review[3].basic,
        vacations_balance: review[3].leaveBalance,
      })
      .then(() => {
        this.$message({
            showClose: true,
            message: review[0].usernameArabic + "has been added successfully ",
            type: "success",
          });
        this.$router.push({path: '/employees'})
      })
      .catch((err) => {
        console.log(err)
            this.$message({
              showClose: true,
              message: "Try Again!",
              type: "error",
            });
      });
 
    }
  },
  computed: {
    review() {
      return this.$store.getters.getEmployees;
    },
  },
};
</script>
<style scoped>
.card-info {
  min-width: 375px;
}
@media (max-width: 1000px) {
  .border-separate {
    display: contents!important;;
  }
}
</style>