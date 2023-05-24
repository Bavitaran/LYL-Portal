<template>
  <b-card title="Edit Assets">
    <validation-observer ref="simpleRules">
      <b-form>
        <b-row>
          <b-col md="12">
            <b-form-group>
              <label>Assets Type Name</label>
              <validation-provider
                #default="{ errors }"
                rules="required"
                name="Assets Type Name"
              >
                <v-select
                  v-model="assets_type_name"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="Assets Type Name"
                  :options="assetstype_name"
                  placeholder="Assets Type Name"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>
          <!--Only alphabetic characters, numbers, dashes or underscores -->
          <b-col md="12">
            <b-form-group>
              <label>Assets Name</label>
              <input
                type="text"
                class="form-control"
                v-model="assets_name"
                placeholder="Assets Name"
              />
            </b-form-group>
          </b-col>

          <!-- submit button -->
          <b-col cols="12">
            <b-button
              variant="primary"
              type="submit"
              @click.prevent="validationForm"
            >
              Update
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
