<template>
  <b-card>
    <!-- form -->
    <b-form class="mt-2" @submit.prevent="regNewParty($data)">
      <b-row>
        <b-col md="6">
          <div
            class="demo-inline-spacing"
            id="group-filter"
            :class="{ 'display-block': this.display }"
          >
            <b-form-radio
              v-model="selectedrole"
              name="some-radios"
              value="Company"
            >
              Company
            </b-form-radio>
            <b-form-radio
              v-model="selectedrole"
              name="some-radios"
              value="Individual"
            >
              Individual
            </b-form-radio>
          </div>
        </b-col>
        <b-col md="6" class="text-left">
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

        <b-col md="6">
          <b-form-group
            label="Full Name (According to IC) / Company Name (According to Registration)"
            label-for="account-fullname"
          >
            <b-form-input
              placeholder="Full Name (According to IC) / Company Name (According to Registration)"
              name="fullname"
              v-model="newParty.fullname"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group label="Date of Birth" label-for="date-of-birth">
            <b-form-input
              placeholder="Pick Up Date"
              v-model="date"
              type="date"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group
            label="Passport / New IC No. / Company Registration No. (New Company No.)"
            label-for="account-passport"
          >
            <b-form-input
              name="passport-no "
              placeholder="Passport / New IC No. / Company Registration No. (New Company No.)"
              v-model="newParty.passport_no"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group
            label="Old IC No. / Old Company No. (If Applicable)"
            label-for="account-passport-old"
          >
            <b-form-input
              name="passport-no-old"
              placeholder="Old IC No. / Old Company No. (If Applicable)"
              v-model="newParty.passport_no_old"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group label="Nationality" label-for="account-nationality">
            <b-form-input
              name="Nationality"
              placeholder="Nationality"
              v-model="newParty.nationality"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group label="Income Tax No." label-for="incometaxno">
            <b-form-input
              name="Income Tax No."
              placeholder="Company Name"
              v-model="newParty.company_name"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group
            label="Income Tax Filing Branch"
            label-for="incometaxbranch"
          >
            <b-form-input
              name="Income Tax Filing Branch"
              placeholder="Income Tax Filing Branch"
              v-model="newParty.company_reg_new_no"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row v-show="selectedrole === 'Company'">
        <b-col>
          <br />
          <h4>Secretary Information</h4>
          <b-row>
            <b-col md="6">
              <b-form-group label="Secretary Name" label-for="secname">
                <b-form-input
                  name="Secretary Name"
                  placeholder="Secretary Name"
                  v-model="newParty.sec_name"
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <b-form-group label="Secretary Phone No." label-for="secphone">
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
              </b-form-group>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      <br />
      <!-- Business Info -->
      <b-row>
        <b-col sm="12" class="border">
          <br />
          <h4>Business Information</h4>
          <b-row>
            <b-col sm="6">
              <b-form-group
                label="Company Registration"
                label-for="account-company-reg"
              >
                <b-form-input
                  name="Company Registration"
                  placeholder="Company Registration"
                  v-model="newParty.company_reg"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group
                label="Correspondence Address"
                label-for="correspondence-address"
              >
                <b-form-input
                  name=" Correspondence Address"
                  placeholder="Address Line 1"
                  v-model="newParty.bus_address1"
                />
                <b-form-input
                  name="Correspondence Address"
                  placeholder="Address Line 2"
                  v-model="newParty.bus_address2"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group
                label="Correspondence State"
                label-for="correspondence-state"
              >
                <b-form-input
                  name="state"
                  placeholder="Kuala Lumpur"
                  v-model="newParty.bus_state"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group
                label="Correspondence Postcode"
                label-for="correspondence-postcode"
              >
                <b-form-input
                  name="Correspondence Postcode"
                  placeholder="Correspondence Postcode"
                  v-model="newParty.bus_poscode"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group
                label="Correspondence Country"
                label-for="correspondence-country"
              >
                <b-form-input
                  name="Correspondence Country"
                  placeholder="Malaysia"
                  v-model="newParty.secondary_add_country"
                />
              </b-form-group>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      <!-- Default Details -->
      <br />
      <b-row>
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
                <b-form-checkbox v-model="copyaddress" value="A" plain>
                  <b>Copy Correspondence Address</b>
                </b-form-checkbox>
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
            <b-col sm="12" v-show="selectedrole === 'Company'">
              <b-form-group label="Person In Charge Name" label-for="picname">
                <b-form-input
                  name="Person In Charge Name"
                  placeholder="Person In Charge Name"
                  v-model="newParty.sec_name"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12" v-show="selectedrole === 'Company'">
              <b-form-group
                label="Person In Charge Phone No."
                label-for="picphone"
              >
                <vue-tel-input
                  id="mobile_number"
                  name="mobile_number"
                  v-model="newParty.pic_mobile_no"
                >
                </vue-tel-input>
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
                <b-form-checkbox v-model="copyaddress" value="A" plain>
                  <b>Copy Correspondence Address</b>
                </b-form-checkbox>
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
            <b-col sm="12" v-show="selectedrole === 'Company'">
              <b-form-group label="Person In Charge Name" label-for="picname">
                <b-form-input
                  name="Person In Charge Name"
                  placeholder="Person In Charge Name"
                  v-model="newParty.sec_name"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12" v-show="selectedrole === 'Company'">
              <b-form-group
                label="Person In Charge Phone No."
                label-for="picphone"
              >
                <vue-tel-input
                  id="mobile_number"
                  name="mobile_number"
                  v-model="newParty.pic_mobile_no"
                >
                </vue-tel-input>
              </b-form-group>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      <br />

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
          Save changes
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
  BImg,
  BFormCheckbox,
  BInputGroupPrepend,
  BFormRadio
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
    vSelect,
    BFormCheckbox,
    BInputGroupPrepend,
    BFormRadio
  },
  directives: { Ripple },
  data() {
    return {
      selectedrole: null,
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
      gender: [{ title: "Male" }, { title: "Female" }],
      pic: [{ title: "LL", value: 2.8 }],
      role: [
        { title: "Client", value: 3 },
        { title: "Developer" },
        { title: "Purchaser" },
        { title: "Vendor" }
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
  },
  computed: {
    filtered() {
      if (this.selected)
        return this.infojobs.filter((i) => i.genres === this.selected);
      return this.infojobs;
    }
  }
};
</script>
<style lang="scss">
@import "~@core/scss/vue/libs/vue-sweetalert.scss";
</style>