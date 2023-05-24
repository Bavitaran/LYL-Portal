    
<template>
  <b-card>
    <b-form @submit.prevent>
      <b-row>
        <!-- first name -->
        <b-col cols="12">
          <b-form-group label="Name" label-for="representname">
            <b-form-input
              id="representname"
              v-model="representName"
              type="name"
              class="text-uppercase"
            />
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Address" label-for="representadd">
            <b-form-textarea
              id="representaddress"
              placeholder="Address"
              rows="3"
              class="text-uppercase"
            />
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="State" label-for="representstate">
            <v-select
              v-model="selectstate"
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="optionstate"
              class="text-uppercase"
            />
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Postcode" label-for="representpostcode">
            <b-form-input
              id="representpostcode"
              v-model="representPostcode"
              type="number"
            />
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="City" label-for="representcity">
            <b-form-input
              id="representcity"
              v-model="representCity"
              type="name"
              class="text-uppercase"
            />
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Country" label-for="representcountry">
            <b-form-input
              id="representcountry"
              v-model="representCountry"
              type="name"
              class="text-uppercase"
            />
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Phone No." label-for="representphone">
            <b-form-input
              id="representphone"
              v-model="representPhone"
              type="number"
            />
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Email address" label-for="representemail">
            <b-form-input
              id="representemail"
              v-model="representEmail"
              type="email"
            />
          </b-form-group>
        </b-col>

        <!-- submit and reset -->
        <b-col cols="12">
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
      </b-row>
    </b-form>
  </b-card>
</template>

<script>
import {
  BCard,
  BRow,
  BCol,
  BFormGroup,
  BFormInput,
  BFormCheckbox,
  BFormTextarea,
  BForm,
  BButton
} from "bootstrap-vue";
import vSelect from "vue-select";
import Ripple from "vue-ripple-directive";

export default {
  components: {
    BCard,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BFormCheckbox,
    BFormTextarea,
    BForm,
    BButton,
    vSelect
  },
  directives: {
    Ripple
  },
  data() {
    return {
      selectstate: { title: "Please select State" },
      optionstate: [
        { title: "Johor" },
        { title: "Kedah" },
        { title: "Kelantan" },
        { title: "Malacca" },
        { title: "Negeri Sembilan" },
        { title: "Pahang" },
        { title: "Penang" },
        { title: "Perak" },
        { title: "Perlis" },
        { title: "Sabah" },
        { title: "Selangor" },
        { title: "Terengganu" },
        { title: "Kuala Lumpur" },
        { title: "Labuan" },
        { title: "Putrajaya" }
      ]
    };
  }
};
</script>