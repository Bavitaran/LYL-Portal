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
      @submit.prevent="update"
    >
      <!-- new matter details tab -->
      <tab-content title="Details" :before-change="validationForm">
        <validation-observer ref="accountRules" tag="form">
          <b-row>
            <b-col cols="12" class="mb-2">
              <b-form-group label="File Reference No." label-for="filerefno">
                <b-form-input
                  id="filerefno"
                  v-model="filerefno"
                  type="name"
                  placeholder="File Reference No"
                  readonly
                />
              </b-form-group>
            </b-col>
            <b-col cols="12" class="mb-2">
              <h5 class="mb-0">Sub Matter</h5>
            </b-col>
            <hr />
            <b-col md="6">
              <b-form-group label="Sub Matter type" label-for="name">
                <input
                  type="text"
                  class="form-control"
                  v-model="matter.matter_type"
                  readonly
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <b-form-group label="Status" label-for="status">
                <input
                  type="text"
                  class="form-control"
                  v-model="matter.status"
                  readonly
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
                <input
                  type="text"
                  class="form-control"
                  v-model="matter.pic"
                  readonly
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <b-form-group label="Person in Charge 2" label-for="pic2">
                <input
                  type="text"
                  class="form-control"
                  v-model="matter.pic"
                  readonly
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
              <h6 class="mb-0">Testator/Trustor</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-group label="Parties Name" label-for="partiesname">
                <input
                  type="text"
                  class="form-control"
                  v-model="matter.pic"
                  readonly
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <h6 class="mb-0">Executor/Trustee/Beneficiaries/ Guardianship</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-group label="Parties Name" label-for="partiesname">
                <input
                  type="text"
                  class="form-control"
                  v-model="matter.pic"
                  readonly
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
              <h6 class="mb-0">Testator/Trustor</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-group label="Name" label-for="representname">
                <b-form-input
                  id="representname"
                  v-model="representName"
                  type="name"
                  placeholder="Name"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Address" label-for="representadd">
                <b-form-textarea
                  id="textarea-default"
                  placeholder="Textarea"
                  rows="3"
                  readonly
                />
              </b-form-group>
              <b-form-group label="State" label-for="representstate">
                <b-form-input
                  id="representname"
                  v-model="representName"
                  type="name"
                  placeholder="State"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Postcode" label-for="representpostcode">
                <b-form-input
                  id="representpostcode"
                  v-model="representPostcode"
                  type="number"
                  placeholder="Postcode"
                  readonly
                />
              </b-form-group>
              <b-form-group label="City" label-for="representcity">
                <b-form-input
                  id="representcity"
                  v-model="representCity"
                  type="name"
                  placeholder="City"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Country" label-for="representcountry">
                <b-form-input
                  id="representcountry"
                  v-model="representCountry"
                  type="name"
                  placeholder="Country"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Phone No." label-for="representphone">
                <b-form-input
                  id="representphone"
                  v-model="representPhone"
                  type="number"
                  placeholder="Phone No"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Email address" label-for="representemail">
                <b-form-input
                  id="representemail"
                  v-model="representEmail"
                  type="email"
                  placeholder="Email Address"
                  readonly
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <h6 class="mb-0">Trustee</h6>
              <b-col cols="12">
                <hr />
              </b-col>
              <b-form-group label="Name" label-for="representname">
                <b-form-input
                  id="representname"
                  v-model="representName"
                  type="name"
                  placeholder="Name"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Address" label-for="representadd">
                <b-form-textarea
                  id="representaddress"
                  placeholder="Textarea"
                  rows="3"
                  readonly
                />
              </b-form-group>
              <b-form-group label="State" label-for="representstate">
                <b-form-input
                  id="representstate"
                  v-model="representstate"
                  type="name"
                  placeholder="State"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Postcode" label-for="representpostcode">
                <b-form-input
                  id="representpostcode"
                  v-model="representPostcode"
                  type="number"
                  placeholder="Postcode"
                  readonly
                />
              </b-form-group>
              <b-form-group label="City" label-for="representcity">
                <b-form-input
                  id="representcity"
                  v-model="representCity"
                  type="name"
                  placeholder="City"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Country" label-for="representcountry">
                <b-form-input
                  id="representcountry"
                  v-model="representCountry"
                  type="name"
                  placeholder="Country"
                  readonly
                />
              </b-form-group>
              <b-form-group label="Phone No." label-for="representphone">
                <b-form-input
                  id="representphone"
                  v-model="representPhone"
                  type="number"
                  placeholder="Phone No."
                  readonly
                />
              </b-form-group>
              <b-form-group label="Email address" label-for="representemail">
                <b-form-input
                  id="representemail"
                  v-model="representEmail"
                  type="email"
                  placeholder="Email Address"
                  readonly
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
                <input
                  type="text"
                  class="form-control"
                  v-model="matter.control_account"
                  readonly
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
              <b-form-group label="Asset Type" label-for="assettype">
                <b-form-select v-model="assets" id="vehicle-makes">
                  <option
                    v-for="options in makes_options"
                    :value="options.id"
                    :key="options.id"
                  >
                    {{ options.text }}
                  </option>
                </b-form-select>
              </b-form-group>
              <b-form-group label="Assets" label-for="title">
                <b-form-select id="asset-type" v-model="model">
                  <option
                    v-for="option in model_options[assets]"
                    :value="option.id"
                    :key="option.id"
                  >
                    {{ option.text }}
                  </option>
                </b-form-select>
              </b-form-group>

              <!-- Immovable input -->
              <b-form-group
                label="Title Type"
                label-for="title"
                v-if="assets === 1"
              >
                <v-select
                  v-model="selecttitle"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optiontitle"
                />
              </b-form-group>
              <b-form-group label="State" label-for="state" v-if="assets === 1">
                <v-select
                  v-model="selectstate"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionstate"
                />
              </b-form-group>
              <b-form-group
                label="District"
                label-for="district"
                v-if="assets === 1"
              >
                <b-form-input id="district" v-model="district" type="name" />
              </b-form-group>
              <b-form-group label="City" label-for="city" v-if="assets === 1">
                <b-form-input id="city" v-model="city" type="name" />
              </b-form-group>
              <b-form-group
                label="Section/Block"
                label-for="section"
                v-if="assets === 1"
              >
                <b-form-input id="section" v-model="section" type="name" />
              </b-form-group>
              <b-form-group
                label="Lot No"
                label-for="lotno"
                v-if="assets === 1"
              >
                <b-form-input id="lotno" v-model="lotno" type="name" />
              </b-form-group>
              <b-form-group
                label="Ownership No"
                label-for="ownership"
                v-if="assets === 1"
              >
                <b-form-input id="ownership" v-model="ownership" type="name" />
              </b-form-group>
              <b-form-group
                label="Address"
                label-for="address"
                v-if="assets === 1"
              >
                <b-form-textarea id="address" placeholder="address" rows="3" />
              </b-form-group>
              <b-form-group
                label="Postcode"
                label-for="representpostcode"
                v-if="assets === 1"
              >
                <b-form-input
                  id="representpostcode"
                  v-model="representPostcode"
                  type="number"
                />
              </b-form-group>
              <b-form-group
                label="City"
                label-for="representcity"
                v-if="assets === 1"
              >
                <b-form-input
                  id="representcity"
                  v-model="representCity"
                  type="name"
                />
              </b-form-group>
              <b-form-group label="State" label-for="state" v-if="assets === 1">
                <v-select
                  v-model="selectstate"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionstate"
                />
              </b-form-group>

              <b-form-group
                label="Property Standard"
                label-for="propstd"
                v-if="assets === 1"
              >
                <v-select
                  v-model="selectproperty"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionproperty"
                />
              </b-form-group>
              <b-form-group
                label="Ownership Type"
                label-for="ownership"
                v-if="assets === 1"
              >
                <v-select
                  v-model="selectownership"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionownership"
                />
              </b-form-group>
              <b-form-group
                label="Space Type"
                label-for="spacetype"
                v-if="assets === 1"
              >
                <v-select
                  v-model="selectspace"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionspace"
                />
              </b-form-group>

              <!-- Movable input -->
              <b-form-group
                label="Car Title No."
                label-for="cartitle"
                v-if="assets === 2"
              >
                <b-form-input id="cartitle" v-model="cartitle" type="name" />
              </b-form-group>
              <b-form-group
                label="Car Chasis No."
                label-for="carchasis"
                v-if="assets === 2"
              >
                <b-form-input id="carchasis" v-model="carchasis" type="name" />
              </b-form-group>
              <b-form-group
                label="Car Make"
                label-for="carmake"
                v-if="assets === 2"
              >
                <b-form-input id="carmake" v-model="carmake" type="name" />
              </b-form-group>
              <b-form-group
                label="Car No."
                label-for="carno"
                v-if="assets === 2"
              >
                <b-form-input id="carno" v-model="carno" type="name" />
              </b-form-group>
              <b-form-group
                label="Car Financier"
                label-for="carfinance"
                v-if="assets === 2"
              >
                <b-form-input
                  id="carfinance"
                  v-model="carfinance"
                  type="name"
                />
              </b-form-group>
              <b-form-group
                label="Insurance Policy Number"
                label-for="insurancepolicy"
                v-if="assets === 2"
              >
                <b-form-input
                  id="insurancepolicy"
                  v-model="insurancepolicy"
                  type="name"
                />
              </b-form-group>
              <b-form-group
                label="Insurer"
                label-for="insurer"
                v-if="assets === 2"
              >
                <b-form-input id="insurer" v-model="insurer" type="name" />
              </b-form-group>
              <b-form-group
                label="Share CDS Account"
                label-for="sharecds"
                v-if="assets === 2"
              >
                <b-form-input id="sharecds" v-model="sharecds" type="name" />
              </b-form-group>

              <!-- Business input -->
              <b-form-group
                label="Company Secretary"
                label-for="companysecretary"
                v-if="assets === 3"
              >
                <b-form-input
                  id="companysecretary"
                  v-model="companysecretary"
                  type="name"
                />
              </b-form-group>
              <b-form-group
                label="Others"
                label-for="others"
                v-if="assets === 3"
              >
                <b-form-input id="others" v-model="others" type="name" />
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
              <b-form-group label="Testators IC" label-for="testatorsic">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group label="Executors IC" label-for="executoric">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group
                label="beneficiaries IC"
                label-for="beneficiariesic"
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
              <b-form-group label="Title" label-for="title">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group
                label="Principal Sale Purchase Agreement"
                label-for="salepuragree"
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
              <b-form-group label="Private Land search" label-for="privateland">
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
              <b-form-group label="Quit Rent" label-for="quitrent">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />
                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group
                label="Assessment Receipt"
                label-for="assessreceipt"
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
            <b-col md="6">
              <b-form-group
                label="Purchaser Financial Letter Offer"
                label-for="purfinance"
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
              <b-form-group label="Car Title" label-for="cartitle">
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
              <b-form-group label="CDS Account" label-for="cds">
                <b-form-file
                  v-model="file"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                />

                <b-card-text class="my-1">
                  Selected file: <strong>{{ file ? file.name : "" }}</strong>
                </b-card-text>
              </b-form-group>
              <b-form-group label="Insurance Policy" label-for="insurance">
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
                <b-form-textarea id="remarks" placeholder="" rows="3" />
              </b-form-group>
            </b-col>
          </b-row>
        </validation-observer>
      </tab-content>

      <!-- tabE details tab -->
      <tab-content title="Documents" :before-change="validationFormInfo">
        <validation-observer ref="infoRules" tag="form">
          <b-row>
            <b-col md="12">
              <b-form-group label="Documents" label-for="documents">
      <b-form-checkbox
        v-for="option in docs"
        :key="option.value"
        v-model="selecteddocs"
        :value="option.value"
        name="flavour-3a"
      >
        {{ option.text }}
      </b-form-checkbox>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col md="2"></b-col>
            <b-col md="2"></b-col>
            <b-col md="2"></b-col>
            <b-col md="2"></b-col>
            <b-col md="2"></b-col>
            <b-col md="2">
              <b-button
      v-ripple.400="'rgba(113, 102, 240, 0.15)'"
      block variant="primary"
    >
      <feather-icon
        icon="PrinterIcon"
        class="mr-50"
      />
      <span class="align-middle">Print</span>
    </b-button>
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
import Logo from "@core/layouts/components/Logo.vue";
import { ref, onUnmounted } from "@vue/composition-api";
import { heightTransition } from "@core/mixins/ui/transition";
import Ripple from "vue-ripple-directive";
import store from "@/store";
import router from "@/router";
import {
  BCard,
  BCardBody,
  BButton,
  BCardText,
  BForm,
  BPopover,
  BAlert,
  BLink,
  VBToggle,
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
  BFormSelect,
  BFormCheckboxGroup
} from "bootstrap-vue";
var model_options = {
  1: [
    { text: "Apartment", id: 1 },
    { text: "House", id: 2 },
    { text: "Land", id: 3 },
    { text: "Building", id: 4 }
  ],
  2: [
    { text: "Motor Vehicles", id: 1 },
    { text: "Equipments", id: 2 },
    { text: "Other Valuable Items", id: 3 },
    { text: "Cash", id: 4 },
    { text: "Listed Shares", id: 5 },
    { text: "Safe Deposit Boxes", id: 6 },
    { text: "Club Memberships", id: 7 },
    { text: "Jewellery", id: 8 },
    { text: "Insurance Policies", id: 9 },
    { text: "Employee Provided Fund", id: 10 },
    { text: "Unit Trust", id: 11 },
    { text: "Social Media Account", id: 12 },
    { text: "Cryptocurrency", id: 14 }
  ],
  3: [
    { text: "Company Share", id: 1 },
    { text: "Company Operation", id: 2 }
  ]
};

var makes_options = [
  { text: "Immovable", id: 1 },
  { text: "Movable", id: 2 },
  { text: "Business", id: 3 }
];
export default {
  name: "update-matter",
  data() {
    return {
      selecteddocs: [],
      docs: [
        { text: 'Document 1', value: 'docs1' },
        { text: 'Document 2', value: 'docs2' },
        { text: 'Document 3', value: 'docs3' },
        { text: 'Document 4', value: 'docs4' },
      ],
      matter: {
        matter_type: "",
        options: [
          { value: "Conveyancing", text: "Conveyancing" },
          { value: "Corporate/Commercial", text: "Corporate/Commercial" },
          { value: "Intellectual Properties", text: "Intellectual Properties" },
          { value: "Litigation", text: "Litigation" },
          {
            value: "Probate & Administration",
            text: "Probate & Administration"
          }
        ],
        options_lawyer: [
          { value: "Lawyer 1", text: "Lawyer 1" },
          { value: "Lawyer 2", text: "Lawyer 2" },
          { value: "Lawyer 3", text: "Lawyer 3" }
        ],
        options_purchaser_name: [
          { value: "Purchaser Name 1", text: "Purchaser Name 1" },
          { value: "Purchaser Name 2", text: "Purchaser Name 2" },
          { value: "Purchaser Name 3", text: "Purchaser Name 3" }
        ],
        options_purchaser_company: [
          { value: "Purchaser Company 1", text: "Purchaser Company 1" },
          { value: "Purchaser Company 2", text: "Purchaser Company 2" },
          { value: "Purchaser Company 3", text: "Purchaser Company 3" }
        ],
        options_vendor_name: [
          { value: "Vendor Name 1", text: "Vendor Name 1" },
          { value: "Vendor Name 2", text: "Vendor Name 2" },
          { value: "Vendor Name 3", text: "Vendor Name 3" }
        ],
        options_vendor_copmany: [
          { value: "Vendor Copmany 1", text: "Vendor Copmany 1" },
          { value: "Vendor Copmany 2", text: "Vendor Copmany 2" },
          { value: "Vendor Copmany 3", text: "Vendor Copmany 3" }
        ],
        client_company: "",
        description: "",
        file_group: "",
        control_account: "",
        pic: "",
        lawyer: "",
        task_assign: "",
        task_recipient: "",
        file_ref: "",
        remark: "",
        purchaser_name: "",
        purchaser_company: "",
        vendor_name: "",
        vendor_company: "",
        status: "",
        _method: "patch"
      },
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
  components: {
    BCard,
    BCardBody,
    BButton,
    BCardText,
    BForm,
    BPopover,
    BAlert,
    BLink,
    VBToggle,
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
    BFormCheckboxGroup,
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent
  },
  directives: {
    Ripple,
    "b-toggle": VBToggle
  },
  mixins: [heightTransition],

  // Reset Tr Height if data changes

  mounted() {
    this.initTrHeight(), this.showMatter();
  },
  created() {
    window.addEventListener("resize", this.initTrHeight);
  },
  destroyed() {
    window.removeEventListener("resize", this.initTrHeight);
  },
  methods: {
    async showMatter() {
      await this.axios
        .get(`/api/auth/matter/${this.$route.params.id}`)
        .then((response) => {
          const {
            matter_type,
            client_company,
            description,
            file_group,
            control_account,
            pic,
            lawyer,
            task_assign,
            task_recipient,
            file_ref,
            remark,
            purchaser_name,
            purchaser_company,
            vendor_name,
            vendor_copmany,
            status
          } = response.data;
          this.matter.matter_type = matter_type;
          this.matter.client_company = client_company;
          this.matter.description = description;
          this.matter.file_group = file_group;
          this.matter.control_account = control_account;
          this.matter.pic = pic;
          this.matter.lawyer = lawyer;
          this.matter.task_assign = task_assign;
          this.matter.task_recipient = task_recipient;
          this.matter.file_ref = file_ref;
          this.matter.remark = remark;
          this.matter.purchaser_name = purchaser_name;
          this.matter.purchaser_company = purchaser_company;
          this.matter.vendor_name = vendor_name;
          this.matter.vendor_copmany = vendor_copmany;
          this.matter.status = status;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async update() {
      await this.axios
        .post(`/api/auth/matter/${this.$route.params.id}`, this.matter)
        .then((response) => {
          this.$router.push({ name: "matter-management" });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    removeItem(index) {
      this.invoiceData.items.splice(index, 1);
      this.trTrimHeight(this.$refs.row[0].offsetHeight);
    },
    initTrHeight() {
      this.trSetHeight(null);
      this.$nextTick(() => {
        this.trSetHeight(this.$refs.form ? this.$refs.form.scrollHeight : 0);
      });
    }
  }
};
</script>
