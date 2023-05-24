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
                  readonly
                />
              </b-form-group>
            </b-col>
            <b-col cols="12" class="mb-2">
              <h5 class="mb-0">Sub Matter</h5>
            </b-col>
            <hr />
            <b-col md="6">
              <b-form-group label="Sub Matter type" label-for="mattertype">
                <v-select
                  v-model="selected"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="option"
                  class="text-uppercase"
                />
              </b-form-group>
            </b-col>
            <b-col md="6">
              <b-form-group label="Status" label-for="status">
                <v-select
                  v-model="selectedstatus"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionstatus"
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
              <h6 class="mb-0">Company/Individual</h6>
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
              <h6 class="mb-0">Company/Individual</h6>
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
              <h6 class="mb-0">Firm</h6>
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
              <b-form-group label="Company Resolutions" label-for="compreso">
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

      <!-- tabC details tab -->
      <tab-content title="Tab C" :before-change="validationFormInfo">
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
  BFormFile
} from "bootstrap-vue";
import { required, email } from "@validations";

export default {
  name: "update-matter",
  data() {
    return {
      selected: { title: "Please select submatter type" },
      option: [
        { title: "Advisory" },
        { title: "Research" },
        { title: "Agreement" },
        { title: "Letters" }
      ],
      selectedstatus: { title: "Please select status" },
      optionstatus: [
        { title: "DONE" },
        { title: "PENDING CLIENT" },
        { title: "TO DO" }
      ],
      selectedRole: { title: "Please select represent role" },
      optionrole: [
        { title: "Client" },
        { title: "Vendor" },
        { title: "Purchaser" }
      ],
      selecttitle: { title: "Please select title type" },
      optiontitle: [
        { title: "With Title - Individual Title" },
        { title: "With Title - Strata Title" },
        { title: "Without Title - Master Title" }
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
      selectproperty: { title: "Please select property usage" },
      optionproperty: [
        { title: "Residential" },
        { title: "Commercial" },
        { title: "Industrial" }
      ],
      selectownership: { title: "Please select type of tenure" },
      optionownership: [{ title: "Freehold" }, { title: "Leasehold" }],
      selectspace: { title: "Please select property type" },
      optionspace: [{ title: "Vacant Land" }, { title: "Others" }],
      selectunit: { title: "Please select" },
      optionunit: [
        { title: "Acres" },
        { title: "Hectares" },
        { title: "Sq Ft" },
        { title: "Sq Meter" }
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
