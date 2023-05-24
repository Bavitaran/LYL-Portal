<template>
  <b-card>
    <!-- form -->
    <b-form class="mt-2" @submit.prevent="regNewUser($data)">
      <b-row>
        <b-col md="6" class="text-left">
          <b-form-group label="Role" label-for="account-role">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="role"
              placeholder="Select Role"
              v-model="newUser.roles_id"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group
            label="Full Name (According to IC)"
            label-for="account-fullname"
          >
            <b-form-input
              placeholder="Full Name (According to IC)"
              name="fullname"
              v-model="newUser.fullname"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group
            label="Passport / New IC No."
            label-for="account-passport"
          >
            <b-form-input
              name="passport-no "
              placeholder="Passport / New IC No."
              v-model="newUser.passport_no"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group label="Mobile Number" label-for="account-mobile-num">
            <vue-tel-input
              id="mobile_number"
              name="mobile_number"
              v-model="newUser.primary_mobile_no"
            >
            </vue-tel-input>
          </b-form-group>
        </b-col>
      </b-row>
      <br />
      <!-- Account Info -->
      <b-row>
        <b-col sm="12" class="border">
          <br />
          <h4>Account Information</h4>
          <b-row>
            <b-col sm="12">
              <b-form-group label="Email" label-for="account-company-reg">
                <b-form-input
                  name="Email"
                  placeholder="Email"
                  v-model="newUser.email"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group>
                <label for="basic-password">Password</label>
                <b-input-group>
                  <b-form-input
                    id="basic-password"
                    :type="passwordFieldType"
                    placeholder="Your Password"
                  />
                </b-input-group>
              </b-form-group>
            </b-col>
          </b-row>
        </b-col>
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
      </b-row>
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
  BFormRadio,
  BInputGroupAppend
} from "bootstrap-vue";
import Ripple from "vue-ripple-directive";
import { ref } from "@vue/composition-api";
import vSelect from "vue-select";
import Vue from "vue";
import VueTelInput from "vue-tel-input";
import "vue-tel-input/dist-modern/vue-tel-input.css";
import axios from "axios";
import { togglePasswordVisibility } from "@core/mixins/ui/forms";

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
    BFormRadio,
    BInputGroupAppend
  },
  mixins: [togglePasswordVisibility],
  computed: {
    passwordToggleIcon() {
      return this.passwordFieldType === "password" ? "EyeIcon" : "EyeOffIcon";
    }
  },
  directives: { Ripple },
  data() {
    return {
      selectedrole: null,
      newUser: {
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
      role: [
        { title: "Admin", value: 3 },
        { title: "Finance" },
        { title: "Lawyer" }
      ]
    };
  },
  methods: {
    resetForm() {
      this.optionsLocal = JSON.parse(JSON.stringify(this.generalData));
    },
    regnewUser() {
      axios
        .post("/api/auth/addParty", this.newUser)
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