<template>
  <b-card>
    <!-- media -->
    <!-- <b-media no-body>
      <b-media-aside>
        <b-link>
          <b-img
            ref="previewEl"
            rounded
            :src="optionsLocal.avatar"
            height="80"
          />
        </b-link> -->
    <!--/ avatar -->
    <!-- </b-media-aside> -->

    <!-- <b-media-body class="mt-75 ml-75"> -->
    <!-- upload button -->
    <!-- <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          variant="primary"
          size="sm"
          class="mb-75 mr-75"
          @click="$refs.refInputEl.$el.click()"
        >
          Upload
        </b-button>
        <b-form-file
          ref="refInputEl"
          v-model="profileFile"
          accept=".jpg, .png, .gif"
          :hidden="true"
          plain
          @input="inputImageRenderer"
        /> -->
    <!--/ upload button -->

    <!-- reset -->
    <!-- <b-button
          v-ripple.400="'rgba(186, 191, 199, 0.15)'"
          variant="outline-secondary"
          size="sm"
          class="mb-75 mr-75"
        >
          Reset
        </b-button> -->
    <!--/ reset -->
    <!-- <b-card-text>Allowed JPG, GIF or PNG. Max size of 800kB</b-card-text>
      </b-media-body>
    </b-media> -->
    <!--/ media -->

    <!-- form -->
    <b-form class="mt-2" @submit.prevent="regNewParty($data)">
      <b-row>
        <b-col sm="4" class="text-left">
          <b-form-group label="Role" label-for="account-role">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="role"
              placeholder="Select Role"
              v-model="newParty.roles_id"
            />
          </b-form-group>
        </b-col>
        <b-col sm="4"></b-col>

        <b-col sm="4">
          <b-form-group label="Register Date" label-for="account-register-date">
            <b-form-datepicker
              id="example-datepicker"
              autocomplete="on"
              v-model="newParty.register_date"
              class="mb-1"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="6">
          <b-form-group label="Fullname" label-for="account-fullname">
            <b-form-input
              placeholder="Fullname"
              name="fullname"
              v-model="newParty.fullname"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="New NRIC" label-for="account-newnric">
            <b-form-input
              name="New NRIC"
              placeholder="New Nric"
              v-model="newParty.new_nric"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Passport No" label-for="account-passport">
            <b-form-input
              name="passport-no "
              placeholder="Passport No"
              v-model="newParty.passport_no"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Gender" label-for="account-gender">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="gender"
              placeholder="Gender"
              v-model="newParty.gender"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Nationality" label-for="account-nationality">
            <b-form-input
              name="Nationality"
              placeholder="Nationality"
              v-model="newParty.nationality"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Company Name" label-for="account-company-name">
            <b-form-input
              name="Company Name"
              placeholder="Company Name"
              v-model="newParty.company_name"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group
            label="Company Registration New No"
            label-for="account-company-reg-new-no"
          >
            <b-form-input
              name="Company Registration New No"
              placeholder="Company Registration New No"
              v-model="newParty.company_reg_new_no"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group
            label="Company Registration Old No"
            label-for="account-company-reg-old-no"
          >
            <b-form-input
              name="Company Registration Old No"
              placeholder="Company Registration Old No"
              v-model="newParty.company_reg_old_no"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group
            label="Registration Address"
            label-for="account-reg-add"
          >
            <b-form-input
              name="Registration Address"
              placeholder="Registration Address"
              v-model="newParty.registration_add"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group
            label="Business Address"
            label-for="account-business-add"
          >
            <b-form-input
              name="Business Address"
              placeholder="Business Address"
              v-model="newParty.business_add"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="4">
          <b-form-group label="Person In Charge(PIC)" label-for="account-pic">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="pic"
              placeholder="Person In Charge"
              v-model="newParty.person_in_charge"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <br />
        <b-col sm="6" class="border">
          <br />
          <h4>Default Contact Details</h4>
          <b-row>
            <b-col sm="12">
              <b-form-group
                label="Mobile Number"
                label-for="account-mobile-num"
              >
                <vue-tel-input
                  id="mobile_number"
                  name="mobile_number"
                  v-model="newParty.primary_mobile_no"
                >
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group
                label="Social Contact"
                label-for="account-social-contact"
              >
                <vue-tel-input
                  id="social _number"
                  name="social_number"
                  v-model="newParty.primary_social_contact_no"
                >
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Email" label-for="account-email">
                <b-form-input
                  name="email"
                  placeholder="john@example.com"
                  v-model="newParty.primary_email"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Address" label-for="account-address">
                <b-form-input
                  name="Address"
                  placeholder="Address Line 1"
                  v-model="newParty.primary_add_line_1"
                />
                <b-form-input
                  name="Address"
                  placeholder="Address Line 2"
                  v-model="newParty.primary_add_line_2"
                />
                <b-form-input
                  name="Address"
                  placeholder="Address Line 3"
                  v-model="newParty.primary_add_line_3"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="State" label-for="account-state">
                <b-form-input
                  name="state"
                  placeholder="Kuala Lumpur"
                  v-model="newParty.primary_add_state"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="Postcode" label-for="account-postcode">
                <b-form-input
                  name="postcode"
                  placeholder="Postcode"
                  v-model="newParty.primary_add_postcode"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Country" label-for="account-country">
                <b-form-input
                  name="country"
                  placeholder="Malaysia"
                  v-model="newParty.primary_add_country"
                />
              </b-form-group>
            </b-col>
          </b-row>
        </b-col>
        <br />
        <b-col sm="6" class="border">
          <br />
          <h4>Additional Contact Details</h4>
          <b-row>
            <b-col sm="12">
              <b-form-group
                label="Mobile Number"
                label-for="account-mobile-num"
              >
                <vue-tel-input
                  id="mobile_number"
                  name="mobile_number"
                  v-model="newParty.secondary_mobile_no"
                >
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group
                label="Social Contact"
                label-for="account-social-contact"
              >
                <vue-tel-input
                  id="social _number"
                  name="social_number"
                  v-model="newParty.secondary_social_contact_no"
                >
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Email" label-for="account-email">
                <b-form-input
                  name="email"
                  placeholder="john@example.com"
                  v-model="newParty.secondary_email"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Address" label-for="account-address">
                <b-form-input
                  name="Address"
                  placeholder="Address Line 1"
                  v-model="newParty.secondary_add_line_1"
                />
                <b-form-input
                  name="Address"
                  placeholder="Address Line 2"
                  v-model="newParty.secondary_add_line_2"
                />
                <b-form-input
                  name="Address"
                  placeholder="Address Line 3"
                  v-model="newParty.secondary_add_line_3"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="State" label-for="account-state">
                <b-form-input
                  name="state"
                  placeholder="Kuala Lumpur"
                  v-model="newParty.secondary_add_state"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="Postcode" label-for="account-postcode">
                <b-form-input
                  name="postcode"
                  placeholder="Postcode"
                  v-model="newParty.secondary_add_postcode"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Country" label-for="account-country">
                <b-form-input
                  name="country"
                  placeholder="Malaysia"
                  v-model="newParty.secondary_add_country"
                />
              </b-form-group>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      <!-- alert -->
      <!-- <b-col cols="12" class="mt-75">
        <b-alert show variant="warning" class="mb-50">
          <h4 class="alert-heading">
            Your email is not confirmed. Please check your inbox.
          </h4>
          <div class="alert-body">
            <b-link class="alert-link"> Resend confirmation </b-link>
          </div>
        </b-alert>
      </b-col> -->
      <!--/ alert -->

      <b-col cols="12">
        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          variant="primary"
          class="mt-2 mr-1"
          type="submit"
        >
          Add New Party
        </b-button>
        <b-button
          v-ripple.400="'rgba(186, 191, 199, 0.15)'"
          variant="outline-secondary"
          class="mt-2"
          :to="{ path: '/database' }"
        >
          Cancel
        </b-button>
      </b-col>
    </b-form>
  </b-card>
</template>

<script>
import {
  BFormFile,
  BButton,
  BForm,
  BFormDatepicker,
  BFormGroup,
  BFormInput,
  BRow,
  BCol,
  BAlert,
  BCard,
  BCardText,
  BMedia,
  BMediaAside,
  BMediaBody,
  BLink,
  BImg
} from "bootstrap-vue";
import Ripple from "vue-ripple-directive";
import { ref } from "@vue/composition-api";
import vSelect from "vue-select";
import Vue from "vue";
import VueTelInput from "vue-tel-input";
import "vue-tel-input/dist-modern/vue-tel-input.css";
import axios from "axios";

Vue.use(VueTelInput);

export default {
  components: {
    BButton,
    BForm,
    BImg,
    BFormDatepicker,
    BFormFile,
    BFormGroup,
    BFormInput,
    BRow,
    BCol,
    BAlert,
    BCard,
    BCardText,
    BMedia,
    BMediaAside,
    BMediaBody,
    BLink,
    vSelect
  },
  directives: { Ripple },
  data() {
    return {
      newParty: {
        roles_id: "",
        register_date: "",
        fullname: "",
        new_nric: "",
        passport_no: "",
        gender: "",
        nationality: "",
        company_name: "",
        company_reg_new_no: "",
        company_reg_old_no: "",
        registration_add: "",
        business_add: "",
        person_in_charge: "",
        primary_mobile_no: "",
        primary_social_contact_no: "",
        primary_email: "",
        primary_add_line_1: "",
        primary_add_line_2: "",
        primary_add_line_3: "",
        primary_add_state: "",
        primary_add_postcode: "",
        primary_add_country: "",
        secondary_mobile_no: "",
        secondary_social_contact_no: "",
        secondary_email: "",
        secondary_add_line_1: "",
        secondary_add_line_2: "",
        secondary_add_line_3: "",
        secondary_add_state: "",
        secondary_add_postcode: "",
        secondary_add_country: ""
      },
      gender: [
        { title: "Male", value: "male" },
        { title: "Female", value: "female" }
      ],
      pic: [{ title: "LL", value: 2.8 }],
      role: [
        { title: "Client", value: "Client" },
        { title: "Developer", value: "Developer" },
        { title: "Purchaser", value: "Purchaser" },
        { title: "Vendor", value: "Vendor" }
      ]
    };
  },
  methods: {
    resetForm() {
      this.optionsLocal = JSON.parse(JSON.stringify(this.generalData));
    },
    regNewParty() {
      axios
        .post("/api/auth/addParty", this.newParty)
        .then((response) => {
          console.log(response.data);
          this.$swal({
            title: "Success!",
            text: "Successfully Added New Party!",
            icon: "success",
            customClass: {
              confirmButton: "btn btn-primary"
            },
            buttonsStyling: true
          }).then(function () {
            location.href = "/database";
          });
        })
        .catch((error) => {
          this.$swal(
            "Warning",
            "" + error.messageresponse.data.messages + "",
            "error"
          );
        });
    }
  }
};
</script>
<style lang="scss">
@import "~@core/scss/vue/libs/vue-sweetalert.scss";
</style>