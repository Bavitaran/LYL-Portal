
<template>
  <b-card>
    <b-form @submit.prevent>
      <b-row>
        <b-col cols="12" class="mb-2">
          <h5 class="mb-0">Invoice Quotation</h5>
        </b-col>
      </b-row>

      <b-col md="6">
        <b-form-group
          label="Official Receipt File Reference No."
          label-for="filerefno"
        >
          <v-select
            v-model="selectfilerefno"
            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
            label="filerefno"
            :options="optionfilerefno"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Official Receipt No." label-for="offrecno">
          <b-form-input id="offrecno" placeholder="Official Receipt No." />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Official Receipt Description" label-for="desc">
          <b-form-textarea
            id="desc"
            placeholder="Official Receipt Description"
            rows="3"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label="Official Receipt Amount Received"
          label-for="amountreceived"
        >
          <b-input-group prepend="RM">
            <b-form-input placeholder="0" />
          </b-input-group>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Official Receipt Payee Name" label-for="payeename">
          <div class="form-label-group">
            <b-form-input
              id="payeename"
              placeholder="Official Receipt Payee Name"
            />
          </div>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label-for="payeeref"
          label="Official Receipt Payee Reference"
        >
          <div class="form-label-group">
            <b-form-input
              id="payeeref"
              placeholder="Official Receipt Payee Reference"
            />
          </div>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label="Official Receipt Supporting Documents"
          label-for="payeeref"
        >
          <b-form-file
            v-model="file"
            placeholder="Choose a file or drop it here..."
            drop-placeholder="Drop file here..."
          />

          <b-card-text class="my-1">
            Selected file: <strong>{{ file ? file.name : "" }}</strong>
          </b-card-text>
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
      selectfilerefno: { filerefno: "Please select file reference no." },
      optionfilerefno: [
        { filerefno: "2021.3272.LL.BCH.BPL (FL)" },
        { filerefno: "2021.3229.LL.OSK.LLW (FL)" },
        { filerefno: "2020.3129.LL.LPSB" }
      ]
    };
  }
};
</script>