<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>View Matter</h4>
        </div>
        <div class="card-body">
          <form @submit.prevent="update">
            <div class="row">
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Matter Type</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.matter_type"
                    disabled
                  /> -->
                  <h4>Matter Type:</h4>
                  <h5>{{matter.matter_type}}</h5>
                  <!-- <select class="form-control" v-model="matter.matter_type">
                    <option value="Conveyancing">Conveyancing</option>
                    <option value="Corporate/Commercial">Corporate/Commercial</option>
                    <option value="Intellectual Properties">Intellectual Properties</option>
                    <option value="Litigation">Litigation</option>
                    <option value="Probate & Administration">Probate & Administration</option>
                  </select> -->
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Client Company</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.client_company"
                    disabled
                  /> -->
                  <h4>Client Company:</h4>
                  <h5>{{matter.client_company}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Description</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.description"
                  /> -->
                  <h4>Description:</h4>
                  <h5>{{matter.description}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>File Group</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.file_group"
                  /> -->
                  <h4>File Group:</h4>
                  <h5>{{matter.file_group}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Control Account</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.control_account"
                  /> -->
                  <h4>Control Account:</h4>
                  <h5>{{matter.control_account}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Person in Charge(PIC)</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.pic"
                  /> -->
                  <h4>Person in Charge(PIC):</h4>
                  <h5>{{matter.pic}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Lawyer</label> -->
                  <!-- <input
                    type="text"
                    class="form-control"
                    v-model="matter.lawyer"
                  /> -->
                  <!-- <b-form-select
                v-model="lawyer"
                :options="options_lawyer"
                required
              ></b-form-select> -->
              <h4>Lawyer:</h4>
                  <h5>{{matter.lawyer}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Tasks' Assign</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.task_assign"
                  /> -->
                  <h4>Tasks' Assign:</h4>
                  <h5>{{matter.task_assign}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Tasks' Recipient</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.task_recipient"
                  /> -->
                  <h4>Tasks' Recipient:</h4>
                  <h5>{{matter.task_recipient}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>File Ref</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.file_ref"
                  /> -->
                  <h4>File Ref:</h4>
                  <h5>{{matter.file_ref}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Remark</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.remark"
                  /> -->
                  <h4>Remark:</h4>
                  <h5>{{matter.remark}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Purchaser Name</label> -->
                  <!-- <input
                    type="text"
                    class="form-control"
                    v-model="matter.purchaser_1"
                  /> -->
                  <!-- <b-form-select
                v-model="purchaser_name"
                :options="options_purchaser_name"
                required
              ></b-form-select> -->
              <h4>Purchaser Name:</h4>
                  <h5>{{matter.purchaser_name}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Purchaser Company</label> -->
                  <!-- <input
                    type="text"
                    class="form-control"
                    v-model="matter.purchaser_2"
                  /> -->
                  <!-- <b-form-select
                v-model="purchaser_company"
                :options="options_purchaser_company"
                required
              ></b-form-select> -->
              <h4>Purchaser Company:</h4>
                  <h5>{{matter.purchaser_company}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Vendor Name</label> -->
                  <!-- <input
                    type="text"
                    class="form-control"
                    v-model="matter.purchaser_2"
                  /> -->
                  <!-- <b-form-select
                v-model="vendor_name"
                :options="options_vendor_name"
                required
              ></b-form-select> -->
              <h4>Vendor Name:</h4>
                  <h5>{{matter.vendor_name}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Vendor Copmany</label> -->
                  <!-- <input
                    type="text"
                    class="form-control"
                    v-model="matter.purchaser_2"
                  /> -->
                  <!-- <b-form-select
                v-model="vendor_copmany"
                :options="options_vendor_copmany"
                required
              ></b-form-select> -->
              <h4>Vendor Copmany:</h4>
                  <h5>{{matter.vendor_copmany}}</h5>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <!-- <label>Status</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="matter.status"
                  /> -->
                  <h4>Status:</h4>
                  <h5>{{matter.status}}</h5>
                </div>
              </div>
              <!-- <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
              </div> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Logo from "@core/layouts/components/Logo.vue";
import { ref, onUnmounted } from "@vue/composition-api";
import { heightTransition } from "@core/mixins/ui/transition";
import Ripple from "vue-ripple-directive";
import store from "@/store";
import router from "@/router";
import {
  BRow,
  BCol,
  BCard,
  BCardBody,
  BButton,
  BCardText,
  BForm,
  BFormGroup,
  BFormInput,
  BInputGroup,
  BInputGroupPrepend,
  BFormTextarea,
  BFormCheckbox,
  BPopover,
  BAlert,
  BLink,
  VBToggle
} from "bootstrap-vue";

export default {
  name: "update-matter",
  data() {
    return {
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
        vendor_company: "",
        status: "",
        _method: "patch"
      }
    };
  },
  components: {
    BRow,
    BCol,
    BCard,
    BCardBody,
    BButton,
    BCardText,
    BForm,
    BFormGroup,
    BFormInput,
    BInputGroup,
    BInputGroupPrepend,
    BFormTextarea,
    BFormCheckbox,
    BPopover,
    BAlert,
    BLink,

    Logo
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

<style lang="scss">
@import "~@core/scss/vue/libs/vue-select.scss";
@import "~@core/scss/vue/libs/vue-flatpicker.scss";
</style>

<style lang="scss" scoped>
@import "~@core/scss/base/pages/app-invoice.scss";

.form-item-section {
  background-color: $product-details-bg;
}

.form-item-action-col {
  width: 27px;
}

.repeater-form {
  // overflow: hidden;
  transition: 0.35s height;
}

.v-select {
  &.item-selector-title,
  &.payment-selector {
    background-color: #fff;

    .dark-layout & {
      background-color: unset;
    }
  }
}

.dark-layout {
  .form-item-section {
    background-color: $theme-dark-body-bg;

    .row .border {
      background-color: $theme-dark-card-bg;
    }
  }
}
</style>
