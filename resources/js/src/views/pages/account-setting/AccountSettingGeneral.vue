<template>
  <b-card>
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
      </b-row>
      <br />
      <b-col sm="6" class="border">
        <br />
        <h4>Default Contact Details</h4>
        <b-row>
          <b-col sm="12">
            <b-form-group label="Mobile Number" label-for="account-mobile-num">
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
            <b-form-group label="Email" label-for="account-email">
              <b-form-input
                v-model="optionsLocal.email"
                name="email"
                placeholder="john@example.com"
              />
            </b-form-group>
          </b-col>
        </b-row>
      </b-col>
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
