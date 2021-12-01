<template>
  <div class="auth-wrapper auth-v1 px-2">
    <div class="auth-inner py-2">

      <!-- Register v1 -->
      <b-card class="mb-0">
        <b-link class="brand-logo">
          <!-- <vuexy-logo /> -->
          <h2 class="brand-text text-primary ml-1">
            LYL Portal
          </h2>
        </b-link>

        <!-- <b-card-title class="mb-1">
          Adventure starts here 🚀
        </b-card-title>
        <b-card-text class="mb-2">
          Make your app management easy and fun!
        </b-card-text> -->

        <!-- form -->
        <validation-observer ref="registerForm">
          <b-form
            class="auth-register-form mt-2"
            @submit.prevent="createUser"
          >
            <!-- username -->
            <!-- <b-form-group
              label="Username"
              label-for="username"
            >
              <validation-provider
                #default="{ errors }"
                name="Username"
                rules="required"
              >
                <b-form-input
                  id="username"
                  v-model="username"
                  :state="errors.length > 0 ? false:null"
                  name="register-username"
                  placeholder="johndoe"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group> -->

            <!-- email -->
            <b-form-group
              label="Email"
              label-for="email"
            >
              <validation-provider
                #default="{ errors }"
                name="Email"
                rules="required|email"
              >
                <b-form-input
                  id="email"
                  v-model="register.email"
                  :state="errors.length > 0 ? false:null"
                  name="register-email"
                  placeholder="john@example.com"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- first name -->
            <b-form-group
              label="First Name"
              label-for="first_name"
            >
              <validation-provider
                #default="{ errors }"
                name="Firstname"
                rules="required"
              >
                <b-form-input
                  id="first_name"
                  v-model="register.firstname"
                  :state="errors.length > 0 ? false:null"
                  name="register-first-name"
                  placeholder="John"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- last name -->
            <b-form-group
              label="Last Name"
              label-for="last_name"
            >
              <validation-provider
                #default="{ errors }"
                name="Lastname"
                rules="required"
              >
                <b-form-input
                  id="last_name"
                  v-model="register.lastname"
                  :state="errors.length > 0 ? false:null"
                  name="register-last-name"
                  placeholder="Doe"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- password -->
            <validation-observer>
            <b-form-group
              label="Password"
              label-for="password"
            >
              <validation-provider
                #default="{ errors }"
                name="password"
                rules="required"                
              >
                <b-input-group
                  class="input-group-merge"
                  :class="errors.length > 0 ? 'is-invalid':null"
                >
                  <b-form-input
                    id="password"
                    v-model="register.password"
                    :type="passwordFieldType"
                    :state="errors.length > 0 ? false:null"
                    class="form-control-merge"
                    name="password"
                    placeholder="············"
                  />
                  <b-input-group-append is-text>
                    <feather-icon
                      :icon="passwordToggleIcon"
                      class="cursor-pointer"
                      @click="togglePasswordVisibility"
                    />
                  </b-input-group-append>
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
                  :class="errors.length > 0 ? 'is-invalid':null"
                >
                  <b-form-input
                    id="confirm_password"
                    v-model="confirmation"
                    :type="passwordFieldType"
                    :state="errors.length > 0 ? false:null"
                    class="form-control-merge"
                    name="confirm"
                    placeholder="············"
                  />
                  <b-input-group-append is-text>
                    <feather-icon
                      :icon="passwordToggleIcon"
                      class="cursor-pointer"
                      @click="togglePasswordVisibility"
                    />
                  </b-input-group-append>
                </b-input-group>
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
            </validation-observer>

            <!-- checkbox -->
            <b-form-group>
              <b-form-checkbox
                id="register-privacy-policy"
                v-model="status"
                name="checkbox-1"
              >
                I agree to
                <b-link>privacy policy & terms</b-link>
              </b-form-checkbox>
            </b-form-group>

            <!-- submit button -->
            <b-button
              variant="primary"
              block
              type="submit"
            >
              Sign up
            </b-button>
          </b-form>
        </validation-observer>

        <b-card-text class="text-center mt-2">
          <span>Already have an account? </span>
          <b-link :to="{name:'auth-login-v1'}">
            <span>Sign in instead</span>
          </b-link>
        </b-card-text>

        <!-- <div class="divider my-2">
          <div class="divider-text">
            or
          </div>
        </div> -->

        <!-- social buttons -->
        <!-- <div class="auth-footer-btn d-flex justify-content-center">
          <b-button
            variant="facebook"
            href="javascript:void(0)"
          >
            <feather-icon icon="FacebookIcon" />
          </b-button>
          <b-button
            variant="twitter"
            href="javascript:void(0)"
          >
            <feather-icon icon="TwitterIcon" />
          </b-button>
          <b-button
            variant="google"
            href="javascript:void(0)"
          >
            <feather-icon icon="MailIcon" />
          </b-button>
          <b-button
            variant="github"
            href="javascript:void(0)"
          >
            <feather-icon icon="GithubIcon" />
          </b-button>
        </div> -->
      </b-card>
    <!-- /Register v1 -->
    </div>
  </div>

</template>

<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import {
  BCard,
  BLink,
  BCardTitle,
  BCardText,
  BForm,
  BButton,
  BFormInput,
  BFormGroup,
  BInputGroup,
  BInputGroupAppend,
  BFormCheckbox,
} from 'bootstrap-vue'
import VuexyLogo from '@core/layouts/components/Logo.vue'
import { required, email } from '@validations'
import { togglePasswordVisibility } from '@core/mixins/ui/forms'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import { extend } from 'vee-validate';

extend('password', {
  params: ['target'],
  validate(value, { target }) {
    return value === target;
  },
  message: 'Password does not match'
});

export default {
  components: {
    VuexyLogo,
    // BSV
    BCard,
    BLink,
    BCardTitle,
    BCardText,
    BForm,
    BButton,
    BFormInput,
    BFormGroup,
    BInputGroup,
    BInputGroupAppend,
    BFormCheckbox,
    // validations
    ValidationProvider,
    ValidationObserver,
  },
  mixins: [togglePasswordVisibility],
  data() {
    return {
      register: {
        email: '',
        firstname: '',
        lastname: '',
        password: '',
      },
      status: '',
      confirmation: '',
      // validation rules
      // required,
      // email,
      // 'action':'/createUser',
      // log : console.log,
    }
  },
  computed: {
    passwordToggleIcon() {
      return this.passwordFieldType === 'password' ? 'EyeIcon' : 'EyeOffIcon'
    },
  },
  methods: {
    createUser(register) {
      this.$store.dispatch('createUser'. register)
    },
  },
}
</script>

<style lang="scss">
@import '~@core/scss/vue/pages/page-auth.scss';
</style>
