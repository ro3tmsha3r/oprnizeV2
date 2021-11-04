<template>
  <div class="container-fluid pt-4">
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">All requests</h3>
          </div>
          <div class="card-body">
            <div class="container ct-example-row">
              <div class="row">
                <div
                  v-for="(vacations, index) in vacations"
                  :key="index"
                  class="col-sm mx-2"
                  style="
                    background: #ffffff 0% 0% no-repeat padding-box;
                    border: 0.30000001192092896px solid #b3b3b3;
                    border-radius: 3px 3px 10px 3px;
                    opacity: 1;
                  "
                >
                  <div style="dispaly: flex">
                    <span
                      class="text-left"
                      style="
                        font: normal normal bold 15px/18px Lato;
                        letter-spacing: 0px;
                        color: #007cc4;
                        opacity: 1;
                      "
                      >Annual Leave</span
                    >
                    <span class="style-B1 pl-6">{{
                      new Date(vacations.created_at).toDateString()
                    }}</span>
                  </div>
                  <div class="media align-items-center my-4">
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
                      <div style="display: flex">
                        <span class="text-overflow m-0 style-B1"
                          >Job Number:</span
                        >
                        <span class="text-overflow m-0 style-B1"> 2564</span>
                      </div>
                    </div>
                  </div>
                  <div class="mx-2 my-4">
                    <div>
                      <span class="style-B1">Number of days:</span
                      ><span class="style-46">{{ vacations.days }}</span>
                    </div>
                    <div>
                      <span class="style-B1">Starting Date:</span
                      ><span class="style-46">{{
                        new Date(vacations.date_start).toDateString()
                      }}</span>
                    </div>
                    <div>
                      <span class="style-B1">Vacation End Date:</span
                      ><span class="style-46">{{
                        new Date(vacations.date_end).toDateString()
                      }}</span>
                    </div>
                    <div>
                      <span class="style-B1">Return Date:</span
                      ><span class="style-46">{{
                        new Date(vacations.date_end).toDateString()
                      }}</span>
                    </div>
                    <div>
                      <span class="style-B1">vacations Balance:</span
                      ><span class="style-46">{{
                        vacations.employee.vacations_balance
                      }}</span>
                    </div>
                    <div>
                      <span class="style-B1">Remaining Balance:</span
                      ><span class="style-46">{{
                        vacations.employee.basic_salary
                      }}</span>
                    </div>
                  </div>
                  <div class="pb-2 my-3">
                    <!-- <router-link to="/AddNewEmployee/Review"> -->
                    <button
                      @click="showModal = true"
                      class="mr-2"
                      style="
                        background: #464648 0% 0% no-repeat padding-box;
                        border-radius: 3px 3px 10px 3px;
                        opacity: 1;
                        height: 38px;
                        width: 130px;
                        color: white;
                      "
                    >
                      View Details
                    </button>
                    <!-- </router-link> -->
                    <!-- <router-link to="/AddNewEmployee/Review"> -->
                    <button
                      style="
                        background: #007cc4 0% 0% no-repeat padding-box;
                        border-radius: 3px 3px 10px 3px;
                        opacity: 1;
                        height: 38px;
                        width: 130px;
                        color: white;
                      "
                    >
                      Approve
                    </button>
                    <!-- </router-link> -->
                  </div>
                  <modal v-model:show="showModal">
                    <template v-slot:header>
                      <h5 class="modal-title p-0" id="exampleModalLabel">
                        Request Details
                      </h5>
                    </template>
                    <div>
                      <div class="mx-2 my-4">
                        <div>
                          <span class="style-B1">Number of days:</span
                          ><span class="style-46">{{ vacations.days }}</span>
                        </div>
                        <div>
                          <span class="style-B1">Starting Date:</span
                          ><span class="style-46">{{
                            new Date(vacations.date_start).toDateString()
                          }}</span>
                        </div>
                        <div>
                          <span class="style-B1">Vacation End Date:</span
                          ><span class="style-46">{{
                            new Date(vacations.date_end).toDateString()
                          }}</span>
                        </div>
                        <div>
                          <span class="style-B1">Return Date:</span
                          ><span class="style-46">{{
                            new Date(vacations.date_end).toDateString()
                          }}</span>
                        </div>
                        <div>
                          <span class="style-B1">vacations Balance:</span
                          ><span class="style-46">{{
                            vacations.employee.vacations_balance
                          }}</span>
                        </div>
                        <div>
                          <span class="style-B1">Remaining Balance:</span>
                          <span class="style-46">{{vacations.employee.basic_salary}}</span>
                        </div>
                        <!-- Aditional Info -->
                        <div>
                          <span class="style-B1">Advance Salary:</span>
                          <span class="style-46">{{vacations.advance_salary}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Paid In Advance:</span>
                          <span class="style-46">{{vacations.paid_in_advance}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Ticket Request:</span>
                          <span class="style-46">{{vacations.ticket_request}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Visa Request:</span>
                          <span class="style-46">{{vacations.visa_request}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Status:</span>
                          <span class="style-46">{{vacations.status}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Discount Days:</span>
                          <span class="style-46">{{vacations.discount_days}}</span>
                        </div>
                        <span>Employee's Info</span>
                        <div>
                          <span class="style-B1">Marital:</span>
                          <span class="style-46">{{vacations.employee.marital}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Marital:</span>
                          <span class="style-46">{{vacations.employee.marital}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Marital:</span>
                          <span class="style-46">{{vacations.employee.marital}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Sex:</span>
                          <span class="style-46">{{vacations.employee.sex}}</span>
                        </div>
                        <div>
                          <span class="style-B1">Identification Number:</span>
                          <span class="style-46">{{vacations.employee.identification_number}}</span>
                        </div>
                      </div>
                    </div>
                    <template v-slot:footer>
                      <base-button type="secondary" @click="showModal = false"
                        >Close</base-button
                      >
                    </template>
                  </modal>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "vacations",
  data() {
    return {
      showModal: false,
      vacations: []
    };
  },
  mounted() {
    this.getVacations();
    console.log(this.vacations)
  },
  methods: {
    getVacations: function () {
      var app = this;
      axios
        .get("/vacations")
        .then(function (response) {
          app.vacations = response.data;
          console.log(app.vacations);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>

<style>
.style-B1 {
  text-align: left;
  font: normal normal normal 12px/20px Lato;
  letter-spacing: 0px;
  color: #b1b1b1;
  opacity: 1;
}
.style-46 {
  padding-left: 24px;
  font: normal normal normal 12px/20px Open Sans;
  letter-spacing: 0px;
  color: #464648;
  opacity: 1;
}
.modal-body {
  padding: 0 12px 0 12px!important;
}

.modal-body{
  padding: 12px!important
}
</style>
