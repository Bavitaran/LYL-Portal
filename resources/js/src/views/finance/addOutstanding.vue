
<template>
  <b-card>
    <b-form @submit.prevent>
      <b-row>
        <b-col cols="12" class="mb-2">
          <h5 class="mb-0">Outstanding Payment</h5>
        </b-col>
      </b-row>

      <b-col md="6">
        <b-form-group
          label="Payment Voucher File Reference No."
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
        <b-form-group label="Payment Voucher Date" label-for="pvdate">
          <b-form-input
            id="pvdate"
            placeholder="Payment Voucher Date"
            type="date"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Payment Voucher No" label-for="pvno">
          <b-form-input id="pvnote" placeholder="Payment Voucher No." />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Payment Voucher Payment To" label-for="pvpayto">
          <b-form-input id="pvpayto" placeholder="Payment Voucher Payment To" />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Payment Voucher Prepared By" label-for="pvprepby">
          <v-select
            v-model="selectpic1"
            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
            label="title"
            :options="optionpic1"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Payment Voucher Description" label-for="pvdesc">
          <b-form-textarea
            id="pvdesc"
            placeholder="Payment Voucher Description"
            rows="3"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Payment Voucher Amount" label-for="pvamount">
          <b-input-group prepend="RM">
            <b-form-input placeholder="0" />
          </b-input-group>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Payment Voucher Bank Account" label-for="pvbank">
          <v-select
            v-model="selectacc"
            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
            label="title"
            :options="optionfirmacc"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label="Payment Voucher Payment Mode"
          label-for="pvpaymode"
        >
          <v-select
            v-model="selectpvpaymode"
            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
            label="title"
            :options="optionpvpaymode"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label-for="pvcreateby" label="Payment Voucher Created By">
          <div class="form-label-group">
            <b-form-input
              id="pvcreateby"
              placeholder="Payment Voucher Created By"
            />
          </div>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label-for="pvappby" label="Payment Voucher Approved By">
          <div class="form-label-group">
            <b-form-input
              id="pvappby"
              placeholder="Payment Voucher Approved By"
            />
          </div>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label-for="pvreceivedby"
          label="Payment Voucher Received By"
        >
          <v-select
            v-model="selectpic1"
            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
            label="title"
            :options="optionpic1"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label="Payment Voucher Supporting Documents"
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
      ],
      selectpic1: { title: "Please select Person in Charge" },
      optionpic1: [{ title: "Lawyer 1" }],
      selectacc: { title: "Please select Person in Firms Account" },
      optionfirmacc: [{ title: "Bank 1" }, { title: "Bank 2" }],
      selectpvpaymode: { title: "Please select payment mode" },
      optionpvpaymode: [
        { title: "FPX" },
        { title: "Bank Transfer" },
        { title: "Cheque" }
      ]
    };
  }
};
</script>