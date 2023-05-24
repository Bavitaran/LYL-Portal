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
    <b-col cols="12" class="text-right">
      <b-button
        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
        variant="primary"
        class="mt-2 mr-1"
        :to="{ path: '/database/edit-party' }"
      >
        <feather-icon icon="EditIcon" class="'mr-50" />
        Edit
      </b-button>
      <b-button
        v-ripple.400="'rgba(186, 191, 199, 0.15)'"
        variant="outline-secondary"
        class="mt-2"
        @click="goBack"
      >
        Cancel
      </b-button>
    </b-col>

    <!-- form -->
    <b-form class="mt-2">
      <b-row>
        <b-col sm="4" class="text-left">
          <b-form-group label="Role" label-for="account-role">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="role"
              placeholder="Select Role"
            />
          </b-form-group>
        </b-col>
        <b-col sm="4"></b-col>

        <b-col sm="4">
          <b-form-group label="Register Date" label-for="account-register-date">
            <b-form-datepicker
              id="example-datepicker"
              v-model="value"
              class="mb-1"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="6">
          <b-form-group label="Fullname" label-for="account-fullname">
            <b-form-input placeholder="Fullname" name="fullname" />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="New NRIC" label-for="account-newnric">
            <b-form-input name="New NRIC" placeholder="New Nric" />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Passport No" label-for="account-passport">
            <b-form-input name="passport-no " placeholder="Passport No" />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Gender" label-for="account-gender">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="gender"
              placeholder="Gender"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Nationality" label-for="account-nationality">
            <b-form-input name="Nationality" placeholder="Nationality" />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Company Name" label-for="account-company-name">
            <b-form-input name="Company Name" placeholder="Company Name" />
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
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="4    ">
          <b-form-group label="Person In Charge(PIC)" label-for="account-pic">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="pic"
              placeholder="Person In Charge"
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
                <vue-tel-input id="mobile_number" name="mobile_number">
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group
                label="Social Contact"
                label-for="account-social-contact"
              >
                <vue-tel-input id="social _number" name="social_number">
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Email" label-for="account-email">
                <b-form-input name="email" placeholder="john@example.com" />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Address" label-for="account-address">
                <b-form-input name="Address" placeholder="Address Line 1" />
                <b-form-input name="Address" placeholder="Address Line 2" />
                <b-form-input name="Address" placeholder="Address Line 3" />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="State" label-for="account-state">
                <b-form-input name="state" placeholder="Kuala Lumpur" />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="Postcode" label-for="account-postcode">
                <b-form-input name="postcode" placeholder="Postcode" />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Country" label-for="account-country">
                <b-form-input name="country" placeholder="Malaysia" />
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
                <vue-tel-input id="mobile_number" name="mobile_number">
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group
                label="Social Contact"
                label-for="account-social-contact"
              >
                <vue-tel-input id="social _number" name="social_number">
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Email" label-for="account-email">
                <b-form-input name="email" placeholder="john@example.com" />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Address" label-for="account-address">
                <b-form-input name="Address" placeholder="Address Line 1" />
                <b-form-input name="Address" placeholder="Address Line 2" />
                <b-form-input name="Address" placeholder="Address Line 3" />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="State" label-for="account-state">
                <b-form-input name="state" placeholder="Kuala Lumpur" />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="Postcode" label-for="account-postcode">
                <b-form-input name="postcode" placeholder="Postcode" />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Country" label-for="account-country">
                <b-form-input name="country" placeholder="Malaysia" />
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
  data() {
    return {
      gender: [{ title: "Male" }, { title: "Female" }],
      role: [
        { title: "Client" },
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
    goBack() {
      this.$router.go(-1);
    }
  }
};
</script>
