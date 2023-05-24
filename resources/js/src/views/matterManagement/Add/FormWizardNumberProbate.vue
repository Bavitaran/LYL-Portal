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
              <h6 class="mb-0">1st Party</h6>
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
              <h6 class="mb-0">2nd Party</h6>
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
              <h6 class="mb-0">Transferor/Vendor</h6>
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
              <h6 class="mb-0">Transferee/Buyer</h6>
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
              <b-form-group label="Asset Type" label-for="assettype">
                <b-form-select v-model="assets" id="vehicle-makes">
                  <option
                    class="text-uppercase"
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
                    class="text-uppercase"
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
                  class="text-uppercase"
                  v-model="selecttitle"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optiontitle"
                />
              </b-form-group>
              <b-form-group label="State" label-for="state" v-if="assets === 1">
                <v-select
                  class="text-uppercase"
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
                <b-form-input
                  id="district"
                  v-model="district"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="City" label-for="city" v-if="assets === 1">
                <b-form-input
                  id="city"
                  v-model="city"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Section/Block"
                label-for="section"
                v-if="assets === 1"
              >
                <b-form-input
                  id="section"
                  v-model="section"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Lot No"
                label-for="lotno"
                v-if="assets === 1"
              >
                <b-form-input
                  id="lotno"
                  v-model="lotno"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Ownership No"
                label-for="ownership"
                v-if="assets === 1"
              >
                <b-form-input
                  id="ownership"
                  v-model="ownership"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Address"
                label-for="address"
                v-if="assets === 1"
              >
                <b-form-textarea
                  id="address"
                  placeholder="address"
                  rows="3"
                  class="text-uppercase"
                />
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
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group label="State" label-for="state" v-if="assets === 1">
                <v-select
                  class="text-uppercase"
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
                  class="text-uppercase"
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
                  class="text-uppercase"
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
                  class="text-uppercase"
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
                <b-form-input
                  id="cartitle"
                  v-model="cartitle"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Car Chasis No."
                label-for="carchasis"
                v-if="assets === 2"
              >
                <b-form-input
                  id="carchasis"
                  v-model="carchasis"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Car Make"
                label-for="carmake"
                v-if="assets === 2"
              >
                <b-form-input
                  id="carmake"
                  v-model="carmake"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Car No."
                label-for="carno"
                v-if="assets === 2"
              >
                <b-form-input
                  id="carno"
                  v-model="carno"
                  type="name"
                  class="text-uppercase"
                />
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
                  class="text-uppercase"
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
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Insurer"
                label-for="insurer"
                v-if="assets === 2"
              >
                <b-form-input
                  id="insurer"
                  v-model="insurer"
                  type="name"
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Share CDS Account"
                label-for="sharecds"
                v-if="assets === 2"
              >
                <b-form-input
                  id="sharecds"
                  v-model="sharecds"
                  type="name"
                  class="text-uppercase"
                />
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
                  class="text-uppercase"
                />
              </b-form-group>
              <b-form-group
                label="Others"
                label-for="others"
                v-if="assets === 3"
              >
                <b-form-input
                  id="others"
                  v-model="others"
                  type="name"
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
              <b-form-group label="Original Will" label-for="willori">
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
                label="Original Death Certificate"
                label-for="deathcert"
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
                label="Assets Bank LEtter Offer"
                label-for="assbank"
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
      assets: null,
      model: null,
      makes_options: makes_options,
      model_options: model_options,
      selected: { title: "Please select submatter type" },
      option: [
        { title: "Grant of Probate" },
        { title: "Letter of Administration" },
        { title: "Others" }
      ],
      selectpic1: { title: "Please select Person in Charge" },
      optionpic1: [{ title: "Lawyer 1" }],
      selectpic2: { title: "Please select Person in Charge 2" },
      optionpic2: [{ title: "Lawyer 1" }],
      selectparties: { title: "Please select Parties" },
      optionparties: [{ title: "Parties 1" }, { title: "Parties 2" }],
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
      ],
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
