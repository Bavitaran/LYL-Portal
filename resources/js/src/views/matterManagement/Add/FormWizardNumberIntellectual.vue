<template>
  <div>
    <form-wizard
      color="#7367F0"
      :title="null"
      :subtitle="null"
      shape="square"
      finish-button-text="Submit"
      back-button-text="Previous"
      class="mb-3"
      @on-complete="formSubmitted"
    >
      <!-- new matter details tab -->
      <tab-content title="Details" :before-change="validationForm">
        <validation-observer ref="accountRules" tag="form">
          <b-row>
            <b-col cols="12" class="mb-2">
              <h5 class="mb-0">Sub Matter</h5>
            </b-col>
            <hr />
            <b-col md="6">
              <b-form-group label="Sub Matter type" label-for="name">
                <v-select
                  v-model="selected"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="option"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
          </b-row>
          <br />
          <b-row>
            <b-col cols="12" class="mb-2">
              <h5 class="mb-0">Person In Charge</h5>
            </b-col>
            <b-col md="6">
              <b-form-group label="Person in Charge" label-for="pic">
                <v-select
                  v-model="selectpic1"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic1"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
          </b-row>
          <br />
          <b-row>
            <b-col md="6">
              <b-form-group label="Person in Charge 2" label-for="pic2">
                <v-select
                  v-model="selectpic2"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic2"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
          </b-row>
          <br />
          <b-row>
            <b-col cols="12" class="mb-2">
              <h5 class="mb-0">Parties</h5>
            </b-col>
            <b-col md="6">
              <h6 class="mb-0">Individual/Company</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-group label="Parties Name" label-for="partiesname">
                <v-select
                  v-model="selectparties"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionparties"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <h6 class="mb-0">Individual/Company</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-group label="Parties Name" label-for="partiesname">
                <v-select
                  v-model="selectparties"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionparties"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
          </b-row>
          <br />
          <b-row>
            <b-col cols="12" class="mb-2">
              <h5 class="mb-0">Represented By</h5>
            </b-col>
            <b-col md="6">
              <h6 class="mb-0">Firms</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-checkbox v-model="currentinfo" value="A" plain>
                <b>Use current firm information</b>
              </b-form-checkbox>
              <br />
              <b-form-group label="Name" label-for="representname">
                <b-form-input
                  id="representname"
                  v-model="representName"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Address" label-for="representadd">
                <b-form-textarea
                  id="textarea-default"
                  placeholder="Textarea"
                  rows="3"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="State" label-for="representstate">
                <v-select
                  v-model="selectstate"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionstate"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Postcode" label-for="representpostcode">
                <b-form-input
                  id="representpostcode"
                  v-model="representPostcode"
                  type="number"
                />
              </b-form-group>
              <b-form-group label="City" label-for="representcity">
                <b-form-input
                  id="representcity"
                  v-model="representCity"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Country" label-for="representcountry">
                <b-form-input
                  id="representcountry"
                  v-model="representCountry"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Phone No." label-for="representphone">
                <b-form-input
                  id="representphone"
                  v-model="representPhone"
                  type="number"
                />
              </b-form-group>
              <b-form-group label="Email address" label-for="representemail">
                <b-form-input
                  id="representemail"
                  v-model="representEmail"
                  type="email"
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <h6 class="mb-0">Firms</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-checkbox v-model="currentinfo" value="A" plain>
                <b>Use current firm information</b>
              </b-form-checkbox>
              <br />
              <b-form-group label="Name" label-for="representname">
                <b-form-input
                  id="representname"
                  v-model="representName"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Address" label-for="representadd">
                <b-form-textarea
                  id="representaddress"
                  placeholder="Textarea"
                  rows="3"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="State" label-for="representstate">
                <v-select
                  v-model="selectstate"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionstate"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Postcode" label-for="representpostcode">
                <b-form-input
                  id="representpostcode"
                  v-model="representPostcode"
                  type="number"
                />
              </b-form-group>
              <b-form-group label="City" label-for="representcity">
                <b-form-input
                  id="representcity"
                  v-model="representCity"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Country" label-for="representcountry">
                <b-form-input
                  id="representcountry"
                  v-model="representCountry"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="Phone No." label-for="representphone">
                <b-form-input
                  id="representphone"
                  v-model="representPhone"
                  type="number"
                />
              </b-form-group>
              <b-form-group label="Email address" label-for="representemail">
                <b-form-input
                  id="representemail"
                  v-model="representEmail"
                  type="email"
                />
              </b-form-group>
            </b-col>
          </b-row>
          <br />
          <b-row>
            <b-col cols="12" class="mb-2">
              <h5 class="mb-0">Account</h5>
            </b-col>
            <b-col md="12">
              <b-form-group label="Firms Account" label-for="firmsacc">
                <v-select
                  v-model="selectacc"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfirmacc"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
          </b-row>
        </validation-observer>
      </tab-content>

      <!-- tabB details tab -->
      <tab-content title="Tab B" :before-change="validationFormInfo">
        <validation-observer ref="infoRules" tag="form">
          <b-row>
            <b-col md="6">
              <b-form-group label="Relevant" label-for="assettype">
                <b-form-select v-model="assets" id="vehicle-makes">
                  <option
                    class="text-uppercase"
                    v-for="option in makes_options"
                    :value="option.id"
                    :key="option.id"
                  >
                    {{ option.text }}
                  </option>
                </b-form-select>
              </b-form-group>
              <b-form-group label="Relevant Type" label-for="title">
                <b-form-select id="asset-type" v-model="model">
                  <option
                    class="text-uppercase"
                    v-for="option in model_options[assets]"
                    :value="option.id"
                    :key="option.id"
                  >
                    {{ option.text }}
                  </option>
                </b-form-select>
              </b-form-group>
              <b-form-group label="Type of Trademark" label-for="trademarktype">
                <v-select
                  v-model="selecttrademark"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optiontrademark"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
          </b-row>
        </validation-observer>
      </tab-content>

      <!-- tabC details tab -->
      <tab-content title="Tab C" :before-change="validationFormInfo">
        <validation-observer ref="infoRules" tag="form">
          <b-row>
            <b-col md="6">
              <b-form-group label="Parties IC" label-for="opartiesic">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group label="Company Forms" label-for="compforms">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group label="Trademark Logo" label-for="logo">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>

              <b-form-group label="Minutes of Meeting" label-for="executoric">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group label="SSM Search" label-for="ssm">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group label="Others" label-for="others">
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
          </b-row>
        </validation-observer>
      </tab-content>

      <!-- tabD details tab -->
      <tab-content title="Tab D" :before-change="validationFormInfo">
        <validation-observer ref="infoRules" tag="form">
          <b-row>
            <b-col md="6">
              <b-form-group label="Remarks" label-for="remarks">
                <b-form-textarea
                  id="remarks"
                  placeholder=""
                  rows="3"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="File Reference No." label-for="filerefno">
                <b-form-input
                  id="filerefno"
                  v-model="filerefno"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-checkbox v-model="agreement" value="A" plain>
                <b>I confirm that the information given is accurate and true</b>
              </b-form-checkbox>
            </b-col>
          </b-row>
        </validation-observer>
      </tab-content>
    </form-wizard>
  </div>
</template>



<script>
import { FormWizard, TabContent } from "vue-form-wizard";
import vSelect from "vue-select";
import { ValidationProvider, ValidationObserver } from "vee-validate";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import "vue-form-wizard/dist/vue-form-wizard.min.css";
import {
  BRow,
  BCol,
  BFormGroup,
  BFormInput,
  BFormInvalidFeedback,
  BFormCheckbox,
  BFormTextarea,
  BInputGroupPrepend,
  BInputGroup,
  BFormFile,
  BFormSelect
} from "bootstrap-vue";
var makes_options = [
  { text: "Goods", id: 1 },
  { text: "Services", id: 2 }
];
var model_options = {
  1: [
    { text: "Class 1", id: 1 },
    { text: "Class 2", id: 2 },
    { text: "Class 3", id: 3 },
    { text: "Class ...", id: 3 },
    { text: "Class 34", id: 4 }
  ],
  2: [
    { text: "Class 35", id: 1 },
    { text: "Class 36", id: 2 },
    { text: "Class 37", id: 3 },
    { text: "Class ...", id: 4 },
    { text: "Class 45", id: 5 }
  ]
};

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
    FormWizard,
    TabContent,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    vSelect,
    BFormInvalidFeedback,
    BFormCheckbox,
    BFormTextarea,
    BInputGroupPrepend,
    BInputGroup,
    BFormFile,
    BFormSelect,
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent
  },

  data() {
    return {
      selected: { title: "Please select submatter type" },
      option: [
        { title: "Trademark" },
        { title: "Copyright" },
        { title: "Industrial Design" },
        { title: "Patent" },
        { title: "Geographic Indication" },
        { title: "IC Layout Design" }
      ],
      selecttrademark: { title: "Please select type of Trademark" },
      optiontrademark: [
        { title: "Trademark" },
        { title: "Sign" },
        { title: "Collective Mark" },
        { title: "Certification Mark" }
      ],
      selectacc: { title: "Please select Person in Firms Account" },
      optionfirmacc: [
        { title: "PBB (Office)" },
        { title: "PBB (Client)" },
        { title: "CIMBi (Office)" },
        { title: "CIMBi (Client)" },
        { title: "Affin (Office)" },
        { title: "Affin (Client)" },
        { title: "HLBB (Office)" },
        { title: "HLBB (Client)" }
      ],
      assets: null,
      model: null,
      makes_options: makes_options,
      model_options: model_options,

      file: null,
      watch: {
        make: function (event) {
          $("#asset-type").dropdown("clear");
        }
      }
    };
  },
  methods: {
    formSubmitted() {
      this.$toast({
        component: ToastificationContent,
        props: {
          title: "Form Submitted",
          icon: "EditIcon",
          variant: "success"
        }
      });
    },
    validationForm() {
      return new Promise((resolve, reject) => {
        this.$refs.accountRules.validate().then((success) => {
          if (success) {
            resolve(true);
          } else {
            reject();
          }
        });
      });
    },
    validationFormInfo() {
      return new Promise((resolve, reject) => {
        this.$refs.infoRules.validate().then((success) => {
          if (success) {
            resolve(true);
          } else {
            reject();
          }
        });
      });
    },
    validationFormAddress() {
      return new Promise((resolve, reject) => {
        this.$refs.addressRules.validate().then((success) => {
          if (success) {
            resolve(true);
          } else {
            reject();
          }
        });
      });
    },
    validationFormSocial() {
      return new Promise((resolve, reject) => {
        this.$refs.socialRules.validate().then((success) => {
          if (success) {
            resolve(true);
          } else {
            reject();
          }
        });
      });
    }
  }
};
</script>
