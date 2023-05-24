<template>
  <b-card title="New Trademark Type">
    <validation-observer ref="simpleRules">
      <b-form>
        <b-row>
          <!--Only alphabetic characters, numbers, dashes or underscores -->
          <b-col md="12">
            <b-form-group>
              <label>Trademark Type Name</label>
              <input
                type="text"
                class="form-control"
                v-model="unit_name"
                placeholder="Trademark Type Name"
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
              Add
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
