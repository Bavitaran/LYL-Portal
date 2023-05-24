<template>
  <div class="auth-wrapper auth-v2 demo-inline-spacing">
    <b-row class="auth-inner m-0">
      <!-- Brand logo-->
      <b-link class="brand-logo">
        <!-- <vuexy-logo /> -->

        <h2 class="brand-text text-primary ml-1">LYL Portal</h2>
      </b-link>
      <!-- /Brand logo-->

      <!-- Left Text-->
      <b-col lg="8" class="d-none d-lg-flex align-items-center p-5">
        <div
          class="w-100 d-lg-flex align-items-center justify-content-center px-5"
        >
          <b-img fluid :src="imgUrl" alt="Register V2" />
        </div>
      </b-col>
      <!-- /Left Text-->

      <!-- Register-->
      <b-col lg="4" class="d-flex align-items-center auth-bg px-2 p-lg-5">
        <b-col sm="8" md="6" lg="12" class="px-xl-2 mx-auto">
          <b-card-title class="mb-1"> Adventure starts here 🚀 </b-card-title>
          <b-card-text class="mb-2">
            Make your app management easy and fun!
          </b-card-text>

          <!-- form -->
          <validation-observer ref="registerForm">
            <b-form
              class="auth-register-form mt-2"
              @submit.prevent="register($data)"
            >
              <!-- select role -->
              <div class="demo-inline-spacing">
                <b-form-radio
                  name="some-radios"
                  v-model="rForm.roles_id"
                  value="2"
                >
                  Admin
                </b-form-radio>
                <b-form-radio
                  name="some-radios"
                  v-model="rForm.roles_id"
                  value="4"
                >
                  Agent/Developer
                </b-form-radio>
                <b-form-radio
                  name="some-radios"
                  v-model="rForm.roles_id"
                  value="3"
                >
                  Client
                </b-form-radio>
              </div>
              <br />
              <br />
              <!-- fullName -->
              <b-form-group label="Fullname" label-for="register-fullname">
                <validation-provider
                  #default="{ errors }"
                  name="Fullname"
                  vid="fullname"
                  rules="required"
                >
                  <b-form-input
                    id="register-fullname"
                    v-model="rForm.fullname"
                    name="register-fullname"
                    :state="errors.length > 0 ? false : null"
                    placeholder="johndoe"
                  />
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>

              <!-- email -->
              <b-form-group label="Email" label-for="register-email">
                <validation-provider
                  #default="{ errors }"
                  name="Email"
                  vid="email"
                  rules="required|email"
                >
                  <b-form-input
                    id="register-email"
                    v-model="rForm.email"
                    name="register-email"
                    :state="errors.length > 0 ? false : null"
                    placeholder="john@example.com"
                  />
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>

              <!-- ic number -->
              <b-form-group label="IC Number" label-for="ic_number">
                <validation-provider
                  #default="{ errors }"
                  name="IC number"
                  rules="required"
                >
                  <b-form-input
                    id="ic_number"
                    type="number"
                    v-model.number="rForm.ic_number"
                    :state="errors.length > 0 ? false : null"
                    name="register-ic-number"
                    placeholder="351512564505"
                    :formatter="inputformat"
                  />
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>

              <!-- company name -->
              <b-form-group label="Company name" label-for="company_name">
                <validation-provider
                  #default="{ errors }"
                  name="Company name"
                  rules="required"
                >
                  <b-form-input
                    id="company_name"
                    v-model="rForm.company_name"
                    :state="errors.length > 0 ? false : null"
                    name="register-company-name"
                    placeholder="John"
                  />
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>

              <!-- password -->
              <validation-observer>
                <b-form-group label="Password" label-for="password">
                  <validation-provider
                    #default="{ errors }"
                    name="password"
                    rules="required"
                  >
                    <b-input-group
                      class="input-group-merge"
                      :class="errors.length > 0 ? 'is-invalid' : null"
                    >
                      <b-form-input
                        id="password"
                        v-model="rForm.password"
                        :type="passwordFieldType"
                        :state="errors.length > 0 ? false : null"
                        class="form-control-merge"
                        name="password"
                        placeholder="············"
                      />
                    </b-input-group>
                    <small class="text-danger">{{ errors[0] }}</small>
                  </validation-provider>
                </b-form-group>

                <!-- confirm password -->
                <b-form-group
                  label="Confirm Password"
                  label-for="confirm_password"
                >
                  <validation-provider
                    #default="{ errors }"
                    name="confirm"
                    rules="required|password:@password"
                  >
                    <b-input-group
                      class="input-group-merge"
                      :class="errors.length > 0 ? 'is-invalid' : null"
                    >
                      <b-form-input
                        id="confirm_password"
                        v-model="rForm.password_confirmation"
                        :type="passwordFieldType"
                        :state="errors.length > 0 ? false : null"
                        class="form-control-merge"
                        name="confirm"
                        placeholder="············"
                      />
                    </b-input-group>
                    <small class="text-danger">{{ errors[0] }}</small>
                  </validation-provider>
                </b-form-group>

                <!-- mobile number -->
                <b-form-group label="Mobile Number" label-for="mobile_number">
                  <b-input-group>
                    <vue-tel-input
                      id="mobile_number"
                      v-model="rForm.mobile_number"
                      name="mobile_number"
                    >
                    </vue-tel-input>
                  </b-input-group>
                </b-form-group>
              </validation-observer>
              <b-button variant="primary" block type="submit">
                Sign up
              </b-button>
            </b-form>
          </validation-observer>

          <p class="text-center mt-2">
            <span>Already have an account?</span>
            <b-link :to="{ name: 'auth-login' }">
              <span>&nbsp;Sign in instead</span>
            </b-link>
          </p>
        </b-col>
      </b-col>
      <!-- /Register-->
    </b-row>
  </div>
</template>

<script>
/* eslint-disable global-require */
import axios from "axios";
import { ValidationProvider, ValidationObserver } from "vee-validate";
import VuexyLogo from "@core/layouts/components/Logo.vue";
import {
  BRow,
  BCol,
  BLink,
  BButton,
  BForm,
  BFormCheckbox,
  BFormGroup,
  BFormInput,
  BFormRadio,
  BInputGroup,
  BInputGroupAppend,
  BImg,
  BCardTitle,
  BCardText
} from "bootstrap-vue";
import { required } from "@validations";
import { togglePasswordVisibility } from "@core/mixins/ui/forms";
import store from "@/store/index";
// import useJwt from "@/auth/jwt/useJwt";
import { extend } from "vee-validate";
import Ripple from "vue-ripple-directive";
import Vue from "vue";
import VueTelInput from "vue-tel-input";
import "vue-tel-input/dist-modern/vue-tel-input.css";

Vue.use(VueTelInput);

extend("password", {
  params: ["target"],
  validate(value, { target }) {
    return value === target;
  },
  message: "Password does not match"
});

export default {
  components: {
    VuexyLogo,
    BRow,
    BImg,
    BCol,
    BLink,
    BButton,
    BForm,
    BCardText,
    BCardTitle,
    BFormCheckbox,
    BFormGroup,
    BFormInput,
    BFormRadio,
    BInputGroup,
    BInputGroupAppend,
    // validations
    ValidationProvider,
    ValidationObserver
  },
  directive: { Ripple },
  mixins: [togglePasswordVisibility],
  data() {
    return {
      rForm: {
        roles_id: "",
        email: "",
        fullname: "",
        ic_number: "",
        company_name: "",
        password: "",
        password_confirmation: "",
        mobile_number: ""
      },
      // email: "",
      // fullname: "",
      // ic_number: "",
      // company_name: "",
      // password: "",
      // password_confirmation: "",
      sideImg: require("@/assets/images/pages/register-v2.svg"),
      // validation
      required,
      passwordHasBlurred: false
    };
  },
  computed: {
    confirmPasswordState() {
      return this.passwordHasBlurred
        ? this.form.password == this.form.confirmpassword &&
          this.form.confirmpassword != ""
          ? true
          : false
        : null;
    },
    passwordState() {
      return this.passwordHasBlurred
        ? this.form.password.length >= 8
          ? true
          : false
        : null;
    },

    imgUrl() {
      if (store.state.appConfig.layout.skin === "dark") {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.sideImg = require("@/assets/images/pages/register-v2-dark.svg");
        return this.sideImg;
      }
      return this.sideImg;
    }
  },
  methods: {
    // register() {
    //   this.$refs.rForm.validate().then((success) => {
    //     if (success) {
    //       useJwt
    //         .register({
    //           //           username: this.username,
    //           //           email: this.userEmail,
    //           //           password: this.password
    //           email: this.email,
    //           fullname: this.fullname,
    //           ic_number: this.ic_number,
    //           company_name: this.company_name,
    //           password: this.password,
    //           password_confirmation: this.password_confirmation
    //         })
    //         .then((response) => {
    //           useJwt.setToken(response.data.accessToken);
    //           useJwt.setRefreshToken(response.data.refreshToken);
    //           localStorage.setItem(
    //             "userData",
    //             JSON.stringify(response.data.userData)
    //           );
    //           this.$ability.update(response.data.userData.ability);
    //           this.$router.push("/api/auth/register");
    //         })
    //         .catch((error) => {
    //           this.$refs.registerForm.setErrors(error.response.data.error);
    //         });
    //     }
    //   });
    // },
    // register() {
    //   this.$refs.rForm.validate().then((success) => {
    //     if (success) {
    //       this.$http
    //         .post("/api/auth/register", this.rForm)
    //         .then((res) => console.log(res));
    //     }
    //   });
    // },
    register() {
      this.$refs.registerForm
        .validate()
        .then((success) => {
          if (success) {
            this.$http
              .post("/api/auth/register", this.rForm)
              .then((response) => {
                console.log(response.data);
                this.$swal({
                  title: "Success!",
                  text: "You have registered successfully!",
                  icon: "success",
                  customClass: {
                    confirmButton: "btn btn-primary"
                  },
                  buttonsStyling: true
                }).then(function () {
                  location.href = "/login";
                });
              });
          }
        })

        .catch((error) => {
          this.$refs.loginForm.setErrors(error.response.data.error);
        });
    },
    inputformat(ic) {
      return String(ic).substring(0, 12);
    }
    // register() {
    //   this.$refs.registerForm.validate().then((success) => {
    //     if (success) {
    //       this.$http
    //         .post("/api/auth/register", this.rForm)
    //         .then((res) => console.log(res));
    //     }
    //   });
    // }
  }
};
/* eslint-disable global-require */
</script>

<style lang="scss">
@import "~@core/scss/vue/pages/page-auth.scss";
@import "~@core/scss/vue/libs/vue-sweetalert.scss";
</style>