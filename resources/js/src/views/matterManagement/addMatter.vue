<template>
  <b-card>
    <b-form class="auth-register-form mt-2" @submit.prevent="addNewPost">
      <div class="custom-search">
        <!-- advance search input -->
        <b-row>
          <b-col md="12" class="text-right"> </b-col>
        </b-row>
        <br />
        <b-row>
          <b-col md="6">
            <b-form-group>
              <label>Matter Type <a style="color:red">*</a></label>
              <!-- <b-form-input
              id="floating-label1"
              placeholder="Matter Type"
              v-model="matter_type"
            /> -->
              <b-form-select
                v-model="matter_type"
                :options="options"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Client Company <a style="color:red">*</a></label>
              <!-- <b-form-input
                id="floating-label1"
                placeholder="Client Company"
                v-model="client_company"
              /> -->
              <b-form-select v-model="client_company" required>
                <option  v-for="(userdetail,key) in userdetails" :key="key">{{ userdetail.company_name  }}</option>

              </b-form-select>
            </b-form-group>
          </b-col>

          <b-col md="12">
            <b-form-group>
              <label>Description <a style="color:red">*</a></label>
              <b-form-textarea
                id="floating-label1"
                placeholder="Type your Description"
                v-model="description"
                required
              />
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>File Group <a style="color:red">*</a></label>
              <b-form-input
                id="floating-label1"
                placeholder="File Group"
                v-model="file_group"
                required
              />
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Control Account <a style="color:red">*</a></label>
              <b-form-input
                id="floating-label1"
                placeholder="Control Account"
                v-model="control_account"
                required
              />
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Person In Charge(PIC) <a style="color:red">*</a></label>
              <!-- <b-form-input
              id="floating-label1"
              placeholder="Person In Charge"
              v-model="pic"
            /> -->
              <b-form-select v-model="pic" required>
                <option  v-for="(userdetail,key) in userdetails" :key="key">{{ userdetail.person_in_charge  }}</option>

              </b-form-select>
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Lawyer <a style="color:red">*</a></label>
              <!-- <b-form-input
                id="floating-label1"
                placeholder="Lawyer"
                v-model="lawyer"
                required
              /> -->
              <b-form-select
                v-model="lawyer"
                :options="options_lawyer"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Tasks' Assign <a style="color:red">*</a></label>
              <b-form-input
                id="floating-label1"
                placeholder="Tasks' Assign"
                v-model="task_assign"
                required
              />
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Tasks' Recipient <a style="color:red">*</a></label>
              <b-form-input
                id="floating-label1"
                placeholder="Tasks' Recipient"
                v-model="task_recipient"
                required
              />
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>File Ref <a style="color:red">*</a></label>
              <b-form-input
                id="floating-label1"
                placeholder="File Ref"
                v-model="file_ref"
                required
              />
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Remark <a style="color:red">*</a></label>
              <b-form-textarea
                id="floating-label1"
                required
                placeholder="Type your Remark"
                v-model="remark"
              />
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Purchaser Name: <a style="color:red">*</a></label>
              <!-- <b-form-input
                id="floating-label1"
                required
                placeholder="Purchaser 1"
                v-model="purchaser_1"
              /> -->
              <b-form-select
                v-model="purchaser_name"
                :options="options_purchaser_name"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Purchaser Company: <a style="color:red">*</a></label>
              <!-- <b-form-input
                id="floating-label1"
                placeholder="Purchaser 2"
                v-model="purchaser_2"
                required
              /> -->
              <b-form-select
                v-model="purchaser_company"
                :options="options_purchaser_company"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Vendor Name: <a style="color:red">*</a></label>
              <!-- <b-form-input
                id="floating-label1"
                placeholder="Purchaser 2"
                v-model="purchaser_2"
                required
              /> -->
              <b-form-select
                v-model="vendor_name"
                :options="options_vendor_name"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>

          <b-col md="6">
            <b-form-group>
              <label>Vendor Copmany: <a style="color:red">*</a></label>
              <!-- <b-form-input
                id="floating-label1"
                placeholder="Purchaser 2"
                v-model="purchaser_2"
                required
              /> -->
              <b-form-select
                v-model="vendor_copmany"
                :options="options_vendor_copmany"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>

          <b-col class="hidden" md="6">
            <b-form-group>
              <label>status</label>
              <b-form-input
                id="floating-label1"
                placeholder="status"
                v-model="status"
                value="Processing"
              />
            </b-form-group>
          </b-col>
        </b-row>

        <br />
        <br />
        <br />
        <b-button
          v-ripple.400="'rgba(113, 102, 240, 0.15)'"
          variant="outline-primary"
          block
          type="submit"
        >
          Save
        </b-button>
      </div>
    </b-form>
  </b-card>
</template>

<script>
import axios from "axios";
import {
  BButton,
  BBadge,
  BDropdown,
  BDropdownItem,
  BCard,
  BCardText,
  BPagination,
  BFormGroup,
  BFormInput,
  BFormSelect,
  BFormDatepicker,
  BFormTextarea,
  BRow,
  BCol,
  BCardBody,
  BForm,
  BInputGroup,
  BInputGroupPrepend,
  BFormCheckbox,
  BPopover,
  VBToggle
} from "bootstrap-vue";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import { VueGoodTable } from "vue-good-table";
import vSelect from "vue-select";
import store from "@/store/index";

export default {
  components: {
    BBadge,
    BButton,
    BCard,
    BCardText,
    BDropdown,
    BDropdownItem,
    BFormDatepicker,
    VueGoodTable,
    BPagination,
    BFormGroup,
    BFormInput,
    BFormSelect,
    BFormTextarea,
    BRow,
    BCol,
    BCardBody,
    BForm,
    BInputGroup,
    BInputGroupPrepend,
    BFormCheckbox,
    BPopover,
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent,
    vSelect
  },
  data() {
    return {
      matter_type: "",
      options: [
        { value: "Conveyancing", text: "Conveyancing" },
        { value: "Corporate/Commercial", text: "Corporate/Commercial" },
        { value: "Intellectual Properties", text: "Intellectual Properties" },
        { value: "Litigation", text: "Litigation" },
        { value: "Probate & Administration", text: "Probate & Administration" }
      ],
      options_lawyer: [
        { value: "Lawyer 1", text: "Lawyer 1" },
        { value: "Lawyer 2", text: "Lawyer 2" },
        { value: "Lawyer 3", text: "Lawyer 3" },
      ],
      options_purchaser_name: [
        { value: "Purchaser Name 1", text: "Purchaser Name 1" },
        { value: "Purchaser Name 2", text: "Purchaser Name 2" },
        { value: "Purchaser Name 3", text: "Purchaser Name 3" },
      ],
      options_purchaser_company: [
        { value: "Purchaser Company 1", text: "Purchaser Company 1" },
        { value: "Purchaser Company 2", text: "Purchaser Company 2" },
        { value: "Purchaser Company 3", text: "Purchaser Company 3" },
      ],
      options_vendor_name: [
        { value: "Vendor Name 1", text: "Vendor Name 1" },
        { value: "Vendor Name 2", text: "Vendor Name 2" },
        { value: "Vendor Name 3", text: "Vendor Name 3" },
      ],
      options_vendor_copmany: [
        { value: "Vendor Copmany 1", text: "Vendor Copmany 1" },
        { value: "Vendor Copmany 2", text: "Vendor Copmany 2" },
        { value: "Vendor Copmany 3", text: "Vendor Copmany 3" },
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
      vendor_copmany: "",
      status: "Processing",
      userdetails: []
    };
  },
  mounted() {
    this.getUserDetails();
  },
  computed: {
    statusVariant() {
      const statusColor = {
        /* eslint-disable key-spacing */
        Current: "light-primary",
        Professional: "light-success",
        Rejected: "light-danger",
        Resigned: "light-warning",
        Applied: "light-info"
        /* eslint-enable key-spacing */
      };

      return (status) => statusColor[status];
    },
    direction() {
      if (store.state.appConfig.isRTL) {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.dir = true;
        return this.dir;
      }
      // eslint-disable-next-line vue/no-side-effects-in-computed-properties
      this.dir = false;
      return this.dir;
    }
  },
  created() {
    this.$http.get("/good-table/advanced-search").then((res) => {
      this.rows = res.data;
    });
  },
  methods: {
    async getUserDetails() {
      await this.axios
        .get("/api/auth/userlist")
        .then((response) => {
          this.userdetails = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.userdetails = [];
        });
    },
    advanceSearch(val) {
      this.searchTerm = val;
    },
    onRowClick(params) {
      this.$toast({
        component: ToastificationContent,
        props: {
          title: `Hello user! You have clicked on row ${params.row.id}`,
          icon: "UserIcon",
          variant: "success"
        }
      });
    },
    addNewPost() {
      axios
        .post("/api/auth/matter", {
          matter_type: this.matter_type,
          client_company: this.client_company,
          description: this.description,
          file_group: this.file_group,
          control_account: this.control_account,
          pic: this.pic,
          lawyer: this.lawyer,
          task_assign: this.task_assign,
          task_recipient: this.task_recipient,
          file_ref: this.file_ref,
          remark: this.remark,
          purchaser_name: this.purchaser_name,
          purchaser_company: this.purchaser_company,
          vendor_name: this.vendor_name,
          vendor_copmany: this.vendor_copmany,
          status: this.status
        })
        .then((response) => {
          this.$router.push({ name: "matter-management" });
          $("#success").html(response.data.message);
        });
    }
  }
};
</script>
<style lang="scss">
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
