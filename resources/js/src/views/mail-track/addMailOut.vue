<template>
  <b-card title="New Outgoing Mail Track ">
    <validation-observer ref="simpleRules">
      <b-form>
        <b-row>
          <!--  This field is required-->
          <b-col md="6">
            <b-form-group>
              <label>Dispatch</label>
              <validation-provider
                #default="{ errors }"
                rules="required"
                name="Dispatch"
              >
                <v-select
                  v-model="despatch"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="Dispatch"
                  :options="option"
                  placeholder="Dispatch"
                  :state="errors.length > 0 ? false : null"
                />
                <!-- <b-form-input
                  v-model="despatch"
                  :state="errors.length > 0 ? false : null"
                  placeholder="Dispatch"
                /> -->
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!--  This field is required-->
          <!--Enter Date -->
          <b-col md="6">
            <b-form-group>
              <label>Pick Up Date</label>
              <validation-provider #default="{ errors }" rules="date">
                <b-form-input
                  placeholder="Pick Up Date"
                  v-model="date"
                  type="date"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!-- File Ref -->
          <b-col md="6">
            <b-form-group>
              <label>File Reference No.</label>
              <validation-provider
                #default="{ errors }"
                rules="required"
                name="File Reference No."
              >
                <v-select
                  v-model="ref_no"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="File Reference No."
                  :options="option"
                  placeholder="File Reference No."
                />
                <!-- <b-form-input
                  v-model="ref_no"
                  :state="errors.length > 0 ? false : null"
                  placeholder="File Reference No."
                /> -->
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!-- File Ref -->
          <b-col md="6">
            <b-form-group>
              <label>Person In Charge</label>
              <validation-provider
                #default="{ errors }"
                rules="required"
                name="Person In Charges"
              >
                <v-select
                  v-model="selectpic"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic"
                  placeholder="Person In Charges"
                />
                <!-- <b-form-input
                  v-model="ref_no"
                  :state="errors.length > 0 ? false : null"
                  placeholder="File Reference No."
                /> -->
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!--  This field is required-->
          <!--Enter Date -->
          <b-col md="6">
            <b-form-group>
              <label>Delivered Date</label>
              <validation-provider #default="{ errors }" rules="date">
                <b-form-input
                  placeholder="Delivered Date"
                  v-model="date"
                  type="date"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!-- The digits field must be numeric and exactly contain 3 digits -->
          <b-col md="6">
            <b-form-group>
              <label>LYL Received Acknowledgement Date</label>
              <validation-provider #default="{ errors }" rules="date">
                <b-form-input
                  placeholder="LYL Received Acknowledgement Date"
                  v-model="incoming"
                  type="date"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!--  Only alphabetic characters-->
          <b-col md="6">
            <b-form-group>
              <label>Recipient's Address</label>
              <validation-provider
                #default="{ errors }"
                rules="required"
                name="Recipient's Address"
              >
                <!-- <b-form-input
                  v-model="recipient_add"
                  :state="errors.length > 0 ? false : null"
                  placeholder="Enter Character Only"
                /> -->
                <b-form-textarea
                  v-model="recipient_add"
                  :state="errors.length > 0 ? false : null"
                  placeholder="Recipient's Address"
                  rows="3"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!-- Description -->
          <b-col md="6">
            <b-form-group>
              <label>Description</label>
              <validation-provider
                #default="{ errors }"
                rules="required"
                name="Description"
              >
                <v-select
                  v-model="description"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="Description"
                  :options="option"
                  placeholder="Description"
                />
                <!-- <b-form-input
                  v-model="description"
                  :state="errors.length > 0 ? false : null"
                  placeholder="Description"
                /> -->
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>

          <!--Only alphabetic characters, numbers, dashes or underscores -->
          <b-col md="6">
            <b-form-group>
              <label>Dispatch Charges</label>
              <!-- append and pepend -->
              <b-input-group prepend="RM">
                <input
                  type="text"
                  class="form-control"
                  v-model="paid_amount"
                  placeholder="0.00"
                />
              </b-input-group>
            </b-form-group>
          </b-col>

          <!-- submit button -->
          <b-col cols="12">
            <b-button
              variant="primary"
              type="submit"
              @click.prevent="validationForm"
            >
              Submit
            </b-button>
          </b-col>
        </b-row>
      </b-form>
    </validation-observer>
  </b-card>
</template>

<script>
import { ValidationProvider, ValidationObserver } from "vee-validate";
import {
  BCard,
  BFormInput,
  BFormGroup,
  BForm,
  BRow,
  BCol,
  BButton,
  BFormTextarea,
  BInputGroupPrepend
} from "bootstrap-vue";
import vSelect from "vue-select";
import {
  required,
  email,
  confirmed,
  url,
  between,
  alpha,
  integer,
  password,
  min,
  digits,
  alphaDash,
  length
} from "@validations";

export default {
  components: {
    BCard,
    ValidationProvider,
    ValidationObserver,
    BFormInput,
    BFormGroup,
    BForm,
    BRow,
    BCol,
    BButton,
    BFormTextarea,
    BInputGroupPrepend,
    vSelect
  },
  data() {
    return {
      name: "",
      passwordValue: "",
      passwordCon: "",
      emailValue: "",
      number: "",
      numberRange: "",
      numberRegx: "",
      URL: "",
      Alphabetic: "",
      digitValue: "",
      digitValue2: "",
      character: "",
      required,
      confirmed,
      password,
      email,
      min,
      integer,
      url,
      alpha,
      between,
      digits,
      length,
      alphaDash,
      selectpic: { title: "Please select Person in Charge" },
      optionpic: [{ title: "Lawyer 1" }]
    };
  },
  methods: {
    validationForm() {
      this.$refs.simpleRules.validate().then((success) => {
        if (success) {
          // eslint-disable-next-line
          alert("form submitted!");
        }
      });
    }
  }
};
</script>
