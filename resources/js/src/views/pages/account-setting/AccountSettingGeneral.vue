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
    <b-form class="mt-2">
      <b-row>
        <b-col sm="6">
          <b-form-group label="Fullname" label-for="account-fullname">
            <b-form-input
              v-model="optionsLocal.fullName"
              placeholder="Fullname"
              name="fullname"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="New NRIC" label-for="account-newnric">
            <b-form-input
              v-model="optionsLocal.newnric"
              name="New NRIC"
              placeholder="New Nric"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Old NRIC" label-for="account-oldnric">
            <b-form-input
              v-model="optionsLocal.oldnric"
              name="Old NRIC"
              placeholder="Old Nric"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Gender" label-for="account-gender">
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="option"
              placeholder="Gender"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Nationality" label-for="account-nationality">
            <b-form-input
              v-model="optionsLocal.nationality"
              name="Nationality"
              placeholder="Nationality"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group label="Company Name" label-for="account-company-name">
            <b-form-input
              v-model="optionsLocal.company_name"
              name="Company Name"
              placeholder="Company Name"
            />
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group
            label="Company Registration New No"
            label-for="account-company-reg-new-no"
          >
            <b-form-input
              v-model="optionsLocal.company_reg_new_no"
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
              v-model="optionsLocal.company_reg_old_no"
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
              v-model="optionsLocal.reg_add"
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
              v-model="optionsLocal.business_add"
              name="Business Address"
              placeholder="Business Address"
            />
          </b-form-group>
        </b-col>
        <!-- </b-row> -->
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
                  class="form-control"
                  id="mobile_number"
                  v-model="mobile"
                  name="mobile_number"
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
                  v-model="mobile"
                  name="social_number"
                >
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Email" label-for="account-email">
                <b-form-input
                  v-model="optionsLocal.email"
                  name="email"
                  placeholder="john@example.com"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Address" label-for="account-address">
                <b-form-input
                  v-model="optionsLocal.add_1"
                  name="Address"
                  placeholder="Address Line 1"
                />
                <b-form-input
                  v-model="optionsLocal.add_2"
                  name="Address"
                  placeholder="Address Line 2"
                />
                <b-form-input
                  v-model="optionsLocal.add_3"
                  name="Address"
                  placeholder="Address Line 3"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="State" label-for="account-state">
                <b-form-input
                  v-model="optionsLocal.state"
                  name="state"
                  placeholder="Kuala Lumpur"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="Postcode" label-for="account-postcode">
                <b-form-input
                  v-model="optionsLocal.postcode"
                  name="postcode"
                  placeholder="13215"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Country" label-for="account-country">
                <b-form-input
                  v-model="optionsLocal.country"
                  name="country"
                  placeholder="Malaysia"
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
                  v-model="mobile"
                  name="mobile_number"
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
                  v-model="mobile"
                  name="social_number"
                >
                </vue-tel-input>
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Email" label-for="account-email">
                <b-form-input
                  v-model="optionsLocal.email"
                  name="email"
                  placeholder="john@example.com"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Address" label-for="account-address">
                <b-form-input
                  v-model="optionsLocal.add_1"
                  name="Address"
                  placeholder="Address Line 1"
                />
                <b-form-input
                  v-model="optionsLocal.add_2"
                  name="Address"
                  placeholder="Address Line 2"
                />
                <b-form-input
                  v-model="optionsLocal.add_3"
                  name="Address"
                  placeholder="Address Line 3"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="State" label-for="account-state">
                <b-form-input
                  v-model="optionsLocal.state"
                  name="state"
                  placeholder="Kuala Lumpur"
                />
              </b-form-group>
            </b-col>
            <b-col sm="6">
              <b-form-group label="Postcode" label-for="account-postcode">
                <b-form-input
                  v-model="optionsLocal.postcode"
                  name="postcode"
                  placeholder="13215"
                />
              </b-form-group>
            </b-col>
            <b-col sm="12">
              <b-form-group label="Country" label-for="account-country">
                <b-form-input
                  v-model="optionsLocal.country"
                  name="country"
                  placeholder="Malaysia"
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
        >
          Save changes
        </b-button>
        <b-button
          v-ripple.400="'rgba(186, 191, 199, 0.15)'"
          variant="outline-secondary"
          type="reset"
          class="mt-2"
          @click.prevent="resetForm"
        >
          Reset
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
import { useInputImageRenderer } from "@core/comp-functions/forms/form-utils";
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
  directives: {
    Ripple
  },
  props: {
    generalData: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      optionsLocal: JSON.parse(JSON.stringify(this.generalData)),
      profileFile: null,
      option: [{ title: "Male" }, { title: "Female" }]
    };
  },
  methods: {
    resetForm() {
      this.optionsLocal = JSON.parse(JSON.stringify(this.generalData));
    }
  },
  setup() {
    const refInputEl = ref(null);
    const previewEl = ref(null);

    const { inputImageRenderer } = useInputImageRenderer(refInputEl, previewEl);

    return {
      refInputEl,
      previewEl,
      inputImageRenderer
    };
  }
};
</script>
