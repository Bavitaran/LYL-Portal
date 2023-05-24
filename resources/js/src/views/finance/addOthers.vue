
<template>
  <b-card>
    <b-form @submit.prevent>
      <b-row>
        <b-col cols="12" class="mb-2">
          <h5 class="mb-0">Others Payment</h5>
        </b-col>
      </b-row>
      <b-col md="6">
        <b-form-group label="Fee Payment to Account" label-for="fpto">
          <b-form-input id="fpto" placeholder="Fee Payment to Account" />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Fee Payment Receiver Name" label-for="fpname">
          <b-form-input id="fpname" placeholder="Fee Payment Receiver Name" />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Fee Payment Amount" label-for="fpamount">
          <b-input-group prepend="RM">
            <b-form-input placeholder="0" />
          </b-input-group>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Fee Payment To" label-for="fpto">
          <v-select
            v-model="selectfpto"
            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
            label="fpto"
            :options="optionfpto"
          />
        </b-form-group>
      </b-col>
      <br />
      <!-- submit and reset -->
      <b-col>
        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          type="submit"
          variant="primary"
          class="mr-1"
        >
          Submit
        </b-button>
        <b-button
          v-ripple.400="'rgba(186, 191, 199, 0.15)'"
          type="reset"
          variant="outline-secondary"
        >
          Reset
        </b-button>
      </b-col>
    </b-form>
  </b-card>
</template>


<script>
import {
  BRow,
  BCol,
  BFormGroup,
  BFormInput,
  BFormCheckbox,
  BForm,
  BButton,
  BCard,
  BFormTextarea,
  BInputGroupPrepend,
  BInputGroup,
  BFormFile
} from "bootstrap-vue";
import Ripple from "vue-ripple-directive";
import vSelect from "vue-select";

export default {
  components: {
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BFormCheckbox,
    BForm,
    BButton,
    BCard,
    vSelect,
    BFormTextarea,
    BInputGroupPrepend,
    BInputGroup,
    BFormFile
  },
  directives: {
    Ripple
  },
  data() {
    return {
      selectfpto: { fpto: "Please select payment to" },
      optionfpto: [
        { fpto: "Solicitor Fee" },
        { fpto: "Independent Contractor" },
        { fpto: "Despatch" }
      ]
    };
  }
};
</script>